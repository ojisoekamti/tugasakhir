<?php

$id = $_REQUEST['id'];

include '../../inc/koneksi.php';

$sql = "delete from kab_kota where kd_kab_kota='".$id."'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Data Gagal dihapus.'));
}
?>