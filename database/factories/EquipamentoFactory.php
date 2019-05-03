<?php

use App\Equipamento;
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

$factory->define(Equipamento::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->randomElement($array = array('sony','samsung','hp','midea','epson')),
				'tipo' => $faker->randomElement($array = array('projetor','caixa de som','microfone')),        
     
    ];
});
