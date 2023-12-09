<?php

class Pegawai_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addUser($data)
    {
        $queryInsert = "INSERT INTO user (nama_user, jenis_kelamin, alamat, no_telp) VALUES(:nama_user, :jenis_kelamin, :alamat, :no_telp)";

        $this->db->query($queryInsert);
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['no_telp']);

        $this->db->execute();

        // Setelah INSERT, ambil ID yang baru saja ditambahkan dengan melakukan SELECT
        $querySelect = "SELECT LAST_INSERT_ID() as last_id";
        $this->db->query($querySelect);
        $result = $this->db->single();

        return $result['last_id'];
    }

    public function addAkun($data)
    {
        $query = "INSERT INTO akun (id_user, username, password, level) VALUES(:id_user, :username, :password, :level)";

        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('level', $data['level']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPegawaiWithAkun()
    {
        $query = "SELECT u.*, a.username, a.level FROM user u LEFT JOIN akun a ON u.id_user = a.id_user";
        $this->db->query($query);
        return $this->db->resultSet();
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
        $query = "SELECT * FROM user u, akun a WHERE u.id_user = a.id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);

        $this->db->execute();

        return $this->db->resultSet();
    }

    public function update($data)
    {
        try {
            // Mulai transaksi
            $this->db->query("START TRANSACTION");
    
            // Update data in the 'akun' table
            $queryUpdateAkun = "UPDATE akun SET username = :username, password = :password, level = :level WHERE id_user = :id_user";
            $this->db->query($queryUpdateAkun);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':level', $data['level']);
            $this->db->bind(':id_user', $data['id_user']);
            $this->db->execute();
    
            // Update data in the 'user' table
            $queryUpdateUser = "UPDATE user SET nama_user = :nama_user, jenis_kelamin = :jenis_kelamin, alamat = :alamat, no_telp = :no_telp WHERE id_user = :id_user";
            $this->db->query($queryUpdateUser);
            $this->db->bind(':nama_user', $data['nama_user']);
            $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
            $this->db->bind(':alamat', $data['alamat']);
            $this->db->bind(':no_telp', $data['no_telp']);
            $this->db->bind(':id_user', $data['id_user']);
            $this->db->execute();
            // Tampilkan nilai variabel sebelum eksekusi query
            echo "Data sebelum eksekusi query:";
            var_dump($this->db);

            $this->db->execute();

            // Tampilkan nilai variabel setelah eksekusi query
            echo "Data setelah eksekusi query:";
            var_dump($this->db);
    
            return true; // Return true jika pembaruan berhasil
        } catch (PDOException $e) {
            // Rollback transaksi jika terjadi kesalahan
            $this->db->query("ROLLBACK");
    
            // Log atau tangani kesalahan seperti yang diperlukan
            echo "Error: " . $e->getMessage();
    
            return false; // Return false jika pembaruan gagal
        }
    }
    
public function delete($id_user)
{
    try {
        // Mulai transaksi
        $this->db->query("START TRANSACTION");

        // Hapus data dari tabel 'akun'
        $queryAkun = "DELETE FROM akun WHERE id_user = :id_user";
        $this->db->query($queryAkun);
        $this->db->bind(':id_user', $id_user);
        $this->db->execute();

        // Hapus data dari tabel 'user'
        $queryUser = "DELETE FROM user WHERE id_user = :id_user";
        $this->db->query($queryUser);
        $this->db->bind(':id_user', $id_user);
        $this->db->execute();

        // Commit transaksi
        $this->db->query("COMMIT");

        return true; // Return true jika penghapusan berhasil
    } catch (PDOException $e) {
        // Rollback transaksi jika terjadi kesalahan
        $this->db->query("ROLLBACK");

        // Log atau tangani kesalahan seperti yang diperlukan
        echo "Error: " . $e->getMessage();

        return false; // Return false jika penghapusan gagal
    }
}
}