<?php

namespace Sergey\Oop\Model;
use Sergey\Oop\core\DataBase;


abstract class Model
{

    protected $db;

    abstract protected function getTableName() : string;
    

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * from {$this->getTableName()} WHERE id = $id";
        return $this->db->queryOne($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * from {$this->getTableName()}";
        return $this->db->queryOne($sql);
    }
}