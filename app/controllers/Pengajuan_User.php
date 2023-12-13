<?php

class Pengajuan_User extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Pengajuan';

        // Fetch data from the employee table
        $data['dataPengajuan'] = $this->model('Pengajuan_Model')->getAllPengajuan();
        $data['kategori'] = $this->model('Pengajuan_Model')->getAllCategories();
        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/pengajuan/index', $data);
        $this->view('admin/template/footer');
    }

    public function formTambah()
    {
        $data['kategori'] = $this->model('Pengajuan_Model')->getAllCategories();

        $this->view('user/pengajuan/tambah_pengajuan', $data);
    }

    public function prosesTambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['gambar_produk']['name'])) {
            $gambar_produk = $_FILES['gambar_produk']['name'];
            $tmp_gambar_produk = $_FILES['gambar_produk']['tmp_name'];
            $dir = 'img/pengajuan/'; // Ganti dengan direktori tujuan relatif terhadap direktori skrip PHP Anda
    
            // Memindahkan file yang diunggah ke direktori tujuan
            move_uploaded_file($tmp_gambar_produk, $dir . $gambar_produk);

            $data = [
                'id_kategori' => $_POST['id_kategori'],
                'nama_produk' => $_POST['nama_produk'],
                'harga' => $_POST['harga'],
                'gambar_produk' => $gambar_produk,
            ];

            if ($this->model('Pengajuan_Model')->add($data) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'gambar gagal diunggah', 'danger');
            header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan jika terjadi kesalahan
            exit;
        }                    
    }



    public function formUbah()
    {
        $id_pengajuan = $_POST['id_pengajuan'];
        $data['ubahdata'] = $this->model('Pengajuan_Model')->getPengajuanById($id_pengajuan);
        $data['kategori'] = $this->model('Pengajuan_Model')->getAllCategories();

        $this->view('user/pengajuan/update_pengajuan', $data);
    }

    public function prosesUbah()
    {
        $pengajuanModel = $this->model('Pengajuan_Model');
        $dataPengajuan = $pengajuanModel->getPengajuanById($_POST['$id_pengajuan']);

        if ($dataPengajuan) {
            $gambar_produk_sebelumnya = $_POST['gambar_produk_sebelumnya'];
    
            $data = [
                'id_pengajuan' => $_POST['id_pengajuan'],
                'id_kategori' => $_POST['id_kategori'],
                'nama_produk' => $_POST['nama_produk'],
                'harga' => $_POST['harga'],
                'gambar_produk' => $gambar_produk_sebelumnya // Menyimpan nama gambar produk yang sudah ada sebagai default
            ];

            if (!empty($_FILES['gambar_produk']['name'])) {
                $gambar_produk = $_FILES['gambar_produk']['name'];
                $tmp_gambar_produk = $_FILES['gambar_produk']['tmp_name'];
                $dir = BASEURL . 'app/img/pengajuan/';
    
                // Memindahkan file yang diunggah ke direktori tujuan
                move_uploaded_file($tmp_gambar_produk, $dir . $gambar_produk);
    
                $data['gambar_produk'] = $gambar_produk; // Mengupdate nama gambar jika ada perubahan gambar
            }
    
            // Proses pembaruan data menggunakan $data
            if ($pengajuanModel->update($data) > 0) {
                Flasher::setFlash('berhasil', 'diperbarui', 'success');
                header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan setelah berhasil memperbarui data
                exit;
            }
        }
    
        Flasher::setFlash('gagal', 'diperbarui', 'danger');
        header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan jika gagal memperbarui data
        exit;
    }

    public function prosesHapus($id_pengajuan)
    {
        if ($this->model('Pengajuan_Model')->delete($id_pengajuan)) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Pengajuan_User'); // Redirect after successfully deleting data
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pengajuan_User'); // Redirect if failed to delete data
            exit;
        }
    }
}


