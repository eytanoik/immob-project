<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOffresRequest;
use App\Offre;
use App\Demande;
use App\User;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


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
            $destination_path = 'public/images/offres';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
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

        return view('offre.compatibles', ['offre_c'=>$offre_c]);
    }

   
}