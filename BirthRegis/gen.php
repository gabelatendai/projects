<?php
		include_once('rb.php');
//        include ('fpdf.php');
//		$mobileno=$_GET['mobilenoo'];
		$id=$_GET['id'];
$db=R::setup('mysql:host=localhost;dbname=portal', 'root', '');

@$row = R::findOne('birthreg','id=?',[$id]);

ob_start();
require('fpdf.php');
//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Hello World!',1,0);
//$pdf->Output();
//ob_end_flush();
		$pdf = new FPDF();
        $pdf->AddPage();
		$pdf->Header();
		$pdf->Cell('130','3','','0','1');
		$pdf->Cell('130','25','','0','1');
		$pdf->Cell('90','5','','0');
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell('75','5','Zimbabwe','0','1');
		$pdf->Ln();$pdf->Ln();
		$pdf->Cell('20','10','','0');
		$pdf->SetFont('Arial','i',12);
		$pdf->Cell('5','10','BIRTHS AND DEATHS REGISTRATION ACT','0','1');
		$pdf->Cell('20','10','','0');
		$pdf->Cell('5','10','Certified Copy of an Entry of Birth Registered in the District of','0','1');
		$pdf->SetFont('Arial','i',11);
		$pdf->Cell('80','10',"",'0');
		$pdf->Cell('40','2',$row['zone'],'0','1');
		$pdf->Cell('40','2','','0');
		$pdf->Cell('130','10','................................................ In Zimbabwe','0','1');
		$pdf->Cell('130','3','','0','1','LR');
		//child
		$pdf->Cell('40','30','Child','1','0');
		$pdf->MultiCell('139','6','
		1.First Names: '.$row['name'].'
		2. Birth Place: '.$row['pob'].'              
		3.Date Of Birth: '.$row['dob'].'
		4.Sex: '.$row['sex'],'1','1');
		//father
		$pdf->Cell('40','16','Father Of Child','1','0');
		$pdf->MultiCell('139','4','
		1.First Names: '.$row['father'].'
		2. Birth Place: '.$row['pob'].'              
		3.National Identity Card Number: '.$row['fid'],'1','1');
		//mother
		$pdf->Cell('40','16','Mother of Child','1','0');
		$pdf->MultiCell('139','4','
		1.First Names: '.$row['mother'].'
		2. Birth Place: '.$row['pob'].'              
		3.National Identity Card Number: '.$row['mid'],'1','1');
		//mother
		$pdf->Cell('40','12','Informant','1','0');
		$pdf->MultiCell('139','4','
		1.Signature or mark: '.$row['mother'].'           
		3.Address: '.$row['p_address'],'1','1');
		//mother
		$pdf->Cell('40','12','','1','0');
		$pdf->MultiCell('139','4','
		1.Date of registration: '.$row['dor'].'
		2. Entry number: '.$row['Registerno'],'1','1');
$pdf->Cell('20','10','','0');
//$pdf->SetFont('Arial',13);
$pdf->Cell('5','10','I certify the above is a true copy','0','1','C');
$pdf->Cell('140','10','Note: This is not a birth Certificate','0','1','C');

		//$pdf->Write(25, '                              ( NO DISCLOSURE SHALL BE MADE OF PURTICULARS REGARDING THE CAUSE OF DEATH AS ENTERD IN THE REGISTER )', 1);
		$pdf->Write(10, 'Note : This certificate is computer generated and does not require any Seal/Signature in original.
The authenticity of this certificate can be verified at BIRTH and DEATH Registration of Office. ');
		//$pdf->Footer();
		$pdf->Output();
        exit;
		?>