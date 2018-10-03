<?php

/*
Heroku and localhost environment variable splitted
 */

$account = getenv("CLOUDINARY_URL");

if (!empty($account)) {
    $account    = parse_url($account);
    $cloudName  = $account["host"];
    $baseUrl    = 'http://res.cloudinary.com/'.$cloudName;
    $secureUrl  = 'https://res.cloudinary.com/'.$cloudName;
    $apiBaseUrl = 'https://api.cloudinary.com/v1_1/'.$cloudName;
    $apiKey     = $account["user"];
    $apiSecret  = $account["pass"];
} else {
    $cloudName  = env('CLOUDINARY_CLOUD_NAME');
    $baseUrl    = env('CLOUDINARY_BASE_URL', 'http://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME'));
    $secureUrl  = env('CLOUDINARY_SECURE_URL', 'https://res.cloudinary.com/'.env('CLOUDINARY_CLOUD_NAME'));
    $apiBaseUrl = env('CLOUDINARY_API_BASE_URL', 'https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME'));
    $apiKey     = env('CLOUDINARY_API_KEY');
    $apiSecret  = env('CLOUDINARY_API_SECRET');

}

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
    'baseUrl'    => $baseUrl,
    'secureUrl'  => $secureUrl,
    'apiBaseUrl' => $apiBaseUrl,
    'apiKey'     => $apiKey,
    'apiSecret'  => $apiSecret,

    'scaling'    => [
        'format' => 'png',
        'width'  => 150,
        'height' => 150,
        'crop'   => 'fit',
        'effect' => null
    ],

];
