<?php

namespace Sergey\Oop\Interfaces;

interface IModel
{
    public static function getOne(int $id);

    public static function getAll();
}
