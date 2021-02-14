<?php

class Home extends Controller{

    public function index(){
        $berita = $this->model("Berita_model")->getAllBerita();
        $data['nama'] = 'Devi';
        $data['berita'] = $berita;
        $this->view('layout/user_header', $data);
        $this->view('home/index', $data);
        $this->view('layout/user_footer');

    }
}