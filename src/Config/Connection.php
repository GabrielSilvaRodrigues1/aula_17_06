<?php
namespace src\Config;

use PDO;
use PDOException;

class Connection
{
    private $host = "db";
    private $db_name = "fatec";
    private $username = "root";
    private $password = "123456";
    private $conn = null;

    public function getConnection()
    {
        if ($this->conn === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8";
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                echo "Erro: " . $error->getMessage();
            }
        }
        return $this->conn;
    }
}