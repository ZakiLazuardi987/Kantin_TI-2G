<?php

class Laporan_Admin extends Controller {
    public function index()
    {
        $data['nama_user'] = $_SESSION['username'] ?? '';

        $this->view('admin/template/header');
        $this->view('admin/template/navbar', $data);
        $this->view('admin/template/sidebar', $data);

        // Get all transactions by default
        $data['data'] = $this->model('Laporan_Model')->getAllReport();

        // Check if a date filter is provided
        if (isset($_POST['filter'])) {
            $tanggalFilter = $_POST['tanggal'];
            // If a filter is applied, get filtered transactions
            $data['data'] = $this->model('Laporan_Model')->getLaporanData($tanggalFilter);
        }

        // Fetch transaction details for the first transaction (assuming there is at least one transaction)
        if (!empty($data['data'])) {
            $firstTransaction = $data['data'][0];
            $transactionDetails = $this->model('Laporan_Model')->getTransactionDetails($firstTransaction['Tanggal']);

            // Pass the transaction details to the view
            $data['transactionDetails'] = $transactionDetails;
        }

        $this->view('admin/laporanPenjualan/index', $data);
        $this->view('admin/template/footer');
    }

    public function detail()
    {
        $tanggal = $_GET['tanggal'] ?? null;
    
        if ($tanggal) {
            $transactionDetails = $this->model('Laporan_Model')->getTransactionDetails($tanggal);
            $data['transaksi'] = $transactionDetails;
        } else {
            $data['transaksi'] = null; // Handle the case when no date is provided
        }
    
        $this->view('admin/laporanPenjualan/detail_laporan', $data);
    }
    
}
?>
