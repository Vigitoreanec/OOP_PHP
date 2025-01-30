<?php

namespace Sergey\Oop\Model;

class User_Role extends Model
{
    protected ?int $id = null;
    protected ?string $title;

    protected array $props = [
        'title' => false
    ];

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    protected static function getTableName()
    {
        return "User_Role";
    }
}
