<?php

$router = new AltoRouter;

/** / $router->setBasePath('/StorePage/public'); /* Didn't help, actually hurt page! */
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

// admin routes
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');
$router->map('POST', '/admin', 'App\Controllers\Admin\DashboardController@get', 'admin_form');

// product management
$router->map('GET', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@show', 'products_category');
$router->map('POST', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@store', 'create_products_category');

$router->map('POST', '/admin/product/categories/[i:id]/edit',
    'App\Controllers\Admin\ProductCategoryController@edit', 'edit_products_category');