<?php
include "../config/koneksi.php"; // Pastikan koneksi database sudah benar
include "../config/cek.php";    // Cek session dan login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama_pasien = mysqli_real_escape_string($conn, $_POST['nama_pasien']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $diagnosa = mysqli_real_escape_string($conn, $_POST['diagnosa']);
    $pengobatan = mysqli_real_escape_string($conn, $_POST['pengobatan']);
    $catatan = isset($_POST['catatan']) ? mysqli_real_escape_string($conn, $_POST['catatan']) : '';

    // Simpan data ke database
    $query = "INSERT INTO rekam_medis (nama_pasien, no_hp, alamat, diagnosa, pengobatan, catatan, tgl_rekam_medis)
              VALUES ('$nama_pasien', '$no_hp', '$alamat', '$diagnosa', '$pengobatan', '$catatan', NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika berhasil simpan, buat PDF
        include('../fpdf181/fpdf.php'); // Path yang benar ke FPDF

        // Instansiasi objek FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Set margin
        $pdf->SetMargins(20, 20, 20);

        // Header
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(50, 50, 150);
        $pdf->Cell(0, 10, 'Rekam Medis Pasien', 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(0, 10, date('d F Y, H:i'), 0, 1, 'C');
        $pdf->Ln(10);

        // Garis pemisah
        $pdf->SetLineWidth(0.5);
        $pdf->SetDrawColor(50, 50, 150);
        $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
        $pdf->Ln(10);

        // Informasi Pasien
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(50, 10, 'Nama Pasien:', 0, 0);
        $pdf->Cell(0, 10, $nama_pasien, 0, 1);
        $pdf->Cell(50, 10, 'No. HP:', 0, 0);
        $pdf->Cell(0, 10, $no_hp, 0, 1);
        $pdf->Cell(50, 10, 'Alamat:', 0, 0);
        $pdf->MultiCell(0, 10, $alamat);
        $pdf->Ln(5);

        // Garis pemisah
        $pdf->SetLineWidth(0.3);
        $pdf->SetDrawColor(200, 200, 200);
        $pdf->Line(20, $pdf->GetY(), 190, $pdf->GetY());
        $pdf->Ln(10);

        // Diagnosa dan Pengobatan
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Diagnosa:', 0, 0);
        $pdf->MultiCell(0, 10, $diagnosa);
        $pdf->Ln(5);

        $pdf->Cell(50, 10, 'Pengobatan:', 0, 0);
        $pdf->MultiCell(0, 10, $pengobatan);
        $pdf->Ln(5);

        // Catatan
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Catatan:', 0, 0);
        $pdf->MultiCell(0, 10, $catatan);
        $pdf->Ln(10);

        // Footer
        $pdf->SetY(-30);
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->SetTextColor(150, 150, 150);
        $pdf->Cell(0, 10, 'Dokumen ini dibuat secara otomatis oleh sistem.', 0, 1, 'C');

        // Output PDF ke browser
        $pdf->Output('I', 'Rekam_Medis_' . date('YmdHis') . '.pdf'); // 'I' untuk tampil di browser
        exit; // Hentikan eksekusi setelah output PDF
    } else {
        // Jika gagal menyimpan, tampilkan pesan kesalahan
        echo "Data gagal disimpan: " . mysqli_error($conn);
    }
} else {
    // Jika akses langsung ke file ini tanpa submit, redirect ke halaman rekam medis
    header("Location: rekam_medis.php");
    exit();
}
?>
