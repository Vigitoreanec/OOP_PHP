<?php

use Sergey\Oop\Model\Model;

class Comment extends Model
{
    public string $text;
    public int $userId;
    public int $postId;

    protected function getTableName()
    {
        return "postComments";
    }

}