<?php

// Start Session if not already started...
if (!isset($_SESSION)) { session_start(); }

// Load environment variables
require_once __DIR__ . '/../app/config/_env.php';

// Load routes pages
require_once __DIR__ . '/../app/routing/routes.php';

?>