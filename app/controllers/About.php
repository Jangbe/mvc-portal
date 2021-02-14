<?php

class About extends Controller{
    public function index()
    {
        $this->view('home/index', ['nama' => 'Devi']);
    }
}