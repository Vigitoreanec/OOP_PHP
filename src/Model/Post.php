<?php
namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;

class Post
{
    public int $id;
    public string $title;
    public string $text;

    protected $db;
    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * from posts WHERE id = $id";
        return $this->db->queryOne($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * from posts";
        return $this->db->queryOne($sql);
    }
}