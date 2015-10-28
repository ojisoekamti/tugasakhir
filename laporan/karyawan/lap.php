<?php session_start();	
	include "../../inc/koneksi.php";
	include "../../inc/tanggalindo.php";
?>
<style type="text/css">
<!--
.style3 {color: #FFFFFF; font-weight: bold; }
.style8 {font-size: 12px; color: #000000; }
.style9 {font-weight: bold; font-size: 12px; color: #000000; }
.style11 {font-size: 11px; }
-->
</style>

<div>Data Saat Ini Adalah 
<?php
$kd_kab_kota=$_GET['kd_kab_kota'];
$query = "SELECT COUNT(*) AS jumData FROM tb_anggota where kd_kab_kota ='%$kd_kab_kota%'";
    $hasil = mysql_query($query);
    $data = mysql_fetch_array($hasil);
    echo $data['jumData']; 
?> </br>
 
</div>
<div align="center"><h1>TARUNA SIAGA BENCANA</h1></div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#00000">
    <tr>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">No</span></div></td>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">NIAT</span></div></td>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">Nama</span></div></td>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">TEMPAT LAHIR</span></div></td>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">TANGGAL LAHIR</span></div></td>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">L/P</span></div></td>
      <td bgcolor="#000000"><div align="center" class="style11"><span class="style3">STATUS</span></div></td>
      <td bordercolor="#ECE9D8" bgcolor="#000000" ><div align="center" class="style11"><span class="style3">AGAMA</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">UNIT TAGANA</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">KAMPUNG & RT/RW</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">DESA</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">KECAMATAN</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">KAB/KOTA</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">NO TLPN</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">TAHUN MASUK</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">RECRUITMENT PROVINSI</span></div></td>
      <td bgcolor="#000000" ><div align="center" class="style11"><span class="style3">RECRUITMENT KAB/KOTA</span></div></td>
    </tr>
<?php
$kd_kab_kota=$_GET['kd_kab_kota'];
$query = ("
SELECT
  tb_anggota.niat,
  tb_anggota.nama,
  tb_anggota.tmp_lahir,
  tb_anggota.tgl_lahir,
  tb_anggota.jk,
  tb_anggota.status,
  tb_anggota.agama,
  tb_anggota.pendidikan,
  tb_anggota.pekerjaan,
  unit_tagana.unit_tagana,
  tb_anggota.kampung,
  tb_anggota.desa,
  tb_anggota.kecamatan,
  kab_kota.kab_kota,
  tb_anggota.kd_kab_kota,
  tb_anggota.kontak_person,
  tb_anggota.tahun_masuk,
  rec_prov.rec_prov,
  tb_anggota.rec_kab_kota
FROM
  tb_anggota
  INNER JOIN unit_tagana ON tb_anggota.kd_unit_tagana =
    unit_tagana.kd_unit_tagana
  INNER JOIN kab_kota ON tb_anggota.kd_kab_kota = kab_kota.kd_kab_kota
  INNER JOIN rec_prov ON tb_anggota.kd_rec_prov = rec_prov.kd_rec_prov
WHERE
  tb_anggota.kd_kab_kota = '$kd_kab_kota';

");
$result = mysql_query($query, $konek);
$no = 0;
while ($buff = mysql_fetch_array($result)){
$no++;
if($no%2==0){
$w="#FFFFFF";
}else{
$w="#CCCCCC";}
?>
<?php 
$pecah_tgl = explode("-",$buff['tgl_lahir']);
$re=$pecah_tgl[2]."-".$pecah_tgl[1]."-".$pecah_tgl[0];
?>
    <tr border="#fff">
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $no; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['niat']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['nama']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['tmp_lahir']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $re; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="center"><span class="style8"><?php echo $buff['jk']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['status']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['agama']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['unit_tagana']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['kampung']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['desa']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['kecamatan']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['kab_kota']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['kontak_person']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['tahun_masuk']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['rec_prov']; ?></span></div></td>
      <td bgcolor="<?php echo $w; ?>" ><div align="left"><span class="style8"><?php echo $buff['rec_kab_kota']; ?></span></div></td>
    </tr>
    <?php
    }
	?>
</table>
<?
////	$koneksi=open_connection();
//	//untuk core PDF
//	require('../lib/fpdf.php');
//	
//	class PDF extends FPDF
//	{
//		function Header()
//		{
//			//Select Arial bold 15
//			$this->SetFont('Arial','B',12);            
//            $this->SetFillColor(200,220,255);
//			$judul = 'Laporan Data Karyawan ';
//			 $this->Cell(0,6,$judul,0,1,'C',true);
//			$judul2='PT. Apa Aja Deh';			
//			 $this->Cell(0,6,$judul2,0,1,'C',true);
//			//Line break
//			$this->Ln(10);
//            
//                    $niat = isset($_REQUEST['niat'])? $_REQUEST['niat']:'';
//                    $query ="SELECT * FROM tb_anggota WHERE niat = '".$niat."' ORDER BY niat";		
//			        $db_query = mysql_query($query) or die("Query gagal");
//                    $row = mysql_fetch_array($db_query);
//                    
//                    $poto = !empty($row['file_gambar'])? $row['file_gambar']:'default.jpg';
//                    $this->Image('../../module/karyawan/img/'.$poto,150,30,30);
//                    
//                    $this->Cell(40,6,'NIAT',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['niat'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Nama',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['nama'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Tempat Lahir',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['tmp_lahir'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Tanggal Lahir',0,'L',false);                  
//                    $this->Cell(40,6,': '.tgl_indo($row['tgl_lahir']),0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Jenis Kelamin',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['jk'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Status',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['status'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Agama',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['agama'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Unit Tagana',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['unit_tagana'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Alamat',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['alamat'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Kab. Kota',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['kab_kota'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Kontak Person',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['kontak_person'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Tahun Masuk',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['tahun_masuk'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Rek. Prov',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['rec_prov'],0,'L',false);
//                    $this->Ln(8);
//                    $this->Cell(40,6,'Rek. Kab Kota',0,'L',false);                  
//                    $this->Cell(40,6,': '.$row['rec_kab_kota'],0,'L',false);
//                    $this->Ln(8);
//			
//		}
//        
//        function Footer()
//            {
//                $this->SetY(-15);
//                $this->SetFont('Arial','I',8);
//                $this->Cell(0,10,'Di Print Oleh '.$_SESSION['nama'],0,0,'R');
//            }
//
//
//	}
//	
//	$A4[0]=210;
//	$A4[1]=297;
//	$Q[0]=216;
//	$Q[1]=279;
//    $pdf=new PDF('P','mm',$A4);
//	$title='Laporan';
//	$pdf->SetTitle($title);
//	$pdf->SetAuthor('Oji Soekamti');
//	$pdf->SetFont('Arial','',7);
//	$pdf->AddPage();
//	//memanggil fungsi table
//	$pdf->Output();
//

?>