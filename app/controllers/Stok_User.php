<?php

class Stok_User extends Controller
{
    public function index()
    {
        $data['title'] = 'Home Stok';
        $data['data'] = $this->model('Produk_Model')->getAllProducts();
        $data['kategori'] = $this->model('Produk_Model')->getAllCategories();

        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/stok/index', $data);
        $this->view('admin/template/footer');
    }

    public function formStokTambah()
    {
        // Assuming you're using POST data, make sure to handle validation
        $id_produk = $_POST['id_produk'] ?? null;
        $data['id_produk'] = $_POST['id_produk'] ?? null;
        // Check if $id_produk is set before proceeding
        if ($id_produk !== null) {
            $this->view('user/stok/form_tambah', $data);
        } else {
            // Handle the case when $id_produk is not set
            echo "Gagal menampilkan form stok tambah. ID produk tidak valid.";
        }
    }
    public function formStokKurang()
    {
        // Assuming you're using POST data, make sure to handle validation
        $id_produk = $_POST['id_produk'] ?? null;
        $data['id_produk'] = $_POST['id_produk'] ?? null;

        // Check if $id_produk is set before proceeding
        if ($id_produk !== null) {
            $this->view('user/stok/form_kurang', $data);
        } else {
            // Handle the case when $id_produk is not set
            echo "Gagal menampilkan form stok kurang. ID produk tidak valid.";
        }
    }


    public function prosesTambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_produk = $_POST['id_produk'];
            $stok_Tambah = $_POST['stok_Tambah'];

            $stokModel = $this->model('Stok_Model');
            $result = $stokModel->tambahStok($id_produk, $stok_Tambah);
            if ($result > 0) {
                // Insertion successful
                echo "Stok berhasil ditambahkan!";
                header('Location: ' . BASEURL . '/Stok_User');
            } else {
                // Insertion failed
                echo "Gagal menambahkan stok.";
            }
        }
    }

    public function prosesKurang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_produk = $_POST['id_produk'];
            $stok_Kurang = $_POST['stok_Kurang']; // Sesuaikan dengan nama field formulir

            // Validasi input jika diperlukan

            // Panggil model atau akses database untuk mengurangkan stok
            $stokModel = $this->model('Stok_Model');
            $result = $stokModel->kurangiStok($id_produk, $stok_Kurang);

            if ($result > 0) {
                // Berhasil mengurangkan stok
                echo "Stok berhasil dikurangkan!";
                header('Location: ' . BASEURL . '/Stok_User');
            } else {
                // Gagal mengurangkan stok
                echo "Gagal mengurangkan stok.";
            }
        }
    }
}
