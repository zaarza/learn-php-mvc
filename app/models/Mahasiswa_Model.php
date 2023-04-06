<?php
    class Mahasiswa_Model {
        // Database handler
        private $dbh;
        // Statement
        private $stmt;
        
        public function __construct(){
            $host = "localhost";
            $dbname = "php-mvc";
            $username = "root";
            $password = "";

            // Data source name
            $dsn = "mysql:host=$host;dbname=$dbname";

            try {
                $this->dbh = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAllMahasiswa() {
            $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }