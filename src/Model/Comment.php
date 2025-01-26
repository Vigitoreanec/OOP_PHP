<?php

use Sergey\Oop\Model\Model;

class Comment extends Model
{
    public ?string $text;
    public ?int $userId;
    public ?int $postId;

    public function __construct(string $text = null, int $userId = null, int $postId = null)
    {
        parent::__construct();
        $this->text = $text;
        $this->userId = $userId;
        $this->postId = $postId;
    }

    protected function getTableName()
    {
        return "postComments";
    }
}
