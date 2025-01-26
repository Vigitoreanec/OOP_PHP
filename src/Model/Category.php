<?php

namespace Sergey\Oop\Model;

class Category extends Model
{
    public ?int $id;
    public ?string $title;

    public function __construct(int $id = null, string $title = null)
    {
        $this->id = $id;
        $this->title = $title;
    }

    protected static function getTableName()
    {
        return "categories";
    }
}
