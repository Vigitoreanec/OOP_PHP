<?php

namespace Sergey\Oop\Model;

abstract class Model extends DbModel
{
    protected array $props = [];

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->props)) {
            return $this->$name;
        }
        throw new \Exception("Нет такого поля");
    }

    public function __set(string $name, string $value)
    {
        if (array_key_exists($name, $this->props)) {
            $this->props[$name] = true;
            $this->$name = $value;
        }
    }
}
