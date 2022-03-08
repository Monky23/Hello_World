<?php

namespace Database;

use PDO;

class DBConnection
{

    private $dbname; //'blogdb_jm'
    private $host;
    private $username; //'root'
    private $password; //'0000'
    private $pdo;
    //private $port;// = '3306';
    ////private $charset;// = 'utf8mb4';
    //private $dsn; // = "mysql:host=$host;dbname=$db;port=$port;charset=$charset"

    public function __construct(string $dbname, string $host, string $username, string $password)
    {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        //$this->port = $port;
        //$this->charset = $charset;
        //$this->dsn = $dsn;
    }

    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbname}; host={$this->host}", $this->username, $this->password, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8',
            \PDO::ATTR_EMULATE_PREPARES   => false
        ]);
    }
}