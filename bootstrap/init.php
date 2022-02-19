<?php

// Start Session if not already started...

use App\RouteDispatcher;

if (!isset($_SESSION)) { session_start(); }

// Load environment variables
require_once __DIR__ . '/../app/config/_env.php';

// instantiate database class
new \App\Classes\Database();

// set custom error handler
set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

// Load routes pages
require_once __DIR__ . '/../app/routing/routes.php';

new \App\RouteDispatcher($router);


?>