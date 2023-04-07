<?php
    class Mahasiswa extends Controller {
        public function index() {
            $data['title'] = "Mahasiswa";
            $data['mahasiswa'] = $this->model("Mahasiswa_Model")->getAllMahasiswa();
            $this->view("templates/header", $data);
            $this->view("mahasiswa/index", $data);
            $this->view("templates/footer");
        }

        public function detail($id) {
            $data['title'] = "Detail";
            $data['id'] = $id;
            $data['mahasiswa'] = $this->model("Mahasiswa_Model")->getDetailMahasiswa($id);
            $this->view("templates/header", $data);
            $this->view("mahasiswa/detail", $data);
            $this->view("templates/footer");
        }
    }