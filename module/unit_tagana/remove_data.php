<?php

$id = $_REQUEST['id'];

include '../../inc/koneksi.php';

$sql = "delete from unit_tagana where kd_unit_tagana='".$id."'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Data Gagal dihapus.'));
}
?>