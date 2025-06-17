<?php
    namespace src\Config;
    use PDO;
    use PDOException;

    class connection{
        private $host ="db"; //origem:porta
        private $db_name="fatec";
        private $username="root";
        private $password="root";
        private $conn;

        public function getConnection(){
            try{
                $this->conn= new PDO("mysql:host=$this->host; dbname=$this->db_name",$this->username, $this->password);

                $this->conn->exec('set names utf8');

            }catch(PDOException $error){
                echo "Erro:".$error->getMessage();
            }

            return $this->conn;
        }
    }


?>