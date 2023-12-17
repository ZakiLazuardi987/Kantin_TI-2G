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

    public function bayar(string $id_akun, string $tgl_order): void
    {
        $this->db->query("SELECT * FROM keranjang INNER JOIN produk ON keranjang.id_produk = produk.id_produk");
        $result = $this->db->resultSet();
        $total = 0;
        foreach ($result as $item) {
            $total += $item['qty'] * $item['harga'];
        }
        $this->db->query("INSERT INTO pesanan (id_akun,tgl_order) VALUES (:id_akun, :tgl_order)");
        $this->db->bind('id_akun', $id_akun);
        $this->db->bind('tgl_order', $tgl_order);
        $this->db->execute();
        // get id pesanan
        $this->db->query("SELECT id_pesanan FROM pesanan WHERE id_akun = :id_akun AND tgl_order = :tgl_order ORDER BY id_pesanan DESC LIMIT 1");
        $this->db->bind('id_akun', $id_akun);
        $this->db->bind('tgl_order', $tgl_order);
        $this->db->execute();
        $id_pesanan = $this->db->single()['id_pesanan'];
        // lakukan perulangan untuk insert ke tabel detail_pesanan
        foreach ($result as $item) {
            $this->db->query("INSERT INTO detail_pesanan (id_pesanan, id_produk, qty, harga) VALUES (:id_pesanan, :id_produk, :qty, :harga)");
            $this->db->bind('id_pesanan', $id_pesanan);
            $this->db->bind('id_produk', $item['id_produk']);
            $this->db->bind('qty', $item['qty']);
            $this->db->bind('harga', $item['harga']);
            $this->db->execute();
        }
        // update stok produk
        foreach ($result as $item) {
            $this->db->query("UPDATE produk SET stok = stok - :qty WHERE id_produk = :id_produk");
            $this->db->bind('id_produk', $item['id_produk']);
            $this->db->bind('qty', $item['qty']);
            $this->db->execute();
        }
        $this->db->query("DELETE FROM keranjang WHERE id_akun = :id_akun");
        $this->db->bind('id_akun', $id_akun);
        $this->db->execute();
    }

    public function transaksi($data) {
        // Menginisialisasi totalQty
        $totalQty = 0;
    
        // Menghitung total qty dari setiap keranjang
        foreach ($data['keranjang'] as $item) {
            $qty = $item['qty'];
            $totalQty += $qty;
        }
        echo $totalQty;
    
        // Mendapatkan total pembayaran dari input
        $totalPembayaran = $data['total_pembayaran'];
    
        // Mendapatkan tanggal order dari data keranjang (misalnya diambil dari salah satu item keranjang)
        $tglOrder = $data['keranjang'][0]['tgl_order'];
    
        // Menyiapkan query untuk memasukkan data transaksi ke tabel transaksi
        $query = "INSERT INTO transaksi (tgl_order, total_qty, total_bayar) VALUES (:tgl_order, :total_qty, :total_bayar)";
    
        // Menjalankan query dengan mengikat nilai dari variabel-variabel yang telah disiapkan sebelumnya
        $this->db->query($query);
        $this->db->bind('tgl_order', $tglOrder);
        $this->db->bind('total_qty', $totalQty);
        $this->db->bind('total_bayar', $totalPembayaran);
        $this->db->execute();
    
        return $totalQty;
    }
    
    public function getAllTransaction()
    {
        // kueri left join dengan tabel keranjang dan kurangkan stok dengan qty di keranjang
        $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC");
        return $this->db->resultSet();
    }

    public function getDataByDate($tanggalFilter)
{
    $query = "SELECT tgl_order, COUNT(*) as total_transaksi, SUM(total_qty) as total_produk_terjual, SUM(total_bayar) as total_penjualan
              FROM transaksi
              WHERE tgl_order = :tanggalFilter
              GROUP BY tgl_order";

    $this->db->query($query);
    $this->db->bind(':tanggalFilter', $tanggalFilter);
}


}
