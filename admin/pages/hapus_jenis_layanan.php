<?php
include "../config/koneksi.php";
$id_jenis_layanan = $_GET['id_jenis_layanan'];
$hasil=mysql_query("delete from jenis_layanan where id_jenis_layanan='$id_jenis_layanan'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=jenis_layanan'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=jenis_layanan'</script><?php }
?>