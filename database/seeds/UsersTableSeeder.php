<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()
        ->each(function ($user) 
        {
            $user->offres()->save(factory(App\Offre::class)->make());
        })
        ->each(function ($user) 
        {
            $user->demandes()->save(factory(App\Demande::class)->make());
        });
    }
}
