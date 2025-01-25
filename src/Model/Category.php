<?php

namespace Sergey\Oop\Model;

class Category extends Model
{
    public int $id;
    public string $title;

    protected function getTableName()
    {
        return "categories";
    }
}