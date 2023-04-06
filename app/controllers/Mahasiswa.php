<?php
    class Mahasiswa extends Controller {
        public function index() {
            $data['title'] = "Mahasiswa";
            $data['mahasiswa'] = $this->model("Mahasiswa_Model")->getAllMahasiswa();
            $this->view("templates/header", $data);
            $this->view("mahasiswa/index", $data);
            $this->view("templates/footer");
        }
    }