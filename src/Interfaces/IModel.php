<?php

namespace Sergey\Oop\Interfaces;

interface IModel
{
    public function getOne(int $id);
    public function getAll();
}