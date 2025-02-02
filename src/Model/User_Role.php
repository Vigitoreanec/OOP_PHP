<?php

namespace Sergey\Oop\model;

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

    public function getUserRole()
    {
        return $this->title;
    }

    public function setUserRole(string $title)
    {
        $this->title = $title;
    }

    public static function isAdmin(): bool
    {
        return 'Admin';
        //return static::getUserRole() === 'Admin';
    }

    protected static function getTableName(): string
    {
        return "User_Role";
    }
}
