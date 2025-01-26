<?php

use Sergey\Oop\Model\Model;

class User_Role extends Model
{
    public ?int $id;
    public ?string $title;

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    protected static function getTableName()
    {
        return "userRoles";
    }
}
