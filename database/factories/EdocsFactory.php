<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

$factory->define(App\Edocs::class, function (Faker $faker) {
    $names = Config::get('constants.edoc_names');
    $elements = Config::get('constants.edoc_elements');
    $fakeData = [
        'doc_number' => $faker->randomDigit,
        'e_firstname' => $faker->firstNameMale,
        'e_lastname' => $faker->lastName,
        'c_firstname' => $faker->firstNameFemale,
        'c_lastname' => $faker->lastName,
        'id_number' => $faker->randomNumber($nbDigits = 8, $strict = false),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->randomNumber($nbDigits = 7, $strict = false),
        'make' => '16',
        'type' => '417',
        'model' => $faker->year($max = 'now'),
        'license' => strtoupper($faker->regexify('/^[a-zA-Z]{2}\d{4}|[a-zA-Z]{3}\d{3}$/u')),
        'mileage' => $faker->randomNumber($nbDigits = 4, $strict = false),
        'comment1' => $faker->text($maxNbChars = 400),
        'comment2' => $faker->text($maxNbChars = 400),
        'comment3' => $faker->text($maxNbChars = 400),
        'comment4' => $faker->text($maxNbChars = 400),
        'comment5' => $faker->text($maxNbChars = 400),
        'comment6' => $faker->text($maxNbChars = 400),
        'comment7' => $faker->text($maxNbChars = 400),
        'comment8' => $faker->text($maxNbChars = 400),
        'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        'e_signature' => '[{"lx":138,"ly":23,"mx":138,"my":22},{"lx":138,"ly":25,"mx":138,"my":23},{"lx":220,"ly":77,"mx":218,"my":78}]',
        'c_signature' => '',
        'status' => 'ok'
    ];

    foreach ($names as $key => $value) {
        foreach ($elements[$key] as $mat => $name) {
            $fakeData["$name"] = $faker->numberBetween($min = 1, $max = 3);            
        }
    }

    return $fakeData;
});
