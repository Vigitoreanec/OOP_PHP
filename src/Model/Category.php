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
        return DataBase::getInstance()->execute($sql, [$this->title]);
    }

    protected static function getTableName()
    {
        return "categories";
    }
}
