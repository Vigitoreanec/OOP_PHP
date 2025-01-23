<?php

class Autoload
{
    public function loadClass($className)
    {
        include './model/' . $className . ".php";
    }
}