<?php 
require "../config/koneksi.php"; 
  
$id_jenis_layanan=$_POST['id_jenis_layanan'];
$jenis_layanan=$_POST['jenis_layanan'];

$sql2 = "UPDATE jenis_layanan SET jenis_layanan = '$jenis_layanan'=  WHERE id_jenis_layanan = '$id_jenis_layanan'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=jenis_layanan'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_jenis_layanan&id_jenis_layanan=<?= $id_jenis_layanan;?>'</script><?php }
?>