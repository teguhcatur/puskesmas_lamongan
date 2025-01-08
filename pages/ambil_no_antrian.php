<?php
include "../config/koneksi.php";
include "../config/cek.php";
error_reporting(0);
session_start();

date_default_timezone_set('Asia/Jakarta');
$tgl_pendaftaran = date("Y-m-d");
$queryy = mysql_query("SELECT no_antrian FROM pendaftaran WHERE tgl_pendaftaran = '$tgl_pendaftaran'");
$htg = mysql_num_rows($queryy);
$next = $htg + 1;
$no_antrian = $tgl_pendaftaran . '/' . $next;
$hitung = mysql_query("SELECT max(id_customer) as id_terakhir from customer");
$cari = mysql_fetch_array($hitung);
$id_lanjut = $cari['id_terakhir'] + 1;

// Mengambil data pengguna yang login
$username = $_SESSION['username'];
$query_user = mysql_query("SELECT * FROM user WHERE username = '$username'");
$user_data = mysql_fetch_array($query_user);

$nama = $user_data['nama'];
$no_hp = $user_data['no_hp'];
$alamat = $user_data['alamat'];

// Hitung tanggal minimal H-3 dari sekarang (tanggal minimal yang bisa dipilih)
$min_date = date('Y-m-d', strtotime('+3 days'));  // H+3 (3 hari setelah tanggal hari ini)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Puskesmas Lamongan</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/tooplate-style.css">
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>

    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="../index.php" class="navbar-brand"><i class="fa fa-h-square"></i>Puskesmas Lamongan</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Tombol Rekam Medis -->
                    <li class="appointment-btn"><a href="rekam_medis.php">Rekam Medis</a></li>
                     <!-- Tombol Logout -->
                     <li class="appointment-btn"><a href="../config/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form id="appointment-form" role="form" method="post" action="proses_pendaftaran.php">
                        <input type="hidden" class="form-control" id="nama" name="id_customer" value="<?=$id_lanjut;?>">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Minimal Booking H-3 Sebelum Pemeriksaan</h2>
                            <h2>Ambil No Antrian</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-6 col-sm-6">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?=$nama;?>" placeholder="Nama Anda" required=""/>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="no_hp">No. Handphone</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?=$no_hp;?>" placeholder="No. Handphone Anda" required=""/>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?=$alamat;?>" placeholder="Alamat Anda" required=""/>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="no_antrian">No. Antrian</label>
                                <input type="text" class="form-control-rounded form-control" value="<?php echo $next; ?>" required="" readonly name="next">
                                <input type="hidden" name="no_antrian" class="form-control-rounded form-control" value="<?php echo $no_antrian; ?>" required="" readonly>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="id_jenis_layanan">Jenis Layanan</label>
                                <?php
                                $result = mysql_query("SELECT * FROM jenis_layanan");
                                echo '<select class="form-control" name="id_jenis_layanan">';
                                echo '<option>Pilih Jenis Layanan</option>';
                                while ($row = mysql_fetch_array($result)) {
                                    echo '<option value="' . $row['id_jenis_layanan'] . '">' . $row['jenis_layanan'] . '</option>';
                                }
                                echo '</select>';
                                ?>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="nama_layanan">Nama Layanan</label>
                                <?php
                                $result_layanan = mysql_query("SELECT * FROM layanan");
                                echo '<select class="form-control" name="id_layanan" required>';
                                echo '<option>Pilih Nama Layanan</option>';
                                while ($row_layanan = mysql_fetch_array($result_layanan)) {
                                    echo '<option value="' . $row_layanan['id_layanan'] . '">' . $row_layanan['nama_layanan'] . '</option>';
                                }
                                echo '</select>';
                                ?>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="tgl_pendaftaran">Tanggal Daftar Pemeriksaan</label>
                                <input type="date" class="form-control" id="tgl_pendaftaran" name="tgl_pendaftaran" value="<?= $tgl_pendaftaran ?>" required>
                                <label for="jam_pendaftaran">Jam Pendaftaran</label>
                                <input type="time" class="form-control" id="jam_pendaftaran" name="jam_pendaftaran" required>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="form-control" id="cf-submit" name="submit">Ambil Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/smoothscroll.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/custom.js"></script>

    <!-- Validasi tambahan dengan JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.getElementById('tgl_pendaftaran');
        const submitButton = document.getElementById('cf-submit');
        const errorMessage = document.createElement('div');

        errorMessage.style.color = 'red';
        errorMessage.style.marginTop = '5px';
        errorMessage.textContent = 'Minimal booking H-3 sebelum pemeriksaan.';
        errorMessage.style.display = 'none';
        dateInput.parentElement.appendChild(errorMessage);

        // Hitung tanggal minimal (H-3)
        const today = new Date();
        const minBookingDate = new Date(today);
        minBookingDate.setDate(today.getDate() + 2); // H+3

        // Validasi ketika tanggal diubah
        dateInput.addEventListener('change', function () {
            const selectedDate = new Date(dateInput.value);

            // Jika tanggal yang dipilih kurang dari H-3
            if (selectedDate < minBookingDate) {
                errorMessage.style.display = 'block'; // Tampilkan pesan error
                submitButton.disabled = true; // Nonaktifkan tombol submit
            } else {
                errorMessage.style.display = 'none'; // Sembunyikan pesan error
                submitButton.disabled = false; // Aktifkan tombol submit
            }
        });
    });
    </script>
</body>
</html>
