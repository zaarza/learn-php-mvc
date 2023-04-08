<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = "Mahasiswa";
        $data['mahasiswa'] = $this->model("Mahasiswa_Model")->getAllMahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data['title'] = "Detail";
        $data['id'] = $id;
        $data['mahasiswa'] = $this->model("Mahasiswa_Model")->getDetailMahasiswa($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }

    public function getDetailData()
    {
        echo json_encode($this->model("Mahasiswa_Model")->getDetailMahasiswa(intval($_POST['id'])));
    }

    public function new()
    {
        if ($this->model("Mahasiswa_Model")->newMahasiswa($_POST) > 0) {
            Flasher::setFlash("Berhasil menambahkan mahasiswa!", "success");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal menambahkan mahasiswa", "danger");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        }
    }

    public function update($id)
    {
        if ($this->model("Mahasiswa_Model")->updateMahasiswa($id, $_POST) > 0) {
            Flasher::setFlash("Berhasil merubah data mahasiswa", "success");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        } else if ($this->model("Mahasiswa_Model")->updateMahasiswa($id, $_POST) === 0) {
            Flasher::setFlash("Tidak ada perubahan data mahasiswa", "light");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal merubah data mahasiswa", "danger");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model("Mahasiswa_Model")->deleteMahasiswa($id) > 0) {
            Flasher::setFlash("Berhasil menghapus mahasiswa", "success");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("Gagal menghapus mahasiswa", "danger");
            header('Location: ' . BASE_URL . "/mahasiswa");
            exit;
        }
    }
}
