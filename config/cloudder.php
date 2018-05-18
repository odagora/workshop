<?php

/*
Heroku environment variable splitted
 */

$account = parse_url(getenv("CLOUDINARY_URL"));

$cloudName = $account["host"];
$apiKey = $account["user"];
$apiSecret = $account["pass"];

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudinary API configuration
    |--------------------------------------------------------------------------
    |
    | Before using Cloudinary you need to register and get some detail
    | to fill in below, please visit cloudinary.com.
    |
    */

    'cloudName'  => $cloudName,
    'baseUrl'    =>  'http://res.cloudinary.com/'.$cloudName,
    'secureUrl'  => 'https://res.cloudinary.com/'.$cloudName,
    'apiBaseUrl' => 'https://api.cloudinary.com/v1_1/'.$cloudName,
    'apiKey'     =>  $apiKey,
    'apiSecret'  => $apiSecret,

    'scaling'    => [
        'format' => 'png',
        'width'  => 150,
        'height' => 150,
        'crop'   => 'fit',
        'effect' => null
    ],

];
