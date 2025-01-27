<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class User extends Model
{
    protected ?int $id;
    protected ?string $name;
    protected ?int $userRoleId;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

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

    public function insert()
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO $tableName (name, userRoleId) VALUES (?, ?)";
        DataBase::getInstance()->execute($sql, [$this->getName(), $this->getuserRoleId()]);
        $this->id = DataBase::getInstance()->lastInsertId();
        return $this;
    }


    protected static function getTableName()
    {
        return "users";
    }
}
