<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;
use Sergey\Oop\Interfaces\IModel;


abstract class Model implements IModel
{

    protected $db;

    abstract protected function getTableName();

    protected $query = [];

    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function query()
    {
        $this->query = []; // очистка
        return $this;
    }

    public function where(string $key, string $value)
    {
        $this->query = [
            'key' => $key,
            'value' => $value
        ];
        return $this;
    }

    public function get()
    {
        $tableName = $this->getTableName();
        $queryCondition = implode(' = ', $this->query);
        //$queryCondition = implode(' AND ', $this->query);
        $sql = "SELECT * from $tableName";

        if (!empty($queryCondition)) {
            $sql .= " WHERE $queryCondition;";
        }

        return $this->db->queryAll($sql);
    }

    public function getOne(int $id)
    {
        $sql = "SELECT * from {$this->getTableName()} WHERE id = :id" . PHP_EOL;
        return $this->db->queryOne($sql, ['id' => $id]);
    }
    public function getAll()
    {
        $sql = "SELECT * from {$this->getTableName()}" . PHP_EOL;
        return $this->db->queryAll($sql);
    }
}
