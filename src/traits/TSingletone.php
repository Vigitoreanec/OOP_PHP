<?php

namespace Sergey\Oop\traits;

use Sergey\Oop\core\DataBase;


trait TSingletone
{
    private function __construct() {}
    private function __clone() {}
    //private function __wakeup() {}

    private static ?DataBase $instance = null;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}