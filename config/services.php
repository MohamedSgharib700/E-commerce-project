<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twilio' => [
        'accountSid' => env('TWILIO_ACCOUNT_SID'),
        'authToken' => env('TWILIO_AUTH_TOKEN'),
        'number' => env('TWILIO_NUMBER'),
    ],

    'authy' => [
        'secret' => env('AUTHY_API_KEY'),
    ],

    'facebook' =>[
        'client_id'     => env('355233161691814'),
        'client_secret' => env('5f1ca290da82a7a2797d5e07b884cbdf'),
        'redirect'      => env('https://finale.gulfroots.com/auth/facebook/callback'),
    ],
    'google' =>[
        'client_id'     => env('450425473916-lgn6qmp64gjtj1knrisagjtq6q6afbkf.apps.googleusercontent.com'),
        'client_secret' => env('sLGliohWGuq7owc9KQQ5MoJG'),
        'redirect'      => env('https://finale.gulfroots.com/auth/google/callback'),
    ]

];
