<?php
include "config/koneksi.php";
?>
<?php
error_reporting(0);
session_start();
?>   

<!DOCTYPE html>
<html lang="en">
<head>

     <title>Puskesmas Lamongan</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>


     


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand"><i class="fa fa-h-square"></i>Puskesmas Lamongan</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">Tentang Kami</a></li>
                         <li><a href="#layanan" class="smoothScroll">Jadwal Layanan</a></li>
                         <li class="appointment-btn"><a href="login.php">Login</a></li>
                         <li class="appointment-btn"><a href="register.php">Daftar</a></li>
                         <li class="appointment-btn"><a href="ambil_nomor.php">No Antrian </a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Layanan Kesehatan Wilayah Kecamatan Lamongan</h3>
                                             <h1>Puskesmas Lamongan</h1>
                                             <a href="login.php" class="section-btn btn btn-default smoothScroll">Login Sekarang Untuk Mengambil No Antrian</a><br><br>
                                             <a href="register.php" class="section-btn btn btn-primary smoothScroll">Daftar Akun Baru</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                        <h3>Layanan Kesehatan Wilayah Kecamatan Lamongan</h3>
                                             <h1>Puskesmas Lamongan</h1>
                                             <a href="login.php" class="section-btn btn btn-default smoothScroll">Login Sekarang Untuk Mengambil No Antrian</a><br><br>
                                             <a href="register.php" class="section-btn btn btn-primary smoothScroll">Daftar Akun Baru</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                        <h3>Layanan Kesehatan Wilayah Kecamatan Lamongan</h3>
                                             <h1>Puskesmas Lamongan</h1>
                                             <a href="login.php" class="section-btn btn btn-default smoothScroll">Login Sekarang Untuk Mengambil No Antrian</a><br><br>
                                             <a href="register.php" class="section-btn btn btn-primary smoothScroll">Daftar Akun Baru</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">
                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Tentang Kami</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>"Kepuasan Pelanggan Adalah Kebahagiaan Kami"
                                        Adalah motto dari puskesmas lamongan sebagai pelayan masyarakat dengan tujuan 
                                        meningkatkan derajat kesehatan masyarakat <br>
                                        Alamat : Jl. Veteran No. 55, Lamongan
                                   </p>

                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

          <!-- ABOUT -->
          <section id="layanan">
          <div class="container">
               <div class="row">
                    <div class="col-md-6 col-sm-6">
                         <div class="layanan">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Jadwal Layanan</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>  Pelayanan Pendaftaran              <b>Senin - Sabtu        8.00 - 11.00</b><br> 
                                        Pelayanan Pemeriksaan Umum          <b>Senin - Sabtu          8.00 - Selesai</b><br>
                                        Pelayanan Kesehatan Lansia          <br>
                                        Pelayanan Kesehatan Gigi Mulut<br>
                                        Pelayanan KB <br>
                                        Pelayanan Laboratorium<br>
                                        Pelayanan Kefarmasian<br>
                                        Konsultasi Kesehatan & Konseling<br>
                                        Pelayanan Surat Keterangan Dokter<br>
                                        Pelayanan Calon Pengantin          <b>Senin - Jum'at          8.00 - Selesai</b><br>
                                        Pelayanan TB Paru & Kusta<br>
                                        Pelayanan Gizi<br>
                                        Pelayanan PTM<br>
                                        Pelayanan Imunisasi                <b>Senin - Rabu            8.00 - Selesai</b>  <br>
                                        Pelayanan Jiwa                     <b>Jum'at                  8.00 - Selesai</b><br>
                                        Pelayanan Gawat Darurat            <b>Setiap Hari               24 Jam</b><br>
                                        Pelayanan Persalinan<br>
                                   </p>

                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Informasi Lanjut</h4>
                              <p>Untuk mengetahui informasi lebih lanjut, silahkan hubungi kontak berikut.</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i>WA +6282139834922</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">Pkmlamongan@yahoo.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         &nbsp;
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Sosial Media</h4>
                                   <p>Instagram <span>@puskesmas_lamongan</span></p>
                                   <p>Instagram <span>@puskesmas_lamongan</span></p>
                              </div>
                         </div>
                    </div>

                         
                    </div>

               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>