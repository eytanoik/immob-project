<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demande;
use App\Offre;
use App\Http\Requests\CreateDemandesRequest;
use App\Http\Requests\UpdateDemandesRequest;
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

    public function edit(Demande $demande)
    {
        return view('demande.index')->with('demande', $demande);
    }

    public function update(UpdateDemandesRequest $request, Demande $demande)
    {
        $data = $request->only(['type', 'adresse', 'surface_min', 'surface_max', 'price_min', 'price_max',]);

        $demande->update($data);

        session()->flash('success', 'Votre demande a bien ete modifiee.');

        return redirect('/immob');
    }

    public function show(Demande $demande)
    {
        $offre_c[] = Offre::where('type', $demande->type)
        ->where('adresse', $demande->adresse)
        ->whereBetween('surface', [$demande->surface_min,$demande->surface_max])
        ->whereBetween('price', [$demande->price_min,$demande->price_max])
        ->get()->all();

        return view('immob',['offre_cs'=>$offre_c[0]])->with('demande', $demande);
    }
}
