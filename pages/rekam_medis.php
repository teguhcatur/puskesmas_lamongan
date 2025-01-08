<?php
include "../config/koneksi.php";
include "../config/cek.php";  // Pastikan session_start() ada di sini, tidak perlu lagi di rekam_medis.php

// Ambil data pengguna yang login
$username = $_SESSION['username'];
$query_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$user_data = mysqli_fetch_array($query_user);

$nama = $user_data['nama'];
$no_hp = $user_data['no_hp'];
$alamat = $user_data['alamat'];

// Ambil riwayat rekam medis berdasarkan id_customer
$query_rekam = mysqli_query($conn, "SELECT * FROM rekam_medis WHERE id_customer = (SELECT id_customer FROM customer WHERE no_hp = '$no_hp') ORDER BY tgl_rekam_medis DESC");

if (isset($_GET['status']) && $_GET['status'] == 'success') {
    // Jika data berhasil disimpan, buat PDF
    $fpdfPath = '../fpdf181/fpdf.php';
    if (file_exists($fpdfPath)) {
        include($fpdfPath);
    } else {
        die('File fpdf.php tidak ditemukan di ' . $fpdfPath);
    }

    // Instansiasi objek FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set Font
    $pdf->SetFont('Arial', 'B', 16);

    // Judul
    $pdf->Cell(200, 10, 'Rekam Medis Pasien', 0, 1, 'C');
    $pdf->Ln(10);

    // Tampilkan data rekam medis
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 10, 'Nama Pasien: ' . $nama);
    $pdf->Ln(6);
    $pdf->Cell(50, 10, 'No. HP: ' . $no_hp);
    $pdf->Ln(6);
    $pdf->Cell(50, 10, 'Alamat: ' . $alamat);
    $pdf->Ln(10);

    $pdf->Cell(50, 10, 'Diagnosa: ' . $_POST['diagnosa']);
    $pdf->Ln(6);
    $pdf->Cell(50, 10, 'Pengobatan: ' . $_POST['pengobatan']);
    $pdf->Ln(6);
    $pdf->Cell(50, 10, 'Catatan: ' . $_POST['catatan']);
    $pdf->Ln(10);

    // Output PDF ke browser
    $pdf->Output();
    exit; // Hentikan eksekusi PHP setelah menghasilkan PDF
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis - Puskesmas Lamongan</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/tooplate-style.css">

    <style>
        /* Custom styling */
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        #rekam_medis {
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #4CAF50;
            text-transform: uppercase;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-md-6 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <section id="rekam_medis">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Rekam Medis</h2>

                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                        <div class="alert alert-success" role="alert">
                            Data berhasil disimpan! PDF akan segera diunduh.
                        </div>
                    <?php endif; ?>

                    <form id="rekam_medis_form" method="POST" action="proses_rekam_medis.php">
                        <div class="form-group col-md-6">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $nama; ?>" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="no_hp">No. Handphone</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $no_hp; ?>" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="diagnosa">Diagnosa</label>
                            <textarea class="form-control" id="diagnosa" name="diagnosa" required></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pengobatan">Pengobatan</label>
                            <textarea class="form-control" id="pengobatan" name="pengobatan" required></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn-submit" id="submit_rekam_medis" name="submit_rekam_medis">Simpan Rekam Medis</button>
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
