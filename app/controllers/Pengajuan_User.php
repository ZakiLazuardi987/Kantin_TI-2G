<?php

class Pengajuan_User extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Pengajuan';

        // Fetch data from the employee table
        $data['dataPengajuan'] = $this->model('Pengajuan_Model')->getAllPengajuan();
        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/pengajuan/index', $data);
        $this->view('admin/template/footer');
    }

    public function formTambah()
    {
        $data['pengajuan'] = $this->model('Pengajuan_Model')->getAllPengajuan();

        $this->view('user/pengajuan/tambah_pengajuan', $data);
    }

    public function prosesTambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['gambar_produk']['name'])) {
            $gambar_produk = $_FILES['gambar_produk']['name'];
            $tmp_gambar_produk = $_FILES['gambar_produk']['tmp_name'];
            $dir = BASEURL . '/img/pengajuan/';

    
            // Memindahkan file yang diunggah ke direktori tujuan
            move_uploaded_file($tmp_gambar_produk, $dir . $gambar_produk);
    
            $data = [
                'id_pengajuan' => isset($_POST['id_pengajuan']) ? $_POST['id_pengajuan'] : null,
                'nama_produk' => $_POST['nama_produk'],
                'harga' => $_POST['harga'],
                'gambar_produk' => $gambar_produk,
                'status_pengajuan' => isset($_POST['status']) ? $_POST['status'] : null,
            ];
    
            if ($this->model('Pengajuan_Model')->add($data) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan jika gagal menambahkan data
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'gambar gagal diunggah', 'danger');
            header('Location: ' . BASEURL . '/Pengajuan_User'); // Ganti dengan alamat tujuan jika gagal mengunggah gambar
            exit;
        }
    }

    public function formUbah()
    {
        $id_pegawai = $_POST['id_pengajuan'];
        $data['ubahdata'] = $this->model('Pengajuan_Model')->getPengajuanById($id_pengajuan);
        $data['pengajuan'] = $this->model('Pengajuan_Model')->getAllPengajuan();

        $this->view('user/pengajuan/update_pengajuan', $data);
    }

    public function prosesUbah()
    {

        if ($this->model('Pengajuan_Model')->update($data) > 0) {
            Flasher::setFlash('berhasil', 'diperbarui', 'success');
            header('Location: ' . BASEURL . '/Pengajuan_Model'); // Redirect after successfully updating data
            exit;
        } else {
            Flasher::setFlash('gagal', 'diperbarui', 'danger');
            header('Location: ' . BASEURL . '/Pengajuan_Model'); // Redirect if failed to update data
            exit;
        }
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


