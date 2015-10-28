<?php session_start();	
	include "../../inc/koneksi.php";
//	$koneksi=open_connection();
	//untuk core PDF
	require('lib/fpdf.php');
	
	class PDF extends FPDF
	{
		function Header()
		{
			//Select Arial bold 15
			$this->SetFont('Arial','B',12);
			$judul = 'Laporan Data Karyawans '.$_GET['id'];
			$this->Cell(200,5,$judul,0,1,'C');
			$judul2='PT. Apa Aja Deh';			
			$this->Cell(200,5,$judul2,0,0,'C');
			//Line break
			$this->Ln(10);
			
		}
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,$this->PageNo(),0,0,'C');
        }


		//Colored table
		function tabel_ri32_color()
		{
		$query ="SELECT * FROM karyawan WHERE niat = '".$_GET['id']."'ORDER BY niat";
		
			$db_query = mysql_query($query) or die("Query gagal");

			//Column titles
			$header=array('No','NIK','Nama');
			
			//Colors, line width and bold font
			//$this->SetFillColor(0,0,0);
			$this->SetFillColor(229,229,229);
			//$this->SetTextColor(255);
			//$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.1);
			$this->SetFont('','B');
			
			//Title table
			//$this->Cell(20,30,'Title',1,0,'C');
			
			//Header
			$w=array(10,20,40);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
			
			//Color and font restoration
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			
			//Data
			$fill=false;
			
			//$this->Cell(-10,-20,'Enjoy new fonts with FPDF!');
			$no=1;
			while($data=mysql_fetch_array($db_query))
			{
				$this->Cell($w[0],7,$no,'LR',0,'C',$fill);
				$this->Cell($w[1],7,$data['niat'],'LR',0,'C',$fill);
				$this->Cell($w[2],7,$data['nama'],'LR',0,'L',$fill);
				$this->Ln();
				$fill=!$fill;
				$no++;
			}
			
			$this->Cell(array_sum($w),10,'','T');
		}
	}
	
	$A4[0]=210;
	$A4[1]=297;
	$Q[0]=216;
	$Q[1]=279;
    $pdf=new PDF('P','mm',$A4);
	$title='Laporan';
	$pdf->SetTitle($title);
	$pdf->SetAuthor('Oji Soekamti');
	
	$pdf->SetFont('Arial','',7);
	$pdf->AddPage();
	//memanggil fungsi table
	$pdf->tabel_ri32_color();
	$pdf->Output();

?>
