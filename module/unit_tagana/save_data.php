<?php

$kd_unit_tagana = $_REQUEST['kd_unit_tagana'];
$unit_tagana = $_REQUEST['unit_tagana'];
$keterangan = $_REQUEST['keterangan'];

include '../../inc/koneksi.php';

$sql = "insert into unit_tagana(kd_unit_tagana,unit_tagana,keterangan)values('".$kd_unit_tagana."','".$unit_tagana."','".$unit_tagana."')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penympanan data gagal.'));
}
?>