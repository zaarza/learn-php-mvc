<?php 
    class About {
        public function index($nama = "Nama", $usia = "Usia") {
            echo "Halo nama saya $nama, Saya berusia $usia tahun";
        }
        public function page() {
            echo "About/page";
        }
    }