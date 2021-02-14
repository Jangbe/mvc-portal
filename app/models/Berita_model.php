<?php

class Berita_model{
    private $db;
    private $table = 'berita';

    public function __construct()
    {
        $this->db = new Database($this->table);
    }

    public function getAllBerita()
    {
        return $this->db->all();
    }

    public function getDetailBerita($id)
    {
        $berita = $this->db->query("SELECT * FROM berita JOIN kategori ON berita.id_kategori=kategori.id_kategori
                                                         JOIN user ON berita.id_user=user.id_user  WHERE berita.id_berita=:id");
        $this->db->bind('id', $id);

        return $berita->first();
    }

    public function editBerita($post)
    {
        $this->db->query("UPDATE berita SET judul_berita=:judul_berita,
                                            isi_berita=:isi_berita,
                                            id_kategori=:id_kategori
                                        WHERE id_berita=:id_berita");
        $this->db->bind('judul_berita', $post['judul_berita']);
        $this->db->bind('isi_berita', $post['isi_berita']);
        $this->db->bind('id_kategori', $post['id_kategori']);
        $this->db->bind('id_berita', $post['id_berita']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahBerita($post)
    {
        $this->db->query("INSERT INTO berita (judul_berita, isi_berita, id_user, id_kategori)
                          VALUES (:judul_berita, :isi_berita, 1, :id_kategori)");
        $this->db->bind('judul_berita', $post['judul_berita']);
        $this->db->bind('isi_berita', $post['isi_berita']);
        $this->db->bind('id_kategori', $post['id_kategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

}