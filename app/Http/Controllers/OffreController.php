<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOffresRequest;
use App\Offre;
use App\Demande;
use App\User;
use App\OffreClick;
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

        return redirect('/')->with('offres', Offre::all());
    }

    public function sendmail(Offre $offre_c)
    {
        Mail::to($offre_c->user->email)->send(new SendMail());

        session()->flash('success', 'Votre mail a bien ete envoye.');

        return redirect('/');
    }

    public function compatibles(Offre $offre_c)
    {
        $offre_c = $offre_c;

        $time = Carbon::now()->add('-1', 'day')->toDateTimeString();

        $offre_click = OffreClick::where([
            'user_id'=> Auth::user()->id, 
            'offre_id'=>$offre_c->id,
        ])->whereDate('created_at', '>', $time)->first();

        if(isset($offre_click)){
            $offre_click->update(['count'=> $offre_click->count +1]);
        }else{
            OffreClick::create([
                    'user_id'=> Auth::user()->id, 
                    'offre_id'=>$offre_c->id,
                    'count'=> 1,
                ]);
        };

      
        return view('offre.compatibles', ['offre_c'=> $offre_c])->with('offreclicks', OffreClick::all());
    }

   
}