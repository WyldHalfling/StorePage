<?php

$router = new AltoRouter;

/** / $router->setBasePath('/StorePage/public'); /* Didn't help, actually hurt page! */
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// admin routes
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');