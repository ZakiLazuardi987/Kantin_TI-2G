<?php

require_once '../Database.php';

//use classes\

class Daily_Report {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function laporan() {
        // Daily sales report
        $sql =
            "SELECT DATE(tgl_order) AS date, COUNT(id_pesanan) AS total_orders, SUM(detail_pesanan.harga * detail_pesanan.qty) AS total_sales
            FROM pesanan
            JOIN detail_pesanan ON pesanan.id_pesanan = detail_pesanan.id_pesanan
            GROUP BY date";
        $result = $this->db->conn->query($sql);

        // Format data daily report
        $dailyReportData = [];
        while ($row = $result->fetch_assoc()) {
            $dailyReportData[] = $row;
        }

        // Return formatted data daily report
        return $dailyReportData;
    }
}

// Using Daily Report class
// $dailyReport = new Daily_Report();
// $reportData = $dailyReport->laporan();
// echo json_encode($reportData);

