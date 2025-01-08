<?php
// Pastikan pustaka FPDF sudah diunduh dan tersedia di folder yang sama dengan file ini
require('fpdf.php');

// Ambil data dari query string
$dokter = isset($_GET['dokter']) ? $_GET['dokter'] : '';
$ruangan = isset($_GET['ruangan']) ? $_GET['ruangan'] : '';
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('d-m-Y');
$nomorAntrian = isset($_GET['nomor_antrian']) ? $_GET['nomor_antrian'] : '001';

// Periksa apakah data sudah diisi
if (empty($dokter) || empty($ruangan)) {
    die('Data dokter dan ruangan tidak lengkap.');
}

// Buat objek FPDF untuk membuat PDF dengan ukuran kertas (80mm x dinamis panjang)
$pdf = new FPDF('P', 'mm', array(80, 150)); // 'P' untuk potrait, 'mm' untuk satuan milimeter, dan ukuran awal 80mm x 150mm
$pdf->AddPage(); // Tambahkan halaman baru

// Atur font untuk header
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 102, 204); // Warna teks biru
$pdf->Cell(0, 10, 'PUSKESMAS LAMONGAN', 0, 1, 'C');

// Tambahkan alamat klinik
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0); // Warna teks hitam
$pdf->Cell(0, 5, 'Jl. Veteran No. 55, Lamongan', 0, 1, 'C');
$pdf->Cell(0, 5, 'WA: 082139834922', 0, 1, 'C');

// Tambahkan garis pemisah
$pdf->Ln(5);
$pdf->SetDrawColor(0, 0, 0); // Warna garis hitam
$pdf->Line(10, 30, 70, 30);

// Tambahkan informasi pasien dan antrian
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0); // Kembalikan warna teks ke hitam
$pdf->Cell(0, 8, 'Dokter: ' . $dokter, 0, 1, 'L');
$pdf->Cell(0, 8, 'Ruangan: ' . $ruangan, 0, 1, 'L');
$pdf->Cell(0, 8, 'Tanggal: ' . $tanggal, 0, 1, 'L');
$pdf->Cell(0, 8, 'No. Antrian: ' . $nomorAntrian, 0, 1, 'L');

// Tambahkan garis pemisah
$pdf->Ln(5);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Line(10, 70, 70, 70);

// Tambahkan catatan tambahan di bawah dengan warna merah dan font miring
$pdf->Ln(5);
$pdf->SetFont('Arial', 'I', 8);
$pdf->SetTextColor(255, 0, 0); // Warna teks merah
$pdf->MultiCell(0, 5, 'Harap tunggu panggilan Anda. Nomor antrian ini berlaku hanya untuk hari ini. Jangan hilangkan struk ini.');

// Tambahkan border di sekitar struk untuk tampilan yang lebih profesional
$pdf->SetDrawColor(0, 0, 0); // Warna border hitam
$pdf->Rect(5, 5, 70, $pdf->GetY() + 5, 'D'); // Gambar border di sekitar struk

// Output PDF ke browser
$pdf->Output('I', 'karcis_antrian.pdf');
?>
