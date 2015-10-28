<?php

$niat=$_GET['niat'];
include '../../inc/koneksi.php';

$sql = "UPDATE tb_anggota SET print='y' WHERE niat='$niat'";
$result = mysql_query($sql);
if ($result){
    	echo '<script>alert("sukses");</script>';
	echo "<script>window.location.assign('preview.php?niat=$niat')</script>";

} else {
	echo '<script>alert("data tidak ada");</script>';

}
?>
