<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demande;
use App\Offre;
use App\Http\Requests\CreateDemandesRequest;
use Auth;


class DemandeController extends Controller
{
    public function index()
    {
        return view('demande.index');
    }

    public function store(CreateDemandesRequest $request)
    {
        Demande::create([
            'type'=>$request->type,
            'adresse'=>$request->adresse,
            'surface_min'=>$request->surface_min,
            'surface_max'=>$request->surface_max,
            'price_min'=>$request->price_min,
            'price_max'=>$request->price_max,
            'user_id'=>Auth::user()->id,
        ]);

        session()->flash('success', 'Votre demande a bien ete enregistree.');

        return redirect('/immob')->with('demandes', Demande::all());
    }

}
