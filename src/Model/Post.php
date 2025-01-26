<?php

namespace Sergey\Oop\Model;

class Post extends Model
{
    public ?int $id;
    public ?string $title;
    public ?string $text;
    public ?int $userId;

    public function __construct(int $id = null, string $title = null, string $text = null, int $userId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->userId = $userId;
    }

    protected function getTableName()
    {
        return "posts";
    }
}
