<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;
use Sergey\Oop\Interfaces\IModel;

abstract class DbModel implements IModel
{
    abstract static protected function getTableName();

    protected ?int $id = null;
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
        $sql = "SELECT * from $tableName WHERE id = :id";
        return DataBase::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM $tableName ORDER BY id DESC";
        return DataBase::getInstance()->queryAll($sql);
    }

    public function insertModel()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];

        foreach ($this->props as $key => $value) {
            $params[":" . $key] = $this->$key;
            $columns[] = $key;
        }

        $columns = implode(', ', $columns);
        $values = implode(', ', array_keys($params));

        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";


        DataBase::getInstance()->execute($sql, $params);

        $this->id = (DataBase::getInstance()->lastInsertId());
        return $this;
    }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insertModel();
        } else {
            $this->update();
        }
        return $this;
    }

    public function update()
    {
        $params = [];
        $colums = [];

        $tableName = static::getTableName();

        foreach ($this->props as $key => $value) {
            if (!$value) continue;
            $params[$key] = $this->$key;
            $colums[] .= "{$key} = :{$key}";
            $this->props[$key] = false;
        }
        $colums = implode(", ", $colums);
        $params['id'] = $this->id;

        $sql = "UPDATE $tableName SET {$colums} WHERE id = :id";
        var_dump($sql);
        die();
        DataBase::getInstance()->execute($sql, $params);
        return $this;
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM $tableName WHERE id = :id";
        return DataBase::getInstance()->execute($sql, ['id' => $this->id]);
    }
}
