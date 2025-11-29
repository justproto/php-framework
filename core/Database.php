<?php

namespace PHPFramework;

class Database
{

    protected \PDO $connection;
    protected \PDOStatement $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=" . DB['host'] . ";dbname=" . DB['dbname'] . ";charset=" . DB['charset'];
        try {
            $this->connection = new \PDO($dsn, DB['username'], DB['password'], DB['options']);
        } catch (\PDOException $e) {
            error_log("[" . date('Y-m-d H:i:s'). "] DB Error: {$e->getMessage()}" . PHP_EOL, 3, ERROR_LOG_FILE);
            abort($e->getMessage(), 500);
        }
        return $this;
    }

    public function query(string $query, array $params = [])
    {
        try{
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);
        } catch(\PDOException $e){
            error_log("[" . date('Y-m-d H:i:s'). "] DB Error: {$e->getMessage()}" . PHP_EOL, 3, ERROR_LOG_FILE);
            abort($e->getMessage(), 500);
        }
        return $this;
    }

    public function get(): array|false
    {
        return $this->stmt->fetchAll();
    }

    public function findAll($tbl): array|false
    {
        $this->query("SELECT * FROM {$tbl}");
        return $this->stmt->fetchAll();
    }

    public function findOne($tbl, $id)
    {
        $this->query("SELECT * FROM {$tbl} WHERE id = ? LIMIT 1",[$id]);
        return $this->stmt->fetch();
    }

    public function findOrFail($tbl, $id)
    {
        $res = $this->findOne($tbl, $id);
        if (!$res) abort();
        return $res;
    }

    public function getInsertId(): false|string
    {
        return $this->connection->lastInsertId();
    }

    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }
}