<?php

class Pegawai_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($data)
    {
        $query = "INSERT INTO pegawai (id_pegawai, nama_pegawai, jenis_kelamin, no_telp_pegawai, alamat_pegawai) VALUES(:id_pegawai, :nama_pegawai, :jenis_kelamin, :no_telp_pegawai, :alamat_pegawai)";

        $this->db->query($query);
        $this->db->bind('id_pegawai', $data['id_pegawai']);
        $this->db->bind('nama_pegawai', $data['nama_pegawai']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('no_telp_pegawai', $data['no_telp_pegawai']);
        $this->db->bind('alamat_pegawai', $data['alamat_pegawai']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPegawai()
    {
        $this->db->query("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
        return $this->db->resultSet();
    }

    public function getAllAkun()
    {
        $this->db->query("SELECT * FROM akun");
        return $this->db->resultSet();
    }

    public function getPegawaiById($id_pegawai)
    {
        $query = "SELECT * FROM pegawai p, akun a WHERE p.id_akun = a.id_akun AND p.id_pegawai = :id_pegawai";

        $this->db->query($query);
        $this->db->bind('id_pegawai', $id_pegawai);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function update($data)
    {
        $query = "UPDATE pegawai SET id_akun = :id_akun, nama_pegawai = :nama_pegawai, jenis_kelamin = :jenis_kelamin, no_telp_pegawai = no_telp_pegawai, alamat_pegawai = :alamat_pegawai WHERE id_pegawai = :id_pegawai";

        $this->db->query($query);
        $this->db->bind('id_akun', $data['id_akun']);
        $this->db->bind('nama_pegawai', $data['nama_pegawai']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('no_telp_pegawai', $data['no_telp_pegawai']);
        $this->db->bind('alamat_pegawai', $data['alamat_pegawai']);
        $this->db->bind('id_pegawai', $data['id_pegawai']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id_produk)
    {
        $query = "DELETE FROM pegawai WHERE id_pegawai =:id_pegawai";

        $this->db->query($query);
        $this->db->bind('id_pegawai', $id_pegawai);

        $this->db->execute();
        return $this->db->rowCount();
    }
}