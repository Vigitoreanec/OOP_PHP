<?php

use Sergey\Oop\Model\Model;

class User_Role extends Model
{
    public int $id;
    public string $title;

    protected function getTableName()
    {
        return "userRoles";
    }
}