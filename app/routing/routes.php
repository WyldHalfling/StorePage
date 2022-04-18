<?php

$router = new AltoRouter;

/** / $router->setBasePath('/StorePage/public'); /* Didn't help, actually hurt page! */
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
$router->map('GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'featured_product');
$router->map('GET', '/get-products', 'App\Controllers\IndexController@getProducts', 'get_product');

require_once __DIR__ . '/admin_routes.php';