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
        $query = "INSERT INTO user (id_user, nama_user, jenis_kelamin, alamat, no_telp) VALUES(:id_pegawai, :nama_pegawai, :jenis_kelamin, :alamat :no_telp)";

        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat_pegawai', $data['alamat']);
        $this->db->bind('no_telp_pegawai', $data['no_telp']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPegawai()
    {
        $this->db->query("SELECT * FROM user ORDER BY id_user DESC");
        return $this->db->resultSet();
    }

    public function getAllAkun()
    {
        $this->db->query("SELECT * FROM akun");
        return $this->db->resultSet();
    }

    public function getPegawaiById($id_user)
    {
        $query = "SELECT * FROM user u, akun a WHERE u.id_akun = a.id_akun AND u.id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function update($data)
    {
        $query = "UPDATE user SET nama_user = :nama_user, jenis_kelamin = :jenis_kelamin, alamat = :alamat, no_telp = :no_telp WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id_user)
    {
        $query = "DELETE FROM user WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);

        $this->db->execute();
        return $this->db->rowCount();
    }
}