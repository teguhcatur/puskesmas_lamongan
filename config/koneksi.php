<?php
include "mysql_mysqli.inc.php";
?>
<?php
$host="localhost";
$user="root";
$pass="";
$database="puskesmas";

$conn =mysql_connect($host, $user, $pass, $database);
mysql_select_db($database,$conn);
?>