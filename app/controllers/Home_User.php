<?php

class Home_User extends Controller
{
    public function index()
    {
        $data['title'] = 'Home User';
        $data['data'] = $this->model('Produk_Model')->getAllProducts();
        $data['keranjang'] = $this->model('Keranjang_Model')->getAllKeranjang();


        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/home/index', $data);
        $this->view('admin/template/footer');
    }

    public function formBayar()
    {
        // $data['title'] = 'Tambah Produk';
        //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();
        $this->view('user/home/form_bayar');
    }

    public function addToCart()
    {
        $this->model('Keranjang_Model')->addToCart($_POST);
        header('Location: ' . BASEURL . '/Home_User');
    }

    public function deleteCart(): void
    {
        $id_produk = $_POST['id_produk'];
        $this->model('Keranjang_Model')->deleteCart($id_produk);
        header('Location: ' . BASEURL . '/Home_User');
    }

    public function bayar(): void
    {
        $id_akun = $_POST['id_akun'];
        $tgl_order = $_POST['tgl_order'];
        $this->model('Transaksi_Model')->bayar($id_akun, $tgl_order);
        header('Location: ' . BASEURL . '/Home_User');
    }
}
