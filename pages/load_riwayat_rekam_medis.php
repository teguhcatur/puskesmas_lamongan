<?php
include "../config/koneksi.php";
include "../config/cek.php";  

// Ambil data pengguna yang login
$username = $_SESSION['username'];
$query_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$user_data = mysqli_fetch_array($query_user);

$no_hp = $user_data['no_hp']; // Ambil nomor HP pengguna yang login

// Ambil riwayat rekam medis berdasarkan nomor HP pengguna
$query_rekam = mysqli_query($conn, "SELECT * FROM rekam_medis WHERE no_hp = '$no_hp' ORDER BY tgl_rekam_medis DESC");

echo "<table class='table table-striped'>
        <thead>
            <tr>
                <th>Tanggal Rekam Medis</th>
                <th>Diagnosa</th>
                <th>Pengobatan</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>";

while ($rekam_data = mysqli_fetch_array($query_rekam)) {
    echo "<tr>
            <td>" . $rekam_data['tgl_rekam_medis'] . "</td>
            <td>" . $rekam_data['diagnosa'] . "</td>
            <td>" . $rekam_data['pengobatan'] . "</td>
            <td>" . $rekam_data['catatan'] . "</td>
          </tr>";
}

echo "</tbody></table>";
?>
