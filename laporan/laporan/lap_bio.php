

<?php
error_reporting(0);
$niat = $_GET['niat'];
// Create connection
include"../../inc/koneksi.php";
// Check connection
$query = ("select * from trelawan where niat='$niat'");

$result = mysql_query($query, $konek);

$buff = mysql_fetch_array($result);
$pecah_tgl = explode("-",$buff['tgl_lahir']);
$re=$pecah_tgl[2]."-".$pecah_tgl[1]."-".$pecah_tgl[0];
$usia=date("Y")-$pecah_tgl[0];


$html.=  "
<head>
<meta http-equiv=Content-Type content=text/html; charset=utf-8 />
<title>Recomendasi Relawan Taruna Siaga Bencana</title>
</head>
<body bgcolor=#fff>
<div><h2 align=center>Taruna Siaga Bencana </h2></div>
<table widht=21cm  border=1 align=center cellpadding=0 cellspacing=0>
  <tr align=center>";?>
  <a href="save.php?niat=<?php echo $buff['niat']; ?>"><input type="button" onclick="link()" value="Print" /></a>
  <?php

$html.=  "
    <td colspan=3 rowspan=2><p><img src=".'../../img/tagana.png'." width=70 height=80 />
	<img src=".'../../img/banten.png'." width=80 height=80 />
    <strong style=font-size:24px;><br />
      REKOMENDASI</strong></p>
    <p><strong>PENGAMBILAN INSENTIF<br />
      TARUNA SIAGA BENCANA (TAGANA)<br />
      SE PROVINSI BANTEN
    </strong>    </p>
    ".date('l').", ".date('d-m-Y')."
    <td width=17% height=20>No. Urut</td>
    <td width=9%>&nbsp;</td>
    <td width=26%>Foto Copy KTP / SIM</td>
  </tr>
  <tr>
    <td height=150 colspan=3>&nbsp;</td>
  </tr>
  <tr align=center>
    <td width=4% height=20>1</td>
    <td align=left>NAMA</td>
    <td colspan=4 align=left>&nbsp;".$buff['nama']."</td>
  </tr>
  <tr align=center>
    <td height=15 >2</td>
    <td width=27% align=left>NIAT</td>
    <td colspan=4 align=left>&nbsp;".$buff['niat']."</td>
  </tr>
  <tr align=center>
    <td height=15>3</td>
    <td align=left>TEMPAT / TGL. LAHIR</td>
    <td colspan=3 align=left>&nbsp;".$buff['tmp_lahir'].",".$re."</td>
    <td align=left> Usia :&nbsp; ".$usia." Thn</td>
  </tr>
  <tr align=center>
    <td height=15>4</td>
    <td align=left>JENIS KELAMIN</td>
    <td colspan=4 align=left>&nbsp;".$buff['jk']."</td>
  </tr>
  <tr align=center>
    <td height=15>5</td>
    <td align=left>AGAMA</td>
    <td colspan=4 align=left>&nbsp;".$buff['agama']."</td>
  </tr>
  <tr align=center>
    <td height=15>6</td>
    <td align=left>PENDIDIKAN TERAKHIR</td>
    <td colspan=4 align=left>&nbsp;".$buff['pendidikan']."</td>
  </tr>
  <tr align=center>
    <td height=15>7</td>
    <td align=left>STATUS PERKAWINAN</td>
    <td colspan=4 align=left>&nbsp;".$buff['status']."</td>
  </tr>
  <tr align=center>
    <td height=15>8</td>
    <td align=left>PEKERJAAN</td>
    <td colspan=4 align=left>&nbsp;".$buff['pekerjaan']."</td>
  </tr>
  <tr align=center>
    <td height=15>9</td>
    <td align=left>UNIT TAGANA</td>
    <td colspan=4 align=left>&nbsp;".$buff['unit_tagana']."</td>
  </tr>
  <tr align=center>
    <td height=15>10</td>
    <td align=left>ALAMAT</td>
    <td colspan=4 align=left>&nbsp;</td>
  </tr>
  <tr 	align=center>
    <td rowspan=6 height=15>&nbsp;</td>
    <td align=left><em>- Kampung / Rt. Rw</em></td>
    <td colspan=4 align=left>&nbsp;".$buff['kampung']."</td>
  </tr>
  <tr align=center>
    <td align=left height=15><em>- Desa / Kelurahan</em></td>
    <td colspan=4 align=left>&nbsp;".$buff['desa']."</td>
  </tr>
  <tr align=center >
    <td align=left height=15><em>- Kecamatan</em></td>
    <td colspan=4 align=left>&nbsp;".$buff['kecamatan']."</td>
  </tr>
  <tr align=center>
    <td align=left height=15><em>- Kabupaten / Kota</em></td>
    <td colspan=4 align=left>&nbsp;".$buff['kab_kota']."</td>
  </tr>
  <tr align=center>
    <td rowspan=2 align=left height=15>&nbsp;</td>
    <td align=left>No. Tlp</td>
    <td colspan=3 align=left>&nbsp;".$buff['kontak_person']."</td>
  </tr>
  <tr align=center>
    <td align=left height=15>No. Hp</td>
    <td colspan=3 align=left>&nbsp;</td>
  </tr>
  <tr align=center>
    <td>11</td>
    <td rowspan=4 height=15 align=left valign=top><p>TAHUN &amp; TEMPAT DIKLAT</p></td>
    <td colspan=4 align=left>1. Rekruitment Dinas Sosial Prov. Banten</td>
  </tr>
  <tr align=center>
    <td rowspan=3 height=15>&nbsp;</td>
    <td align=left>Tahun :&nbsp;".$buff['tahun_masuk']."</td>
    <td colspan=3 align=left>&nbsp;".$buff['rec_prov']."</td>
  </tr>
  <tr align=center>
    <td colspan=4 align=left height=15>2. Rekruitment Dinas Sosial Kab. / Kota</td>
  </tr>
  <tr align=center>
  <td align=left height=15>Tahun :&nbsp;".$buff['tahun_masuk']."</td>
    <td colspan=3 align=left>&nbsp;".$buff['rec_kab_kota']."</td>
  </tr>
  <tr align=center>
    <td colspan=3 rowspan=4  align=left valign=top><p>&nbsp;</p>
    <p> Catatan :</p>
    <p>1. Rekomendasi ini sebagai syarat pengambila insentif TAGANA</p>
    <p>2. Insentif tidak dapat di berikan apabila tidak membuktikan rekomendasi yang di tandatangani dan dibubuhi stempel bash.</p>
    <p align=center>Yang Bersangkutan</p>
    <p align=center>&nbsp;</p>
    <p align=center>&nbsp;</p>
    <p align=center>........................................<br />
    </p></td>
    <td colspan=3><strong>TANDA TANGAN YANG MENGESANKAN</strong></td>
  </tr>
  <tr 	align=center>
    <td height=90 colspan=2 align=left valign=middle>Koordinator TAGANA<br />
    Kab / Kota </td>
    <td>.........................</td>
  </tr>
  <tr align=center>
    <td height=90 colspan=2 align=left valign=middle>A.n. Koordinator TAGANA<br />
    Prov. Banten</td>
    <td>.........................</td>
  </tr>
  <tr 	align=center>
    <td height=90 colspan=2 align=left valign=middle>Kabid Perlindungan dan Jaminan <br />
      Sosial dan atau/ Kasi Bantuan<br />
      Sosial Korban Bencana Dinas<br />
      Sosial Provinsi Banten</td>
    <td>.........................</td>
  </tr>
</table>
</body>
</html>" ;

echo $html;
?>

