<?php

class Pegawai_Admin extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Pegawai';

        // Fetch data from the employee table
        $data['data'] = $this->model('Pegawai_Model')->getAllPegawaiWithAkun();
        $data['nama_user'] = $_SESSION['username'] ?? '';

        // Tampilkan view dengan data pegawai
        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);
        $this->view('admin/pegawai/index', $data);
        $this->view('admin/template/footer');
    }

    public function formTambah()
    {
        // Fetch data from the account table (akun)
        $data['akun'] = $this->model('Pegawai_Model')->getAllAkun();

        $this->view('admin/pegawai/tambah_pegawai', $data);
    }

    
    public function prosesTambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengumpulkan data dari formulir
            $nama_user = $_POST['nama_user'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat_pegawai'];
            $no_telp = $_POST['no_telp_pegawai'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
            $level = $_POST['level'];
    
            // Data untuk tabel 'user'
            $data_user = [
                'nama_user' => $nama_user,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'no_telp' => $no_telp
            ];
    
            // Data untuk tabel 'akun'
            $data_akun = [
                'username' => $username,
                'password' => $password,
                'level' => $level
            ];
    
            // Memanggil model Pegawai_Model untuk menambahkan data ke tabel 'user' dan 'akun'
            $pegawai_model = $this->model('Pegawai_Model');
    
            // Menambahkan data ke tabel 'user' dan mendapatkan id_user yang baru ditambahkan
            $id_user = $pegawai_model->addUser($data_user);
    
            if ($id_user) {
                // Menambahkan data ke tabel 'akun' dengan id_user yang baru ditambahkan
                $data_akun['id_user'] = $id_user;
                if ($pegawai_model->addAkun($data_akun) > 0) {
                    Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                    header('Location: ' . BASEURL . '/Pegawai_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                    exit;
                }
            }
    
            // Jika ada kesalahan, atau gagal menambahkan data
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Ganti dengan alamat tujuan jika gagal menambahkan data
            exit;
        } else {
            Flasher::setFlash('gagal', 'Form tidak valid', 'danger');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Ganti dengan alamat tujuan jika form tidak valid
            exit;
        }
    }

    public function formUbah()
    {
        $id_pegawai = $_POST['id_user'];
        $data['ubahdata'] = $this->model('Pegawai_Model')->getPegawaiById($id_pegawai);
        $data['akun'] = $this->model('Pegawai_Model')->getAllAkun();

        $this->view('admin/pegawai/update_pegawai', $data);
    }
    public function prosesUbah()
    {
        $produkModel = $this->model('pegawai_model');
        $dataPegawai = $produkModel->getPegawaiById($_POST['id_user']); // Mendapatkan data produk yang ingin diubah
    
        // Jika data produk ditemukan
        if ($dataPegawai) {
            $data = [
                'id_user' => $_POST['id_user'],
                'nama_user' => $_POST['nama_user'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat_pegawai'],
                'no_telp' => $_POST['no_telp_pegawai'],
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'level' => $_POST['level']
            ];    
            // Process updating employee data
            // ...
    
            // Call the update method with the $data array as an argument
            if ($this->model('Pegawai_Model')->update($data)) {
                Flasher::setFlash('berhasil', 'diperbarui', 'success');
                header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect after successfully updating data
                exit;
            } else {
                Flasher::setFlash('gagal', 'diperbarui', 'danger');
                header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect if failed to update data
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'Form tidak valid', 'danger');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect if form is not valid
            exit;
        }
    }

    public function formHapus()
    {
        $this->view('admin/produk/hapus_produk');
    }

    
    public function prosesHapus($id_user)
    {
        
            if ($this->model('pegawai_model')->delete($id_user)) {
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/Pegawai_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
            }

            Flasher::setFlash('gagal', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/Pegawai_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
        
    }  
}
