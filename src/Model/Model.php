<?php

namespace Sergey\Oop\Model;
use Sergey\Oop\core\DataBase;


abstract class Model
{

    protected $db;

    protected string $tableName;

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * from {$this->tableName} WHERE id = $id";
        return $this->db->queryOne($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * from {$this->tableName}";
        return $this->db->queryOne($sql);
    }
}