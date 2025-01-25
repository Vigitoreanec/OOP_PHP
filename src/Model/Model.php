<?php

namespace Sergey\Oop\Model;
use Sergey\Oop\core\DataBase;
use Sergey\Oop\Interfaces\IModel;


abstract class Model implements IModel
{

    protected $db;

    abstract protected function getTableName();
    

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