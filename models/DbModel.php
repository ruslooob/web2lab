<?php

class DbModel
{
    protected PDO $dbh;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if (!($config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config/config.ini"))) {
            throw new Exception("Ошибка парсинга файла инициализации бд");
        }

        try {
            $init_str = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
            $this->dbh = new PDO($init_str, $config['login'], $config['password']);
        } catch (PDOException $e) {
            die();
        }
    }

    public function getDBHandler(): PDO
    {
        return $this->dbh;
    }
}
