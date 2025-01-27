<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Category extends Model
{
    public ?int $id = null;
    private ?string $title;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

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
        DataBase::getInstance()->execute($sql, [$this->getTitle()]);
        $this->id = DataBase::getInstance()->lastInsertId();
        // var_dump($this->id);
        // die();
        return $this;
    }

    // public function update()
    // {
    //     $tableName = $this->getTableName();
    //     $sql = "INSERT INTO $tableName (title) VALUES (?)";

    // }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            //$this->update();
        }
        return $this;
    }

    protected static function getTableName()
    {
        return "categories";
    }
}
