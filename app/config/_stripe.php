<?php
Use Stripe\Stripe;
use App\Classes\Session;

$stripe = ['secret_key' => $_ENV['STRIPE_SECRET_KEY'],
           'publishable_key' => $_ENV['STRIPE_PUBLISHER_KEY']
];

Session::add('publishable_key', $stripe['publishable_key']);
Stripe::setApiKey($stripe['secret_key']);