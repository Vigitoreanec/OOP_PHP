<?php

namespace Sergey\Oop\Model;

class Category extends Model
{
    public ?int $id;
    public ?string $title;

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    protected static function getTableName()
    {
        return "categories";
    }
}
