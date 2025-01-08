<?php
include '../config/koneksi.php'; //  jalur ke file koneksi 

function fetchTransactionData($conn) {
    // Mengambil data transaksi per bulan
    $query = "SELECT DATE_FORMAT(tanggal, '%Y-%m') as bulan, COUNT(*) as jumlah_pelanggan 
              FROM transaksi 
              GROUP BY bulan 
              ORDER BY bulan";
    $result = $conn->query($query);

    $transaction_data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $transaction_data[] = $row;
        }
    }

    return $transaction_data;
}
?>
