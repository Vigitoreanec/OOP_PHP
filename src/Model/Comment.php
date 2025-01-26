<?php

use Sergey\Oop\Model\Model;

class Comment extends Model
{
    public ?string $text;
    public ?int $userId;
    public ?int $postId;

    public function __construct(string $text = null, int $userId = null, int $postId = null)
    {
                $this->text = $text;
        $this->userId = $userId;
        $this->postId = $postId;
    }

    protected static function getTableName()
    {
        return "postComments";
    }
}
