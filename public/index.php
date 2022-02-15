<?php

require_once __DIR__ . '/../bootstrap/init.php';
$appName = $_ENV['APP_NAME'];

//var_dump(in_array('mod_rewrite', apache_get_modules()));

use Illuminate\Database\Capsule\Manager as Capsule;
$user = Capsule::table('categories')->get();

var_dump($user->toArray());

?>