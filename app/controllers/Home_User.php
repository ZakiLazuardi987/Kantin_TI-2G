<?php

class Home_User extends Controller
{
    public function index()
    {
        $data['title'] = 'Home User';
        $data['data'] = $this->model('Produk_Model')->getAllProductsNotStock();
        $data['kategori'] = $this->model('Produk_Model')->getAllCategories();
        $data['nama_produk'] = $this->model('Transaksi_Model')->getProductByName();
        $data['harga'] = $this->model('Transaksi_Model')->getHargaProduk();
        $data['keranjang'] = $this->model('Keranjang_Model')->getAllKeranjang();
        $data['nama_user'] = $_SESSION['username'] ?? '';
        //$data['id_akun'] = $_SESSION['id_akun'] ?? '';

        $this->view('user/template/header', $data);
        $this->view('user/template/navbar', $data);
        $this->view('user/template/sidebar', $data);
        $this->view('user/home/index', $data);
        $this->view('admin/template/footer');
    }
    public function formBayar()
    {
        // $data['title'] = 'Tambah Produk';
        //$data['kategori'] = $this->model('Produk_Model')->getAllCategories();
        $data['keranjang'] = $this->model('Keranjang_Model')->getAllKeranjang();
        $this->view('user/home/form_bayar', $data);
    }


    public function addToCart()
    
    {
        var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengumpulkan data dari formulir
            
    
            $produk = [
                'id_produk' => $_POST['id_produk'],
                'tgl_order' => $_POST['tgl_order'],
                'qty' => $_POST['qty']
            ];
    
                if ($this->model('Keranjang_Model')->addToCart($produk)> 0) {
                    
                    header('Location: ' . BASEURL . '/Home_User'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                    
                }
            
         
        }
    }

    public function deleteCart(): void
    {
        $id_keranjang = $_POST['id_keranjang'];
        $this->model('Keranjang_Model')->deleteCart($id_keranjang);
        header('Location: ' . BASEURL . '/Home_User');
    }

    public function bayar(): void
    {
        $id_akun = $_POST['id_akun'];
        $tgl_order = $_POST['tgl_order'];
        $this->model('Transaksi_Model')->bayar($id_akun, $tgl_order);
        header('Location: ' . BASEURL . '/Home_User');
    }

    public function prosesTransaksi()
    {
        var_dump($_POST);
        // Dummy data, bisa diganti dengan data dari inputan pengguna
        $keranjang = $_POST['keranjang']; // Mengambil seluruh data keranjang dari form
        $totalPembayaran = $_POST['total_pembayaran']; // Mengambil total pembayaran dari form
        $cashAmount = $_POST['cashAmount'];
        $kembalian = $_POST['kembalian'];

        // Menyiapkan data untuk transaksi
        $data = [
            'keranjang' => $keranjang,
            'total_pembayaran' => $totalPembayaran,
            'cashAmount' => $cashAmount,
            'kembalian' => $kembalian
        ];

        // Memanggil model dan fungsi transaksi untuk menyimpan data
        $model = $this->model('Transaksi_Model'); // Ganti dengan nama model yang sesuai
        $rowCount = $model->transaksi($data);

        // Mengurangi stok produk setelah transaksi berhasil
        if ($rowCount > 0) {
            foreach ($keranjang as $item) {
                $id_produk = $item['id_produk'];
                $qty = $item['qty'];
                
                // Mengurangi stok produk
                $this->model('Produk_Model')->updateStokProduk($id_produk, $qty);
            }

            header('Location: ' . BASEURL . '/Home_User');
        }
    }
    
}


