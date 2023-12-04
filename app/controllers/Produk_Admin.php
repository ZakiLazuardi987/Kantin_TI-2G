<?php

class Produk_Admin extends Controller {
    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
        $this->view('admin/produk/daftar_produk', $data); // Create a new view file for displaying the list of products
        $this->view('admin/template/footer');
    }

    // public function formUbah($id_produk)
    // {
    //     $data['title'] = 'Ubah Data Produk';
    //     $data['ubahdata'] = $this->model('Produk_Model')->getProductById($id_produk);
    //     $data['kategori'] = $this->model('Produk_Model')->getAllCategories();

    //     $this->view('admin/template/header', $data);
    //     $this->view('admin/template/navbar');
    //     $this->view('admin/template/sidebar');
    //     $this->view('admin/produk/edit_produk', $data);
    //     $this->view('admin/template/footer');
    // }

    public function formUbah()
    {
        // $data['title'] = 'Ubah Data Produk';
        $id_produk = $_POST['id_produk'];
        $data['ubahdata'] = $this->model('Produk_Model')->getProductById($id_produk);
        $data['kategori'] = $this->model('Produk_Model')->getAllCategories();

        $this->view('admin/produk/update_produk', $data);
        
    }

    public function prosesTambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['gambar_produk']['name'])) {
            $gambar_produk = $_FILES['gambar_produk']['name'];
            $tmp_gambar_produk = $_FILES['gambar_produk']['tmp_name'];
            $dir = BASEURL . 'img/produk/';

    
            // Memindahkan file yang diunggah ke direktori tujuan
            move_uploaded_file($tmp_gambar_produk, $dir . $gambar_produk);
    
            $data = [
                'id_kategori' => $_POST['id_kategori'],
                'nama_produk' => $_POST['nama_produk'],
                'harga' => $_POST['harga'],
                'gambar_produk' => $gambar_produk // Menyimpan nama file gambar dalam basis data
            ];
    
            if ($this->model('Produk_Model')->add($data) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Home_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Produk_Admin'); // Ganti dengan alamat tujuan jika gagal menambahkan data
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'gambar gagal diunggah', 'danger');
            header('Location: ' . BASEURL . '/Produk_Admin'); // Ganti dengan alamat tujuan jika gagal mengunggah gambar
            exit;
        }
    }
    

    public function prosesUbah()
    {
        $produkModel = $this->model('Produk_Model');
        $dataProduk = $produkModel->getProductById($_POST['id_produk']); // Mendapatkan data produk yang ingin diubah

        // Jika data produk ditemukan
        if ($dataProduk) {
            $data = [
                'id_produk' => $_POST['id_produk'],
                'id_kategori' => $_POST['id_kategori'],
                'nama_produk' => $_POST['nama_produk'],
                'harga' => $_POST['harga'],
                'gambar_produk' => $dataProduk['gambar_produk'] // Menyimpan nama gambar produk yang sudah ada sebagai default
            ];

            // Jika ada gambar yang dipilih untuk diunggah
            if (!empty($_FILES['gambar_produk']['name'])) {
                $gambar_produk = $_FILES['gambar_produk']['name'];
                $tmp_gambar_produk = $_FILES['gambar_produk']['tmp_name'];
                $dir = BASEURL . 'img/produk/';

                // Memindahkan file yang diunggah ke direktori tujuan
                move_uploaded_file($tmp_gambar_produk, $dir . $gambar_produk);

                $data['gambar_produk'] = $gambar_produk; // Mengupdate nama gambar jika ada perubahan gambar
            } else {
                // Jika tidak ada gambar yang diunggah, gunakan nama gambar yang sudah ada sebelumnya
                $data['gambar_produk'] = $dataProduk['gambar_produk'];
            }

            if ($produkModel->update($data) > 0) {
                Flasher::setFlash('berhasil', 'diperbarui', 'success');
                header('Location: ' . BASEURL . '/Home_Admin'); // Ganti dengan alamat tujuan setelah berhasil memperbarui data
                exit;
            }
        }

        Flasher::setFlash('gagal', 'diperbarui', 'danger');
        header('Location: ' . BASEURL . '/Home_Admin'); // Ganti dengan alamat tujuan jika gagal memperbarui data
        exit;
    }


    public function prosesHapus($id_produk)
    {
        
            if ($this->model('Produk_Model')->delete($id_produk)) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Home_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
            }
        
    }
}

