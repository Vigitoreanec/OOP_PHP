<?php

namespace Sergey\Oop\Core;

use PDO;
use PDOStatement;
use Sergey\Oop\Model\Model;
use Sergey\Oop\traits\TSingletone;

class DataBase
{
    private array $config = [
        'driver' => 'sqlite',
        'host' => 'localhost',
        'login' => '',
        'password' => '',
        'database' => 'database.db'
    ];

    use TSingletone;

    private ?PDO $connection = null;

    private function getConnection(): PDO
    {
        if (is_null($this->connection)) {
            $this->connection = new PDO("{$this->config['driver']}:../{$this->config['database']}");
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function query(string $sql, array $params = []): PDOStatement
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function lastInsertId(): int
    {
        return $this->getConnection()->lastInsertId();
    }

    public function execute(string $sql, array $params = []): PDOStatement
    {
        return $this->query($sql, $params);
    }


    //Select where id = :id, ['id' => 1]
    public function queryOne(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryOneObject(string $sql, array $params, string $class)
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $pdoStatement->fetch();
    }


    //select All
    public function queryAll($sql): bool|array
    {
        return $this->query($sql)->fetchAll();
    }

}
