<?php

use Jenssegers\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Classes\Session;
use App\Models\User;

function view($path, array $data = []) {
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';
    $blade = new Blade($view, $cache);

    // echo $blade->view()->make($path, $data)->render();
    echo $blade->make($path, $data)->render();
}

function make($fileName, $data) {

    extract($data);

    // turn on output buffering
    ob_start();
    //include template
    include(__DIR__ . '/../../resources/views/emails/' . $fileName . '.php');
    // get contents of the file
    $content = ob_get_contents();
    // erase the output and turn off outbut buffering
    ob_end_clean();

    return $content;
}

function slug($value) {
    // remove all characters not in this list: underscore | letters | numbers | whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));

    // replace underscore with a dash - 
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);

    // remove whitespace
    return trim($value, '-');
}

function paginate($numOfRecords, $totalRecords, $tableName, $object) {
    
    $pages = new Paginator($numOfRecords, 'p');
    $pages->set_total($totalRecords);

    $data = Capsule::select("SELECT * FROM $tableName WHERE `deleted_at` IS NULL ORDER BY created_at DESC" . $pages->get_limit());

    $categories = $object->transform($data);


    return [$categories, $pages->page_links()];
}

function isAuthenticated() {
    return Session::has('SESSION_USER_NAME') ? true : false;
}

function user() {
    if (isAuthenticated()) {
        return User::findOrFail(Session::get('SESSION_USER_ID'));
    }
    return false;
}

function convertMoneyToCents($value)
{
    // remove commas
    $value = preg_replace("/\,/i","",$value);
    $value = preg_replace("/([^0-9\.\-])/i","",$value);

    if (!is_numeric($value)) {
        return 0;
    }
    $value = (float) $value;
    return round($value, 2) *100;
}