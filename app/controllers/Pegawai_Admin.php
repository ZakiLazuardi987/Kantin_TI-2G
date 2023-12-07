<?php

class Pegawai_Admin extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Pegawai';

        // Fetch data from the employee table
        $data['dataPegawai'] = $this->model('Pegawai_Model')->getAllPegawai();

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
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
            $data = [
                'id_akun' => $_POST['id_akun'],
                'nama_pegawai' => $_POST['nama_pegawai'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'no_telp_pegawai' => $_POST['no_telp_pegawai'],
                'alamat_pegawai' => $_POST['alamat_pegawai'],
            ];

            if ($this->model('Pegawai_Model')->add($data) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect to the employee data page
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect if failed to add data
                exit;
            }
        }
    }

    public function formUbah()
    {
        $id_pegawai = $_POST['id_pegawai'];
        $data['ubahdata'] = $this->model('Pegawai_Model')->getPegawaiById($id_pegawai);
        $data['akun'] = $this->model('Pegawai_Model')->getAllAkun();

        $this->view('admin/pegawai/update_pegawai', $data);
    }

    public function prosesUbah()
    {
        // Process updating employee data
        // ...

        if ($this->model('Pegawai_Model')->update($data) > 0) {
            Flasher::setFlash('berhasil', 'diperbarui', 'success');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect after successfully updating data
            exit;
        } else {
            Flasher::setFlash('gagal', 'diperbarui', 'danger');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect if failed to update data
            exit;
        }
    }

    public function prosesHapus($id_pegawai)
    {
        if ($this->model('Pegawai_Model')->delete($id_pegawai)) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect after successfully deleting data
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pegawai_Admin'); // Redirect if failed to delete data
            exit;
        }
    }
}
