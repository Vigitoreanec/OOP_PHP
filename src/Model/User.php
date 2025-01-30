<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class User extends Model
{
    protected ?int $id = null;
    protected ?string $name;
    protected ?int $userRoleId;

    protected array $props = [
        'name' => false,
        'userRoleId' => false
    ];

    public function getuserRoleId()
    {
        return $this->userRoleId;
    }

    public function setuserRoleId(string $userRoleId)
    {
        $this->userRoleId = $userRoleId;
    }

    public function __construct(string $name = null, int $userRoleId = null)
    {
        $this->name = $name;
        $this->userRoleId = $userRoleId;
    }

    protected static function getTableName()
    {
        return "User";
    }
}
