<?php
$server = "localhost";
$username = "pskg2823_sub";
$password = "123sub123";
$database = "pskg2823_sub";
$konek = mysql_connect($server, $username, $password) or die ("Gagal konek ke server MySQL" .mysql_error());
$bukadb = mysql_select_db($database) or die ("Gagal membuka database $database" .mysql_error());
?>