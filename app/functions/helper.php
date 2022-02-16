<?php
//use Philo\Blade\Blade;
use Jenssegers\Blade\Blade;

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