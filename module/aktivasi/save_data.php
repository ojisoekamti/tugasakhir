
<?php

$print = $_REQUEST['print'];
include '../../inc/koneksi.php';
echo "<script>alert('$print');</script>";
$sql = "insert into kab_kota(kd_kab_kota,kab_kota,keterangan)values('".$kode_kab_kota."','".$kab_kota."','".$keterangan."')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penympanan data gagal.'));
}
?>