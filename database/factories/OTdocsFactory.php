<?php

use Faker\Generator as Faker;

$factory->define(App\Otdocs::class, function (Faker $faker) {
    return [
        'id_number' => $faker->randomDigit,
        'c_firstname' => $faker->firstNameFemale,
        'c_lastname' => $faker->lastName,
        'license' => strtoupper($faker->regexify('[a-zA-Z]{3}\d{3}')),
        'mileage' => $faker->randomNumber($nbDigits = 4, $strict = false),
        'ordernumber' => $faker->unique()->randomNumber($nbDigits = 4, $strict = false),
        'status' => 'ok'
    ];
});
