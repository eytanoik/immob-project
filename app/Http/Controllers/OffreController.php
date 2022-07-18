<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOffresRequest;
use App\Http\Requests\UpdateOffresRequest;
use App\Offre;
use App\Demande;
use App\User;
use App\OffreClick;
use App\OffreDemande;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\Carbon;


class OffreController extends Controller
{
    public function index()
    {
        return view('offre.index');
    }

    public function store(CreateOffresRequest $request)
    {
    
        if($request->hasFile('image'))
        {
            $image = $request->image->store('offre');
            } else {
                $image = '';
            }
       
        Offre::create([
            'type'=>$request->type,
            'adresse'=>$request->adresse,
            'image'=>$image,
            'surface'=>$request->surface,
            'price'=>$request->price,
            'user_id'=>Auth::id(),
        ]);
        

        session()->flash('success', 'Votre offre a bien ete enregistree.');

        return redirect('/immob')->with('offres', Offre::all());
    }

    public function edit(Offre $offre)
    {
        return view('offre.index', ['offre'=>$offre]);
    }

    public function update(UpdateOffresRequest $request, Offre $offre)
    {
        $data = $request->only(['type', 'adresse', 'surface', 'price',]);

        $offre->update($data);

        session()->flash('success', 'Votre offre a bien ete modifiee.');

        return redirect('/immob');
    }

    public function info(Offre $offre)
    {
        $time = Carbon::now()->add('-1', 'day')->toDateTimeString();

        $offre_click = OffreClick::where([
            'user_id'=> Auth::user()->id, 
            'offre_id'=>$offre->id,
        ])->whereDate('created_at', '>', $time)->first();

        if(isset($offre_click)){
            $offre_click->update(['count'=> $offre_click->count +1]);
        }else{
            OffreClick::create([
                    'user_id'=> Auth::user()->id, 
                    'offre_id'=>$offre->id,
                    'count'=> 1,
                ]);
        };

        return view('offre.info', ['offre'=>$offre]);
    }

    public function show(Offre $offre)
    {
        $offre = $offre ;

        $demande_c[] = Demande::where('type', $offre->type)
        ->where('adresse', $offre->adresse)
        ->whereRaw('? BETWEEN surface_min AND surface_max', [$offre->surface])
        ->whereRaw('? BETWEEN price_min AND price_max', [$offre->price])
        ->get()->all();

        return view('immob',['demande_cs'=>$demande_c[0], 'offre'=>$offre]);
    }

    public function sendmail(Offre $offre)
    {
        Mail::to($offre->user->email)->send(new SendMail());

        session()->flash('success', 'Votre mail a bien ete envoye.');

        return redirect('/immob');
    }

    public function ofdem(Demande $demande_c, Offre $offre)
    {
        OffreDemande::create([
            'offre_id'=>$offre->id,
            'demande_id'=> $demande_c->id,
            'user_id'=> Auth::user()->id, 
        ]);

        $offre_delete = Offre::find($offre->id);
        $offre_delete->delete();

        $demande_delete = Demande::find($demande_c->id);
        $demande_delete->delete();

        // session()->flash('success', 'Bravo {{Auth::user()->name}}, affaire conclue! Loffre et la demande napparaissent plus sur le site.');
        return redirect('/immob');
    }

}