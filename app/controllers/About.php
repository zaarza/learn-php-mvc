<?php
class About extends Controller
{
    public function index($nama = "Nama", $usia = "Usia")
    {
        $data['nama'] = 'Arza';
        $data['usia'] = '21';
        $data['title'] = 'About';

        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }

    public function page()
    {
        $data['title'] = "Page";

        $this->view("templates/header", $data);
        $this->view("About/page");
        $this->view("templates/footer");
    }
}
