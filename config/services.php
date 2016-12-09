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

	'facebook' => [
		 'client_id' => '1695744140749467',
		 'client_secret' => 'f56ba30c61cb60693bf93527e966e0f8', 
		'redirect' => 'http://naucikako.com/callback/facebook', // ovo menjamo kada bacimo sajt
		 ],

	 'google' => [
		 'client_id' => '1093405541855-bheao1bluf4359uhishmqh7huhuuqs66.apps.googleusercontent.com',
		 'client_secret' => 'EgODqEIMXYlxldlgdXkH_AeY',
		 'redirect' => 'http://naucikako.com/callback/google',
	 ],
];
