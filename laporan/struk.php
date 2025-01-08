<?php
require "../fpdf181/fpdf.php";
require "../config/koneksi.php";
session_start();

class Mypdf extends FPDF
{
    function header()
    {
        $this->SetFont('Times', 'B', 10);
        $this->Cell(80, 15, 'Struk Pendaftaran', 0, 0, 'C');
        $this->ln();
        $this->Cell(80, 15, 'Puskesmas Lamongan', 0, 0, 'C');
        $this->SetFont('Times', '', 14);
        $this->ln();
        $this->ln();
    }

    function mycell($w, $h, $x, $t)
    {
        $height = $h / 3;
        $first = $height + 2;
        $second = $height * 2 + 3;
        $len = strlen($t);

        if ($len > 20) {
            $txt = str_split($t, 20);
            $this->SetX($x);
            $this->Cell($w, $first, $txt[0], '', '', '');
            $this->SetX($x);
            $this->Cell($w, $second, $txt[1], '', '', '');
            $this->SetX($x);
            $this->Cell($w, $h, '', 'LTRB', 0, 'C', 0);
        } else {
            $this->SetX($x);
            $this->Cell($w, $h, $t, 'LTRB', 0, 'C', 0);
        }
    }
}

$no_antrian = $_GET['id'];

// Pisahkan $no_antrian berdasarkan simbol "/"
$parts = explode("/", $no_antrian);

// Ambil bagian terakhir setelah simbol "/"
$no_antrian_setelah_slash = end($parts);

// Query untuk mengambil data pendaftaran, customer, layanan, dan jenis layanan
$queryy = mysql_query("
    SELECT pendaftaran.*, customer.nama, layanan.nama_layanan, jenis_layanan.jenis_layanan 
    FROM pendaftaran 
    JOIN customer ON pendaftaran.id_customer = customer.id_customer 
    JOIN layanan ON pendaftaran.id_layanan = layanan.id_layanan 
    JOIN jenis_layanan ON pendaftaran.id_jenis_layanan = jenis_layanan.id_jenis_layanan
    WHERE no_antrian = '$no_antrian'
");

$dt = mysql_fetch_array($queryy);

$pdf = new Mypdf('P', 'pt', array(340, 137.16));
$pdf->AddPage();
$pdf->SetFont('Times', '', 8);

// Set a smaller font size for table content
$pdf->SetFont('Arial', '', 7); // Adjusted font size to 7 for the table

// Nama Pasien
$pdf->SetFont('Times', '', 7);
$pdf->mycell(100, 20, 20, 'Nama Pasien');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 7);
$pdf->mycell(100, 20, 20, $dt['nama']);
$pdf->Ln();

// Jenis Layanan
$pdf->SetFont('Times', '', 7);
$pdf->mycell(100, 20, 20, 'Jenis Layanan');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 7);
$pdf->mycell(100, 20, 20, $dt['jenis_layanan']);
$pdf->Ln();

// Nama Layanan
$pdf->SetFont('Times', '', 7);
$pdf->mycell(100, 20, 20, 'Nama Layanan');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 7);
$pdf->mycell(100, 30, 20, $dt['nama_layanan']);
$pdf->Ln();

// Menambahkan link yang dapat diklik
$pdf->SetFont('Times', '', 6); // Keep the font size smaller for the message
$pdf->SetX(20);

// URL yang akan ditampilkan
$link = "http://localhost/puskesmas/ambil_nomor.php"; 

// Set the color for the link (blue)
$pdf->SetTextColor(0, 0, 255);

// Create a clickable link
$pdf->Write(10, 'Klik di sini untuk Ambil Antrian', $link);

// Reset text color to default
$pdf->SetTextColor(0, 0, 0); // Black text

// Ensure that the output is only one page
$pdf->Output();
?>
