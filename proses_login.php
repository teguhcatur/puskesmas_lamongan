<?php
error_reporting(0);
session_start();
require_once("config/koneksi.php");

$username = $_POST['username'];
$password = md5($_POST['password']);
$cekuser = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);  

if ($jumlah == 1) {
    if ($hasil['status'] == '1') {
        $_SESSION['id_user'] = $hasil['id_user'];
        $_SESSION['username'] = $username;
        ?>
        <script language="JavaScript">
        document.location='admin/index.php?p=home';
        </script>
        <?php
    } elseif ($hasil['status'] == '2') {
        $_SESSION['id_user'] = $hasil['id_user'];
        $_SESSION['username'] = $username;
        ?>
        <script language="JavaScript">
        document.location='pages/ambil_no_antrian.php';
        </script>
        <?php
    } else {
        ?>
        <script language="JavaScript">
        alert('Status pengguna tidak valid');
        document.location='login.php';
        </script>
        <?php
    }
} else {
    ?>
    <script language="JavaScript">
    alert('Username atau password Anda salah');
    document.location='login.php';
    </script>
    <?php
    echo mysql_error();
}
?>
