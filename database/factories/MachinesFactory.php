<?php

use App\Repositories\Machines\Machine;

/*
|--------------------------------------------------------------------------
| Factory for Machine
|--------------------------------------------------------------------------
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Machine::class, function (Faker\Generator $faker) {
    $client = rand(1, 2);
    return [
        'client_id'                     => $client,
        'user_id'                       => $client,
        'machine_equipment_name'        => $faker->company,
        'machine_brand'                 => $faker->company,
        'machine_model'                 => $faker->company,
        'machine_date'                  => $faker->date($format = 'd/m/Y', $max = 'now'),
        'machine_inspection'            => $faker->date($format = 'd/m/Y', $max = 'now'),
        'machine_next_inspection'       => random_array([15, 30, 60, 90, 180, 365]),
        'machine_observations'          => $faker->sentence($nbWords = 10, $variableNbWords = true),
    ];
});