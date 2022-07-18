<?php

use App\Demande;
use App\Offre;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/', 'HomeController@index');

    Route::get('/immob', function () {
        return view('immob')->with('demandes', Demande::all())->with('offres', Offre::all());;
    });

    Route::resource('/offre', 'OffreController');

    Route::resource('/demande', 'DemandeController');

    Route::get('/sendmail/{offre}', 'OffreController@sendmail')->name('sendmail');

    Route::get('/info/{offre}', 'OffreController@info')->name('info');

    Route::get('/ofdem/{demande_c}/offre/{offre}', 'OffreController@ofdem')->name('ofdem');

});


