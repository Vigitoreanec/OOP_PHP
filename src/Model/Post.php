<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Post extends Model
{
    protected ?int $id = null;
    protected ?string $title;
    protected ?string $text;
    protected ?int $id_category;


    protected array $props = [
        'title' => false,
        'text' => false,
        'id_category' => false,
    ];

    public function getCategoryId()
    {
        return $this->id_category;
    }

    public function setCategoryId(string $id_category)
    {
        $this->id_category = $id_category;
    }

    public function __construct(string $title = null, string $text = null, int $id_category = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->id_category = $id_category;
    }

    protected static function getTableName()
    {
        return "posts";
    }
}
