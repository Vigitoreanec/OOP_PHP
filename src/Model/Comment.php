<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Comment extends Model
{
    protected ?int $id = null;
    protected ?string $text;
    protected ?int $userId;
    protected ?int $postId;

    protected array $props = [
        'text' => false,
        'userId' => false,
        'postId' => false,
    ];

    public function __construct(string $text = null, int $userId = null, int $postId = null)
    {
        $this->text = $text;
        $this->userId = $userId;
        $this->postId = $postId;
    }

    protected static function getTableName()
    {
        return "Comment";
    }
}
