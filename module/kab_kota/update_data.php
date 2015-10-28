<?php

$id = $_REQUEST['id'];
$kode_kab_kota = $_REQUEST['kd_kab_kota'];
$kab_kota = $_REQUEST['kab_kota'];
$keterangan = $_REQUEST['keterangan'];

include '../../inc/koneksi.php';

$sql = "update kab_kota set kab_kota='".$kab_kota."',
        keterangan='".$keterangan."'
        where kd_kab_kota='".$id."'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penyimpanan data gagal, Duplikat Key.'));
}
?>