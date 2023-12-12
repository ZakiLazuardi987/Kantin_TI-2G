<?php

class Notifications_Admin extends Controller {
    public function index()
    {
        $data['title'] = 'Notifications Admin';
        $data['dataPengajuan'] = $this->model('Pengajuan_Model')->getAllPengajuan();

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
        $this->view('admin/notifications/index', $data);
        $this->view('admin/template/footer');
    }

    public function notifications()
    {
        $this->view('admin/notifications/updateStatus');   
    }

    public function tambah() {
        // Logika untuk menangani permintaan tambah produk
        $produkModel = $this->model('Produk_Model');

        // Ambil data yang diperlukan dari POST atau sumber data lainnya
        $data = [
            'id_kategori' => $_POST['id_kategori'],
            'nama_produk' => $_POST['nama_produk'],
            'harga' => $_POST['harga'],
            'gambar_produk' => $_POST['gambar_produk'],
        ];

        // Panggil method add di Produk_Model
        $result = $produkModel->add($data);

        // Handle hasil penambahan (tampilkan pesan, redirect, atau kirim respons JSON, dll.)
        if ($result > 0) {
            // Produk berhasil ditambahkan
            echo "Produk berhasil ditambahkan!";
        } else {
            // Produk gagal ditambahkan
            echo "Gagal menambahkan produk!";
        }
    }

}