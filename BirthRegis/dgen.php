<?php
		include_once('conf.php');
        include ('fpdf.php');
		$mobileno=$_GET['mobilenoo'];
		$result = mysqli_query($con,"SELECT * FROM death_reg where Registerno='$mobileno'");
        $row = mysqli_fetch_array($result);
		$pdf = new FPDF();
        $pdf->AddPage();
		$pdf->Header();
		//$pdf->Line('12','25','195','25');
		//$pdf->SetLineWidth('0.5');
		//$pdf->Line('12','26','195','26');
		//$pdf->Line('12','27','195','27');
		$pdf->SetFont('Times', 'B', 20);
		$pdf->Ln();
		$pdf->Ln(10);
        $pdf->Write(25, '                         TAMIL NADU GOVERMENT', 1);
		$pdf->Ln();
		$pdf->SetFont('Times', '', 12);
        $pdf->Write(5, '                                              DEPARTMENT OF PUBLIC HEALTH', 1);
		$pdf->Ln();
		$pdf->SetFont('Times', '', 10);
		$pdf->Write(5, '                                                                              ( See Form No - 5 Rules )', 1);
		$pdf->Ln();
		$pdf->Write(5, '                                                                               ( See Rules No - 8 visit )', 1);
		$pdf->SetFont('Times', 'B', 10);
		//$pdf->Line();
       	$pdf->Ln();$pdf->Ln();
		$pdf->SetLineWidth('0');
		$pdf->Write(5, '                                                                        ', 1);
		$pdf->Cell(60 ,8, "           DEATH CERTIFICATE", 1,'','c');
		$pdf->Ln();
		$pdf->SetFont('Times', '', 10);
		$pdf->Write(5, '                              ( ISSUED UNDER SECTION 12/17 OF REGISTRATION OF BIRTH AND DEATH ACT 1969 )', 1);
		$pdf->Ln();
		$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'District :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['districit']);
		$pdf->Write(5,'                                                                              ');
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Place :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['zone']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Name :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['name']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Sex :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['sex']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Date of Birth :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['dod']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Place of Birth :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['pod']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Name of Father :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['father']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Name of Mother :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['mother']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Permenant Address :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['p_address']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Address of Parents at the time of
Birth of Child :- ');
$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['a_t_birth']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Remarks :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['remark']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Date of Register :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['dor']);
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('Times', 'B', 8);
		$pdf->Write(5,'Register NO :-   ');
		$pdf->SetFont('Times', '', 8);
		$pdf->Write(5,$row['Registerno']);
		$pdf->Ln();$pdf->Ln();
		
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Write(5,'                                                                                                                           Authorized Signature  ');
		$pdf->SetFont('Times', 'B', 10);
		
		$pdf->Ln();$pdf->Ln();
		
			
		$pdf->SetFont('Times', 'B', 12);
		//$pdf->LineWidth('10');
		$pdf->SetLineWidth('0.5');
		$pdf->Line('12','230','195','230');
		$pdf->SetFont('Times', '', 7);
		//$pdf->Write(25, '                              ( NO DISCLOSURE SHALL BE MADE OF PURTICULARS REGARDING THE CAUSE OF DEATH AS ENTERD IN THE REGISTER )', 1);
		$pdf->Write(10, 'Note : This certificate is computer generated and does not require any Seal/Signature in original.
The authenticity of this certificate can be verified at BIRTH and DEATH Registration of Office. ');
		//$pdf->Footer();
		$pdf->Output();
        exit;
		?>