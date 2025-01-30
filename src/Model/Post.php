<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Post extends Model
{
    protected ?int $id;
    protected ?string $title;
    protected ?string $text;
    protected ?int $id_category;

    public function setId(int $id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->title = $text;
    }

    public function getCategoryId()
    {
        return $this->id_category;
    }

    public function setCategoryId(string $id_category)
    {
        $this->id_category = $id_category;
    }


    public function __construct(string $title = null, string $text = null, int $id_category = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->id_category = $id_category;
    }


    public function insert()
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO $tableName (title, text, id_category) VALUES (?, ?, ?)";
        DataBase::getInstance()->execute($sql, [$this->getTitle(), $this->getText(), $this->getCategoryId()]);
        $this->id = DataBase::getInstance()->lastInsertId();
        return $this;
    }

    protected static function getTableName()
    {
        return "posts";
    }
}
