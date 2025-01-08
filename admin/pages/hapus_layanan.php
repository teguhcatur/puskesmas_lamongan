<?php
include "../config/koneksi.php";
$id_layanan = $_GET['id_layanan'];
$hasil=mysql_query("delete from nama_layanan where id_layanan='$id_layanan'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=nama_layanan'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=nama_layanan'</script><?php }
?>