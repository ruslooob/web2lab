<?php

class DB
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect() : DB
    {
        $config = require_once 'config/config.php';
        $dsn = 'mysql:host=' . $config['host:port'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    public function execute(string $sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query(string $sql): array
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }
        return $result;
    }

}
