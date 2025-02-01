<?php

namespace Sergey\Oop\model;

use Sergey\Oop\core\DataBase;

class Category extends Model
{
    protected ?int $id = null;
    protected ?string $title;

    protected array $props = [
        'title' => false
    ];

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO $tableName (title) VALUES (?)";
        //var_dump($sql);
        //die();
        DataBase::getInstance()->execute($sql, [$this->title]);
        $this->id = DataBase::getInstance()->lastInsertId();
        return $this;
    }

    protected static function getTableName():string
    {
        return "categories";
    }
}
