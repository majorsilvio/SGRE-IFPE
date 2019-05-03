<?php

use App\Reserva;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Reserva::class, function (Faker $faker) {
    return [
        'data_reserva'=> $faker->date($format = 'Y-m-d', $min = 'now'),
        'hora_inicio' => $faker->time($format = 'H:i:s', $min = 'now'),
        'hora_fim' => $faker->time($format = 'H:i:s', $min = 'now'),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),   
        'equipamento_id' => $faker->numberBetween($min = 1, $max = 5) 
     
    ];
});
