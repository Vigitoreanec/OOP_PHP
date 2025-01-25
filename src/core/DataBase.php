<?php

namespace Sergey\Oop\core;

use PDO;

class DataBase
{
    private array $config =
    [
        'driver' => 'sqlite',
        'host' => 'localhost',
        'login' => '',
        'password' => '',
        'database' => 'database.db'
    ];

    private static ?DataBase $instance = null;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private ?\PDO $connection = null;

    private function getConnection(): PDO
    {
        if (is_null($this->connection)) {
            var_dump("Подключение в БД");
            $this->connection = new PDO("{$this->config['driver']}:{$this->config['database']}");
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }


    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    //select where id = 1
    public function queryOne(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    //select All
    public function queryAll($sql)
    {
        return $this->query($sql)->fetchAll();
    }
}
