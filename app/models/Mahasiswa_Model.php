<?php
    class Mahasiswa_Model {
        private $tableName = 'mahasiswa';
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getAllMahasiswa() {
           $this->db->query("SELECT * FROM $this->tableName");
           return $this->db->resultSet();
        }

        public function getDetailMahasiswa($id) {
            $this->db->query("SELECT * FROM $this->tableName WHERE id=:id");
            $this->db->bind('id', $id);
            
            return $this->db->single();
        }
    }