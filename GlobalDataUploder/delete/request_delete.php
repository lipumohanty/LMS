<?php
$tblname = $_GET["tblname"];
$pkvalue = $_GET["pkvalue"];
$headerlocation = $_GET["location"];
MysqlConnection::delete($tblname, $pkvalue);
header("location:".$headerlocation);
?>

