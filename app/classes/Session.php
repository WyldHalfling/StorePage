<?php

namespace App\Classes;

use Exception;

class Session
{
    /**
     * create a session
     * 
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
    */ 

    public static function add($name, $value)
    {
        if ($name != '' && !empty($name) && $value != '' && !empty($value)) {
            return $_SESSION[$name] = $value;
        }

        throw new \Exception('Name and value required');
    }

    /**
     * get value from session
     *
     * @param $name
     * @return mixed 
     */
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /** 
     * check if session exiists
     * 
     * @param $name
     * @return bool
     * @throws \Exception
    */
    public static function has($name)
    {
        if ($name != '' && !empty($name)) {
            return (isset($_SESSION[$name])) ? true : false ;
        }

        throw new \Exception('Name is required');
    }
    
    /**
     * remove session
     * @param $name
    */ 
    public static function remove($name)
    {
        if (self::has($name)) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * Flash a message and unset old session
     *
     * @param $name
     * @param $value
     * @return void
     */
    public static function flash($name, $value = '')
    {
        if (self::has($name)) {
            $oldValue = self::get($name);
            self::remove($name);

            return $oldValue;
        } else {
            self::add($name, $value);
        }

        return null;
    }
}