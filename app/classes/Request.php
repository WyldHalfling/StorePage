<?php

namespace App\Classes;

class Request
{
    /**
     * Return all request that we are interested in
     * @param bool $isArray
     * @return mixed
     */
    public static function all($isArray = false)
    {
        $result = [];
        if (count($_GET) > 0) $result['get'] = $_GET;
        if (count($_POST) > 0) $result['post'] = $_POST;
        $result['file'] = $_FILES;

        return json_decode(json_encode($result), $isArray);
    }

    /**
     * Get specific request type
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        $obj = new static;
        $data = $obj->all();

        return $data->$key;
    }

    /**
     * Check request availability
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return (array_key_exists($key, self::all(true))) ? true : false;
    }

    /** 
     * Get request data
     * @param $key
     * @param $value
     * @return string
     */
    public static function old($key, $value)
    {
        $obj = new static;
        $data = $obj->all();
        return isset($data->$key->$value) ? $data->$key->$value : "";
    }

    /**
     * Refresh request 
     */
    public static function refresh()
    {
        $_POST = [];
        $_GET = [];
        $_FILES = [];
    }
}