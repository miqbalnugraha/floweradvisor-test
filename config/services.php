<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
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

    'facebook' => [
        'client_id'     => '1007820993201217',
        'client_secret' => '04864d5574af965e9d6cb69035aa9eb7',
        'redirect'      => 'http://localhost:8000/oauth/facebook/callback',
    ],

    'google' => [
        'client_id'     => '126510756971-di9dm6epv03h213t0d9qji76ajvraamk.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'http://localhost:8000/oauth/google/callback',
    ],

];
