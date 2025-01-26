<?php

namespace Sergey\Oop\Model;


class User extends Model
{
    public ?int $id;
    public ?string $name;
    public ?int $userRoleId;

    public function __construct(int $id = null, string $name = null, int $userRoleId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->userRoleId = $userRoleId;
    }

    protected static function getTableName()
    {
        return "users";
    }
}
