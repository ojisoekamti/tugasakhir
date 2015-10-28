<?php

$kd_rec_prov = $_REQUEST['kd_rec_prov'];
$rec_prov = $_REQUEST['rec_prov'];

include '../../inc/koneksi.php';

$sql = "insert into rec_prov(kd_rec_prov,rec_prov)values('".$kd_rec_prov."','".$rec_prov."')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penympanan data gagal.'));
}
?>