<?php

namespace Sergey\Oop\core;

use \PDO;

class DataBase
{
    private array $config =
    [
        'driver' => 'sqlite',
        'host' => 'localhost',
        'login' => '',
        'password' => '',
        'database' => 'blog.db'
    ];

    private ?\PDO $connection = null;

    private function getConnection(): PDO
    {
        if (is_null($this->connection)) {
            $this->connection = new PDO("{$this->config['driver']}:{$this->config['database']}");
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }


    //select where id = 1
    public function queryOne(string $sql, array $params)
    {
        return $sql;
    }

    //select All
    public function queryAll($sql)
    {
        return $sql;
    }
}
