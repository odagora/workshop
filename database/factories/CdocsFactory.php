<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(App\Cdocs::class, function (Faker $faker) {
    return [
        'doc_number' => $faker->randomDigit,
        'e_firstname' => $faker->firstNameMale,
        'e_lastname' => $faker->lastName,
        'c_firstname' => $faker->firstNameFemale,
        'c_lastname' => $faker->lastName,
        'phone' => $faker->randomNumber($nbDigits = 7, $strict = false),
        'email' => $faker->unique()->safeEmail,
        'make' => '16',
        'type' => '417',
        'model' => $faker->year($max = 'now'),
        'license' => strtoupper($faker->regexify('/^[a-zA-Z]{2}\d{4}|[a-zA-Z]{3}\d{3}$/u')),
        'mileage' => $faker->randomNumber($nbDigits = 4, $strict = false),
        'description' => $faker->text($maxNbChars = 288),
        'spare_parts' => $faker->randomElement($array = array ('yes','no')),
        'spare_description' => $faker->text($maxNbChars = 88),
        'price' => $faker->randomNumber($nbDigits = 5, $strict = false),
        'time' => $faker->randomDigit,
        'validity_time' => $faker->randomDigit,
        'observations' => $faker->text($maxNbChars = 300),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        'status' => 'ok'
    ];
});
