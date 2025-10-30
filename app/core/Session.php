<?php

namespace LOMU\core;

class Session
{

    static function startSession()
    {
        @session_start();
    }

    static function endSession()
    {
        @session_destroy();
    }

    static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    static function itemExist($key)
    {
        if (!empty(self::get($key))) {
            return true;
        }
        return false;
    }
}
