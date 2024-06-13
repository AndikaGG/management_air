<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | File ini untuk menyimpan kredensial untuk layanan pihak ketiga tersebut
    | seperti Mailgun, Cap Pos, AWS, dan lainnya. File ini menyediakan de facto
    | lokasi untuk jenis informasi ini, memungkinkan paket untuk dimiliki
    | file konvensional untuk menemukan berbagai kredensial layanan.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
