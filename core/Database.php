<?php

namespace PHPFramework;

class Database
{

    public \PDO $connection;
    public \PDOStatement $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=" . DB['host'] . ";dbname=" . DB['dbname'] . ";charset=" . DB['charset'];
        try {
            $this->connection = new \PDO($dsn, DB['username'], DB['password'], DB['options']);
        } catch (\PDOException $e) {
            abort($e->getMessage(), 500);
        }
//        return $this;
    }

}