<?php
    class Database {
        private $databaseHostname = DATABASE_HOSTNAME;
        private $databaseName = DATABASE_NAME;
        private $databaseUser = DATABASE_USER;
        private $databasePassword = DATABASE_PASSWORD;
        private $databaseHandler;
        private $statement;

        public function __construct() {
            $dataSourceName = "mysql:host=$this->databaseHostname;dbname=$this->databaseName";
            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->databaseHandler = new PDO($dataSourceName, $this->databaseUser, $this->databasePassword, $option);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
        }

        public function query($query) {
            $this->statement = $this->databaseHandler->prepare($query);
        }

        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;
                    default :
                        $type = PDO::PARAM_STR;
                        break;
                } 
            }

            $this->statement->bindValue($param, $value, $type);
        }

        public function execute() {
            $this->statement->execute();
        }

        public function resultSet() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_ASSOC);
        }
    }