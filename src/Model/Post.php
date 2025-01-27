<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Post extends Model
{
    public ?int $id = null;
    private ?string $title;
    private ?string $text;
    private ?int $categoryId;

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
        return $this->categoryId;
    }

    public function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
    }


    public function __construct(string $title = null, string $text = null, int $categoryId = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->categoryId = $categoryId;
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
