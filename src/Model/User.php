<?php

namespace Sergey\Oop\Model;


class User extends Model
{
    public ?int $id;
    public ?string $name;
    public ?int $userRoleId;

    public function __construct(int $id = null, string $name = null, int $userRoleId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->userRoleId = $userRoleId;
    }

    protected function getTableName()
    {
        return "users";
    }
}
