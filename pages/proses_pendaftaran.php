<?php 
require "../config/koneksi.php"; 

$next = $_POST['next'];
$id_customer = $_POST['id_customer'];  
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$no_antrian = $_POST['no_antrian'];
$id_jenis_layanan = $_POST['id_jenis_layanan'];
$id_layanan = $_POST['id_layanan']; // Ambil id_layanan dari form
$tgl_pendaftaran = $_POST['tgl_pendaftaran'];
date_default_timezone_set('Asia/Jakarta');
$jam_pendaftaran = $_POST['jam_pendaftaran'];

// Mengubah format tanggal dan waktu pendaftaran menjadi timestamp
$tanggal_waktu_pendaftaran = strtotime("$tgl_pendaftaran $jam_pendaftaran");

$cek = mysql_query("SELECT count(id_pendaftaran) as jumlah_daftar FROM pendaftaran WHERE tgl_pendaftaran = '$tgl_pendaftaran' AND jam_pendaftaran = '$jam_pendaftaran'");
$htg = mysql_fetch_array($cek);
$jumlahnya = $htg['jumlah_daftar'];

if($jumlahnya != 0){
    ?>
    <script language="JavaScript">
    alert('Maaf, Jam Yang Anda Inginkan Sudah Digunakan, Silahkan Pilih Jam Yang Lainnya');
    document.location='../pages/ambil_no_antrian.php'</script>
    <?php 
} else {
    if($next > '30'){
    ?>
    <script language="JavaScript">
    alert('Maaf, Antrian Hari Ini Sudah Penuh, Silahkan Daftar Kembali Di Hari Berikutnya');
    document.location='../index.php'</script>    
    <?php 
    } elseif ($next <= '30') {
        // Insert ke tabel customer
        $queryy = "INSERT INTO customer(id_customer, nama, no_hp, alamat) VALUES ('$id_customer','$nama', '$no_hp', '$alamat')" ;
        $hasill = mysql_query($queryy);

        // Insert ke tabel pendaftaran dengan tambahan id_layanan
        $query = "INSERT INTO pendaftaran(id_pendaftaran, no_antrian, id_customer, id_jenis_layanan, id_layanan, tgl_pendaftaran, jam_pendaftaran, status) 
                  VALUES (NULL, '$no_antrian', '$id_customer', '$id_jenis_layanan', '$id_layanan', '$tgl_pendaftaran', '$jam_pendaftaran', 'Pendaftaran')" ;
        $hasil = mysql_query($query);
    }

    if ($hasil) {
    ?>
    <script language="JavaScript">
    alert('Pendaftaran Anda Berhasil Dilakukan, Silahkan Datang Ke Puskesmas Lamongan dan Tunggu Nomor Dipanggil Oleh Petugas');
    document.location='../laporan/struk.php?id=<?php echo $no_antrian;?>'</script>
    <?php
    } else {
    ?>
    <script language="JavaScript">
    alert('Pendaftaran Gagal Dilakukan');
    document.location='../index.php'</script>
    <?php 
    }
}
?>
