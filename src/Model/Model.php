<?php

namespace Sergey\Oop\Model;

use Sergey\Oop\core\DataBase;
use Sergey\Oop\Interfaces\IModel;


abstract class Model implements IModel
{

    abstract static protected function getTableName();

    protected $query = [];

    private function setId(int $id)
    {
        return static::setId($id);
    }

    protected function getId()
    {
        return static::getId();
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

    public function insertModel()
    {
        $tableName = static::getTableName();
        $params = [];
        $columns = [];
        $values = [];

        foreach ($this as $key => $value) {
            if ($key != 'id' && $value != null) {
                $params[] = $key;
                $columns[] = '?';
                $values[] = $value;
            }
        }

        $paramColumns = implode(', ', $params); //id
        $columnsCount = implode(', ', $columns);

        $sql = "INSERT INTO $tableName ($paramColumns) VALUES ($columnsCount)";

        DataBase::getInstance()->execute($sql, $values);
        $this->setId(DataBase::getInstance()->lastInsertId());
        var_dump("Данные добавлены");
        // var_dump($this);
        // die();
        return $this;
    }

    public function save()
    {
        if (is_null($this->getId())) {
            $this->insertModel();
        } else {
            $this->update();
        }
        return $this;
    }

    public function update() {}
}
