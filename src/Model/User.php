<?php

namespace Sergey\Oop\model;

class User extends Model
{
    protected ?int $id = null;
    protected ?string $name;
    protected ?int $userRoleId;

    protected array $props = [
        'name' => false,
        'userRoleId' => false
    ];

    public function getUserName()
    {
        return $this->name;
    }

    public function setUserName(string $name)
    {
        $this->name = $name;
    }

    public function getUserRoleId()
    {
        return $this->userRoleId;
    }

    public function setUserRoleId(string $userRoleId)
    {
        $this->userRoleId = $userRoleId;
    }

    public function __construct(string $name = null, int $userRoleId = null)
    {
        $this->name = $name;
        $this->userRoleId = $userRoleId;
    }

    protected static function getTableName():string
    {
        return "User";
    }
}
