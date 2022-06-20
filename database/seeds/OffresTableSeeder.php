<?php

use Illuminate\Database\Seeder;
use App\Offre;
use App\User;

class OffresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Offre::class, 50)->create();
        
        // ->each(function ($offre) 
        // {
        //     $offre->user()->save(factory(App\User::class)->make());
        // });
    }
}
