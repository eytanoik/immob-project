<?php

use Illuminate\Database\Seeder;
use App\Demande;
use App\User;

class DemandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Demande::class, 50)->create();
        
        // ->each(function ($demande) 
        // {
        //     $demande->user()->save(factory(App\User::class)->make());
        // });
    }
}
