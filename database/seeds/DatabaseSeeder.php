<?php

use Illuminate\Database\Seeder;
//use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	factory('App\User',10)->create();
    	factory('App\Equipamento',5)->create();
    	factory('App\Reserva',10)->create();

    }
}
