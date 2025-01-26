<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Category extends Model
{
    public ?int $id = null;
    public ?string $title;

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT INTO $tableName (title) VALUE (?)";
        $this->id = DataBase::getInstance()->lastInsertId();
        DataBase::getInstance()->execute($sql, [$this->title]);
        return $this;
    }

    public function save()
    {

    }
    
    protected static function getTableName()
    {
        return "categories";
    }
}
