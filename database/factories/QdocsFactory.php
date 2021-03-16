<?php

use Faker\Generator as Faker; 
use Illuminate\Support\Facades\Config;

$factory->define(App\Qdocs::class, function (Faker $faker) {
    $names = Config::get('constants.qdoc_names');
    $elements = Config::get('constants.qdoc_elements');
    $fakeData = [
        'doc_number' => $faker->randomDigit,
        'ordernumber' => $faker->unique()->randomNumber($nbDigits = 4, $strict = false),
        'e_firstname' => $faker->firstNameMale,
        'e_lastname' => $faker->lastName,
        'c_firstname' => $faker->firstNameFemale,
        'c_lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_alt' => $faker->unique()->optional()->safeEmail,
        'make' => create('App\Make')->id,
        'type' => create('App\Type')->id,
        'model' => $faker->year($max = 'now'),
        'license' => strtoupper($faker->regexify('[a-zA-Z]{3}\d{3}')),
        'mileage' => $faker->randomNumber($nbDigits = 4, $strict = false),
        'comment1' => $faker->text($maxNbChars = 500),
        'comment2' => $faker->text($maxNbChars = 500),
        'comment3' => $faker->text($maxNbChars = 500),
        'comment4' => $faker->text($maxNbChars = 500),
        'n_mileage' => $faker->unique()->randomNumber($nbDigits = 5, $strict = false),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        'e_signature' => '[{"lx":138,"ly":23,"mx":138,"my":22},{"lx":138,"ly":25,"mx":138,"my":23},{"lx":220,"ly":77,"mx":218,"my":78}]',
        'c_signature' => '',
        'phone' => $faker->randomNumber($nbDigits = 7, $strict = false),
        'status' => 'ok'
    ];

    foreach ($names as $key => $value) {
        foreach ($elements[$key] as $mat => $name) {
            $fakeData["$name"] = $faker->numberBetween($min = 1, $max = 3);
        }
    }

    return $fakeData;
});
