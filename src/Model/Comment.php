<?php

use Sergey\Oop\Model\Model;

use Sergey\Oop\core\DataBase;

class Comment extends Model
{
    protected ?int $id;
    protected ?string $text;
    protected ?int $userId;
    protected ?int $postId;

    public function getText()
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId(string $postId)
    {
        $this->postId = $postId;
    }

    public function __construct(string $text = null, int $userId = null, int $postId = null)
    {
        $this->text = $text;
        $this->userId = $userId;
        $this->postId = $postId;
    }

    public function insert()
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO $tableName (text, userId, postId) VALUES (?, ?, ?)";
        DataBase::getInstance()->execute($sql, [$this->getText(), $this->getUserId(), $this->getPostId()]);
        $this->id = DataBase::getInstance()->lastInsertId();
        return $this;
    }

    protected static function getTableName()
    {
        return "postComments";
    }
}
