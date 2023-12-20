<?php
class Transaksi_Model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductByName()
    {
        $this->db->query("SELECT nama_produk FROM produk");
        return $this->db->resultSet();
    }
    public function getHargaProduk()
    {
        $this->db->query("SELECT nama_produk, harga FROM produk");
        $result = $this->db->resultSet(); // Simpan hasil query ke dalam variabel $result

        $data_produk = array(); // Inisialisasi array untuk menyimpan data produk

        // Cek jika hasil query mengembalikan baris data
        if ($result) {
            foreach ($result as $row) {
                $data_produk[] = $row;
            }
        }

        return $data_produk; // Mengembalikan data produk sebagai array
    }

   
    public function transaksi($data) {
        // Iterasi untuk mendapatkan tanggal order dari setiap data keranjang
        $tglOrder = null;
        foreach ($data['keranjang'] as $item) {
            $tglOrder = $item['tgl_order'];
            break; // Mengambil hanya satu nilai, bisa disesuaikan jika Anda butuh data lainnya
        }
    
        // Pastikan $tglOrder tidak null sebelum digunakan
        if ($tglOrder !== null) {
            // Menginisialisasi total qty dan total pembayaran
            $totalQty = 0;
            $totalPembayaran = $data['total_pembayaran'];
    
            // Menyiapkan query untuk memasukkan data transaksi ke tabel transaksi
            $query = "INSERT INTO transaksi (tgl_order, total_qty, total_bayar) VALUES (:tgl_order, :total_qty, :total_bayar)";
            
            // Menjalankan query dengan mengikat nilai dari variabel-variabel yang telah disiapkan sebelumnya
            $this->db->query($query);
            $this->db->bind('tgl_order', $tglOrder);
            
            // Menghitung total qty dari setiap keranjang
            foreach ($data['keranjang'] as $item) {
                $id_produk = $item['id_produk'];
                $qty = $item['qty'];
                $totalQty += $qty;

        
        }
            $this->db->bind('total_qty', $totalQty);
            $this->db->bind('total_bayar', $totalPembayaran);
            $this->db->execute();

        $queryGetLastID = "SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
        $this->db->query($queryGetLastID);
        $this->db->execute();
        $lastInsertedID = $this->db->fetchColumn(); // Mengambil ID transaksi terakhir

        var_dump($lastInsertedID);

        if (!empty($lastInsertedID)) {
        $cashAmount = $data['cashAmount'];
        $kembalian = $data['kembalian'];

            $query = "INSERT INTO detail_transaksi (id_transaksi, id_keranjang, nominal_bayar, kembalian) VALUES (:id_transaksi, :id_keranjang, :nominal_bayar, :kembalian)";
            $this->db->query($query);
            
            
            foreach ($data['keranjang'] as $id_keranjang => $item) {
                $id = $id_keranjang;
                var_dump($id);
                var_dump($kembalian);
                //$this->db->query($query);
                $this->db->bind('id_transaksi', $lastInsertedID);
                $this->db->bind('id_keranjang', $id);
                $this->db->bind('nominal_bayar', $cashAmount);
                $this->db->bind('kembalian', $kembalian);
                var_dump($query);
                $this->db->execute();
            

            }
        }
            return $this->db->rowCount(); // Mengembalikan total qty sebagai contoh
        } else {
            // Lakukan tindakan jika tglOrder null, misalnya kembalikan pesan error atau tindakan lainnya
            return 0;
        }
    }
    
    
    
    public function getAllTransaction()
    {
        // kueri left join dengan tabel keranjang dan kurangkan stok dengan qty di keranjang
        $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC");
        return $this->db->resultSet();
    }

    public function getLaporanByDate($tanggalFilter)
    {
        $query = "SELECT 
                    tgl_order,
                    COUNT(*) as total_transaksi,
                    SUM(total_qty) as total_produk_terjual,
                    SUM(total_bayar) as total_penjualan
                FROM transaksi
                WHERE tgl_order = :tanggalFilter
                GROUP BY tgl_order";

        $this->db->query($query);
        $this->db->bind(':tanggalFilter', $tanggalFilter);
        return $this->db->resultSet();
    }

    public function getHistoryByDate($tanggalFilter)
    {
        $this->db->query("SELECT * FROM transaksi WHERE tgl_order = :tanggalFilter ORDER BY id_transaksi DESC");
        $this->db->bind(':tanggalFilter', $tanggalFilter);
        $result = $this->db->resultSet();
    
        // Check if the result set is empty, fetch all transactions
        if (empty($result)) {
            $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC");
            return $this->db->resultSet();
        }
    
        return $result;
    }

    public function getLaporanHistoryByDate($tanggalFilter)
    {
        $this->db->query("SELECT * FROM transaksi WHERE tgl_order = :tanggalFilter ORDER BY id_transaksi DESC");
        $this->db->bind(':tanggalFilter', $tanggalFilter);
        $result = $this->db->resultSet();
    
        // Check if the result set is empty for the specific date
        if (empty($result)) {
            // If empty, redirect to Laporan_Admin.php
            header("Location: " . BASEURL . "/Laporan_Admin");
            exit();
        }
    
        return $result;
    }
    
    
}
