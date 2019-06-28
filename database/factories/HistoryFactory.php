<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Entities\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'valor' => $faker->randomNumber(4),
        'marca' => $faker->firstName,
        'modelo' => $faker->lastName,
        'ano_modelo' => '2011',
        'combustivel' => 'Gasolina',
        'codigo_fipe' => '12345-5',
        'mes_referencia' => $faker->monthName,
        'tipo_veiculo' => $faker->randomNumber(1),
        'sigla_combustivel' => 'G',
    ];
});
