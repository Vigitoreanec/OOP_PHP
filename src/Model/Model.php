<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;
use Sergey\Oop\Interfaces\IModel;


abstract class Model implements IModel
{

    abstract static protected function getTableName();

    protected $query = [];

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

        return DataBase::getInstance()->queryAll($sql);
    }

    public static function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * from $tableName WHERE id = :id" . PHP_EOL;
        return DataBase::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * from $tableName" . PHP_EOL;
        return DataBase::getInstance()->queryAll($sql);
    }

    
}
