<?php
namespace Sergey\Oop\Model;
use Sergey\Oop\core\DataBase;

class User
{
    public int $id;
    public string $name;
    protected $db;
    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * from users WHERE id = $id";
        return $this->db->queryOne($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * from users";
        return $this->db->queryOne($sql);
    }
}