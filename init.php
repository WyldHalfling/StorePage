<?php

use App\RouteDispatcher;
use App\Classes\Database;

// Start session if not already started
if(!isset($_SESSION)) session_start();

//load environment variable
require_once __DIR__ . '/../app/config/_env.php';

//instantiate database class
//new Database();

// set custom error handler
//set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors'], E_ALL);

// link to all routes for site
//require_once __DIR__ . '/../app/routing/routes.php';

// start route dispatcher for auto routing for site
//new RouteDispatcher($router);
