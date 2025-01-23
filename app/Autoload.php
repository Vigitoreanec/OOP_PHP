<?php

class Autoload
{
    public function loadClass($className)
    {
        $filename = str_replace('app\\', '', $className);
        include './model/' . $filename . ".php";
    }
}