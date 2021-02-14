<?php

class Kategori_model{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database($this->table);
    }

    public function getKategori()
    {
        return $this->db->all();    
    }
}