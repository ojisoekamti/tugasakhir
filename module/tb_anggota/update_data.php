<?php

$id = $_REQUEST['id'];
$nama = $_REQUEST['nama'];
$tmp_lahir = $_REQUEST['tmp_lahir'];
$tgl_lahir = $_REQUEST['tgl_lahir'];
$jk = $_REQUEST['jk'];
$status = $_REQUEST['status'];
$agama = $_REQUEST['agama'];
$pekerjaan = $_REQUEST['pekerjaan'];
$pendidikan = $_REQUEST['pendidikan'];
$unit_tagana = $_REQUEST['kd_unit_tagana'];
$kampung = $_REQUEST['kampung'];
$desa = $_REQUEST['desa'];
$kecamatan = $_REQUEST['kecamatan'];
$kab_kota = $_REQUEST['kd_kab_kota'];
$kontak_person = $_REQUEST['kontak_person'];
$tahun_masuk = $_REQUEST['tahun_masuk'];
$rec_prov = $_REQUEST['kd_rec_prov'];
$rec_kab_kota = $_REQUEST['rec_kab_kota'];
include '../../inc/koneksi.php';

$sql = "UPDATE tb_anggota SET 
nama='".$nama."',
tmp_lahir='".$tmp_lahir."',
tgl_lahir='".$tgl_lahir."',
jk='".$jk."',
status='".$status."',
agama='".$agama."',
pendidikan='".$pendidikan."',
pekerjaan='".$pekerjaan."',
kd_unit_tagana='".$unit_tagana."',
kampung='".$kampung."',
desa='".$desa."',
kecamatan='".$kecamatan."',
kd_kab_kota='".$kab_kota."',
kontak_person='".$kontak_person."',
tahun_masuk='".$tahun_masuk."',
kd_rec_prov='".$rec_prov."',
rec_kab_kota='".$rec_kab_kota."' 
WHERE 
niat='".$id."'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penyimpanan data gagal'));
}
?>
