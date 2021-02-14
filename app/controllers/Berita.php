<?php

class Berita extends Controller{
    public function index()
    {
        $berita = $this->model("Berita_model")->getAllBerita();
        $kategori = $this->model('Kategori_model')->getKategori();

        $this->view('layout/user_header');
        $this->view('berita/index', compact(['berita', 'kategori']));
        $this->view('layout/user_footer');
    }

    public function tambah()
    {
        // var_dump($_POST); die;
        $result = $this->model('Berita_model')->tambahBerita($_POST);
        if($result > 0){
            header('location: '.url('berita'));
            exit;
        }
    }

    public function edit($id = '')
    {
        if(!empty($_POST)){
            $result = $this->model('Berita_model')->editBerita($_POST);
            header('location: '.url());
            exit;
        }else{
            if(!empty($id)){
                $berita = $this->model('Berita_model')->getDetailBerita($id);
                $kategori = $this->model('Kategori_model')->getKategori();
                
                $this->view('layout/user_header');
                $this->view('berita/edit', compact(['berita', 'kategori']));
                $this->view('layout/user_footer');
            }else{
                header('location: '.url());
                exit;
            }
        }
    }

    public function detail($id)
    {
        $berita = $this->model('Berita_model')->getDetailBerita($id);

        $this->view('layout/user_header');
        $this->view('berita/detail', compact('berita'));
        $this->view('layout/user_footer');
    }
}