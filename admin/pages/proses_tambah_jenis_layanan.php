<?php 
require "../config/koneksi.php"; 
  
$jenis_layanan=$_POST['jenis_layanan'];

 $sql = "INSERT INTO jenis_layanan  
           ( 
        id_jenis_layanan, 
			  jenis_layanan,
           ) 
 
           VALUES  
           (  
        NULL,
			  '$jenis_layanan', 
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Pembayaran Berhasil Ditambahkan');
document.location='index.php?p=jenis_layanan'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Pembayaran Gagal Ditambahkan');
document.location='index.php?p=tambah_jenis_layanan'</script><?php }
?>