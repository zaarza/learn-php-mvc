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

    public function searchMahasiswaByName($keyword)
    {
        $this->db->query("SELECT * FROM $this->tableName WHERE nama LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->resultSet();
    }

    public function getDetailMahasiswa($id)
    {
        $this->db->query("SELECT * FROM $this->tableName WHERE id=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function updateMahasiswa($id, $data)
    {
        if (
            !isset($id) ||
            !isset($data['nama']) ||
            !isset($data['email']) ||
            !isset($data['jurusan']) ||
            !isset($data['nrp'])
        ) {
            return false;
        }

        $this->db->query("UPDATE $this->tableName SET nama=:nama, nrp=:nrp, email=:email, jurusan=:jurusan WHERE id=:id");

        $this->db->bind('id', intval($id));
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
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

    public function deleteMahasiswa($id)
    {
        $this->db->query("DELETE FROM $this->tableName WHERE id=:id");
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
