<?php 
require "../config/koneksi.php"; 
  
$nama_layanan=$_POST['nama_layanan'];

 $sql = "INSERT INTO nama_layanan  
           ( 
           id_layanan, 
			  nama_layanan
           ) 
 
           VALUES  
           (  
        NULL,
			  '$nama_layanan'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Pembayaran Berhasil Ditambahkan');
document.location='index.php?p=nama_layanan'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Pembayaran Gagal Ditambahkan');
document.location='index.php?p=tambah_nama_layanan'</script><?php }
?>