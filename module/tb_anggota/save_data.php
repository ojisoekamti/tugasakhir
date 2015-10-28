<?php
include '../../inc/koneksi.php';
$niat = $_REQUEST['niat'];
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
    $nama_file = $_FILES['file_gambar']['tmp_name'];
	$folder = "img/";
	$file_upload = $_FILES['file_gambar']['name'];
	$spasi = explode(" ",$file_upload);
	$hspasi = implode("_",$spasi);
	$file_gambar = strtolower($hspasi);
	if(is_uploaded_file($nama_file))
	move_uploaded_file($nama_file,$folder.$file_gambar);
                    $sql = "INSERT INTO tb_anggota(niat,
                                                 nama, 
                                                 tmp_lahir, 
                                                 tgl_lahir, 
                                                 jk, 
                                                 status, 
                                                 agama,
                                                 pendidikan, 
                                                 pekerjaan,  
                                                 kd_unit_tagana, 
                                                 kampung,
                                                 desa,
                                                 kecamatan, 
                                                 kd_kab_kota, 
                                                 kontak_person, 
                                                 tahun_masuk, 
                                                 kd_rec_prov, 
                                                 rec_kab_kota 
                                                 ) 
                                                 VALUES (
                                                 '".$niat."',
                                                 '".$nama."',
                                                 '".$tmp_lahir."',
                                                 '".$tgl_lahir."',
                                                 '".$jk."',
                                                 '".$status."',
                                                 '".$agama."',
                                                 '".$pendidikan."',
                                                 '".$pekerjaan."',                                                                                                  
                                                 '".$unit_tagana."',
                                                 '".$kampung."',
                                                 '".$desa."',
                                                 '".$kecamatan."',
                                                 '".$kab_kota."',
                                                 '".$kontak_person."',
                                                 '".$tahun_masuk."',
                                                 '".$rec_prov."',
                                                 '".$rec_kab_kota."')
                                                 ";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Penyimpanan data gagal, Duplikat Key.'));
}
?>