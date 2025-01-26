<?php

namespace Sergey\Oop\Model;

class Post extends Model
{
    public ?int $id = null;
    public ?string $title;
    public ?string $text;
    public ?int $userId;

    public function __construct(string $title = null, string $text = null, int $userId = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->userId = $userId;
    }

    protected static function getTableName()
    {
        return "posts";
    }
}
