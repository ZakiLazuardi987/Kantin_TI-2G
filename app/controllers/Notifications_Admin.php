<?php

class Notifications_Admin extends Controller {
    public function index()
    {
        $data['title'] = 'Notifications Admin';
        $data['dataPengajuan'] = $this->model('Pengajuan_Model')->getAllPengajuan();

        $data['pengajuanMasuk'] = $this->model('Pengajuan_Model')->getAllPengajuanAfterAcc();
        
        
        $data['nama_user'] = $_SESSION['username'] ?? '';
        // $data['insert'] = $this->model('Produk_Model')->insertFromPengajuan();

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);
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

    public function notif(){
        $this->model('Dashboard_Model')->getNotif();
    }
    
    public function addFromPengajuan(){
        $idPengajuan = $_POST['id_pengajuan']; // Pastikan Anda mengambil ID pengajuan dari data yang dikirimkan melalui POST
        $this->model('Produk_Model')->insertFromPengajuan($idPengajuan);
    }

    public function acc(){
        $idPengajuan = $_POST['id_pengajuan']; // Pastikan Anda mengambil ID pengajuan dari data yang dikirimkan melalui POST
        $this->model('Produk_Model')->accPengajuan($idPengajuan);
    }

    public function tolak(){
        $idPengajuan = $_POST['id_pengajuan']; // Pastikan Anda mengambil ID pengajuan dari data yang dikirimkan melalui POST
        $this->model('Produk_Model')->tolakPengajuan($idPengajuan);
    }
    

    public function updateStatus()
    {
        try {
            // Logic to handle status update
            $pengajuanModel = $this->model('Pengajuan_Model');
        
            // Retrieve necessary data from POST or other sources
            $data = [
                'id_pengajuan' => $_POST['id_pengajuan'],
                'status_pengajuan' => $_POST['status_pengajuan'],
            ];
        
            // Call the update method in Pengajuan_Model
            $result = $pengajuanModel->updateStatus($data);
        
            // Handle the update result (display a message, redirect, or send a JSON response, etc.)
            if ($result) {
                // Status updated successfully
                echo "Status pengajuan berhasil diperbarui!";
                
                // Check if the status is "ACC" and call the method to insert data into the database
                if ($_POST['status_pengajuan'] == 'ACC') {
                    $this->insertDataPengajuan();
                }
            } else {
                // Failed to update status
                echo "Gagal memperbarui status pengajuan!";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    // Add a new function to insert data into the database
    private function insertDataPengajuan()
    {
        $idPengajuan = $_POST['id_pengajuan'];
        // Logic to insert data into the database
        $dataPengajuan = $this->model('Pengajuan_Model')->getPengajuanById($idPengajuan);

        // You can modify the code below to match your database schema and insert logic
        $produkModel = $this->model('Produk_Model');

        $data = [
            'id_kategori' => $dataPengajuan['id_kategori'],
            'nama_produk' => $dataPengajuan['nama_produk'],
            'harga' => $dataPengajuan['harga'],
            'gambar_produk' => $dataPengajuan['gambar_produk'],
        ];

        $result = $produkModel->add($data);

        // Handle the result as needed (display a message, redirect, or send a JSON response, etc.)
        if ($result > 0) {
            // Data successfully inserted
            echo "Data pengajuan berhasil diinsert ke database!";
        } else {
            // Failed to insert data
            echo "Gagal menginsert data pengajuan ke database!";
        }
    }

    public function prosesPengajuan()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_pengajuan = $_POST['id_pengajuan']; 
        if (isset($_POST['acc'])) {
            // Proses jika tombol 'acc' diklik
            // Ambil ID pengajuan dari form
            $this->model('Produk_Model')->accPengajuan($id_pengajuan);
            $this->model('Produk_Model')->insertFromPengajuan($id_pengajuan);
            //$this->model('Pengajuan_Model')->getAllPengajuanAfterAcc();

            Flasher::setFlash('berhasil', 'diacc', 'success');
                header('Location: ' . BASEURL . '/Notifications_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
           
        } elseif (isset($_POST['tolak'])) {
            // Proses jika tombol 'tolak' diklik
            $this->model('Produk_Model')->tolakPengajuan($id_pengajuan);
            //$this->model('Pengajuan_Model')->getAllPengajuanAfterReject();

            Flasher::setFlash('berhasil', 'ditolak', 'success');
                header('Location: ' . BASEURL . '/Notifications_Admin'); // Ganti dengan alamat tujuan setelah berhasil menambahkan data
                exit;
        } else {
            // Tindakan default jika tidak ada tombol yang diklik
            // Misalnya, tampilkan pesan kesalahan atau arahkan ke halaman lain
        }
    }
}

}