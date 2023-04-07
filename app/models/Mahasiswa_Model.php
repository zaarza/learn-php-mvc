<?php
class Mahasiswa_Model
{
    private $tableName = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM $this->tableName");
        return $this->db->resultSet();
    }

    public function getDetailMahasiswa($id)
    {
        $this->db->query("SELECT * FROM $this->tableName WHERE id=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function newMahasiswa($data)
    {
        $this->db->query("INSERT INTO $this->tableName VALUES (NULL, :nama, :nrp, :email, :jurusan)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
