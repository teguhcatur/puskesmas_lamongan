<?php 
require "../config/koneksi.php"; 
  
$id_layanan=$_POST['id_layanan'];
$nama_layanan=$_POST['nama_layanan'];

$sql2 = "UPDATE nama_layanan SET nama_layanan = '$nama_layanan' WHERE id_layanan = '$id_layanan'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=nama_layanan'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_nama_layanan&id_layanan=<?= $id_layanan;?>'</script><?php }
?>