<?php
namespace Sergey\Oop\Model;


class User extends Model
{
    public int $id;
    public string $name;
    
    protected function getTableName()
    {
        return "users";
    }
}