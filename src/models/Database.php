<?php

# archivo de conexion a la base de datos

class Database {

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->createConnection();
    }

    private function createConnection() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            error_log($e->getMessage(),3, __DIR__ . '/../error.log');
        }
    }

    public function getConnection() {
        return $this->connection;
    }

}