<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class User_Role extends Model
{
    protected ?int $id;
    protected ?string $title;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    protected static function getTableName()
    {
        return "userRoles";
    }
}
