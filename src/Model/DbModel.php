<?php

namespace App\Model;
use Exception;
use PDO;
use PDOException;

class DbModel
{
    protected PDO $dbh;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        if (!($config = parse_ini_file("../config/config.ini"))) {
            echo "Ошибка парсинга файла инициализации бд";
            throw new Exception("Ошибка парсинга файла инициализации бд");
        }
        try {
            $initStr = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
            $this->dbh = new PDO($initStr, $config['login'], $config['password']);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getDBHandler(): PDO
    {
        return $this->dbh;
    }
}
