<?php

class Autoload
{
    public function loadClass($className)
    {
        $filename = str_replace('app\\', '', $className);
        //var_dump($filename);
        $filename = str_replace('\\', '/', $filename);
        include './src/' . $filename . ".php";
        $dbname = str_replace('db\\','',$className);
        var_dump($dbname);
        include './core/' . $dbname . ".php"; 
    }
}