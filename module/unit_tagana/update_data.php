<?php

$id = $_REQUEST['id'];
$kd_unit_tagana = $_REQUEST['kd_unit_tagana'];
$unit_tagana = $_REQUEST['unit_tagana'];

include '../../inc/koneksi.php';

$sql = "update unit_tagana set unit_tagana='".$unit_tagana."'
        where kd_unit_tagana='".$id."'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penyimpanan data gagal, Duplikat Key.'));
}
?>