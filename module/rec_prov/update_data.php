<?php

$id = $_REQUEST['id'];
$kd_rec_prov = $_REQUEST['kd_rec_prov'];
$rec_prov = $_REQUEST['rec_prov'];

include '../../inc/koneksi.php';

$sql = "update rec_prov set rec_prov='".$rec_prov."'
        where kd_rec_prov='".$id."'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penyimpanan data gagal, Duplikat Key.'));
}
?>