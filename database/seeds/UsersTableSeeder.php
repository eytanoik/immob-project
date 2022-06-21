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
        factory(App\User::class, 7)->create()
        ->each(function ($user) 
        {
            $user->offres()->save(factory(App\Offre::class)->make(['user_id' => $user->id]));
        })
        ->each(function ($user) 
        {
            $user->demandes()->save(factory(App\Demande::class)->make(['user_id' => $user->id]));
        });
    }
}
