<?php		
require_once("../library/db.php");
require_once '../library/excel_library/PHPExcel/IOFactory.php';
//require_once '../library/pdate.php';
?>
<?php	
	
$objReader = PHPExcel_IOFactory::createReader('Excel5');
	$objPHPExcel = $objReader->load("excel_templates/karvans.xls");

			
	$styleThinBlackBorderOutline = array(
	    'borders' => array(
		    'outline' => array(
			    'style' => PHPExcel_Style_Border::BORDER_THIN,
			        'color' => array('argb' => 'FF000000'),
		        ),
	        ),
        );
	
					//Here is for working
					$date1=$_GET['date_1'];
					$date2=$_GET['date_2'];
					$sql="select * from karvan where  recipe_date between '$date1' and '$date2' order by id asc";
					$res=mysql_query($sql) or die(mysql_error());
					$i=1;
					$j=6;
					while($row=mysql_fetch_array($res)){
						$sql="select name, rahgiri_code from mosques where id='$row[mosque_id]'";
						$res1=mysql_query($sql) or die(mysql_error());
						$row1=mysql_fetch_array($res1);
						$sql="select applicant_id,count(id) from  karvan_applicants_getinfo where karvan_id='$row[id]'";
						$res2=mysql_query($sql) or die(mysql_error());
						$row2=mysql_fetch_array($res2);
						$sql="select name from applicants where id='$row2[applicant_id]' and  applicant_type ='سرپرست'";
						$res3=mysql_query($sql) or die(mysql_error());
						$row3=mysql_fetch_array($res3);
						
						//Printing into excel file
						$objPHPExcel->getActiveSheet()->getStyle('A'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('B'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('C'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('D'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('E'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('F'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('G'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('H'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('I'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('J'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('K'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('L'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('M'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('N'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('O'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('P'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('Q'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('R'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('S'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('T'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('U'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('V'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('W'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('X'.$j)->applyFromArray($styleThinBlackBorderOutline);
						$objPHPExcel->getActiveSheet()->getStyle('Y'.$j)->applyFromArray($styleThinBlackBorderOutline);
						//Setting row height
						$objPHPExcel->getActiveSheet()->getRowDimension($j)->setRowHeight(80.25);
						/*
						$objPHPExcel->getActiveSheet()->getStyle('A'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('B'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('C'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
						$objPHPExcel->getActiveSheet()->getStyle('D'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('E'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('F'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('G'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('H'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('I'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('J'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('K'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('L'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('M'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('N'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('O'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('P'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('Q'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('R'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('S'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('T'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('U'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						*/
						$objPHPExcel->getActiveSheet()->getStyle('V'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('W'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('X'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$objPHPExcel->getActiveSheet()->getStyle('Y'.$j)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						
						//Checking dates in the database
						$resume=$row['resume'];
						$omana=$row['omana'];
						$monifest=$row['monifest'];
						$interview=$row['interview'];
						$warranty=$row['warranty'];
						$lab=$row['laboratory'];
						$visaform=$row['visa_price'];
						$consul=$row['consultency'];
						$carintro=$row['car'];
						$border=$row['border'];
						$najacode=$row['naja_code'];
						
						//New Fields
						$inplace=$row['enter_place'];
						$insurance=$row['insurance'];
						$insreport=$row['insurance_report'];
						$tour1=$row['tour1'];
						$tour2=$row['tour2'];
						$jong=$row['jong'];
						$outplace=$row['out_place'];
						$other=$row['other'];
						//
						$report=$row['report'];
						

						$objPHPExcel->getActiveSheet()->setCellValue('Y'.$j, $i);
						$objPHPExcel->getActiveSheet()->setCellValue('X'.$j, $row1['name']);
						$objPHPExcel->getActiveSheet()->setCellValue('W'.$j, $row3['name']);
						$objPHPExcel->getActiveSheet()->setCellValue('V'.$j, $row2['count(id)']);
						$objPHPExcel->getActiveSheet()->setCellValue('U'.$j, "(".$row1['rahgiri_code'].")");
						
							if(($border=="√") ){
								$objPHPExcel->getActiveSheet()->setCellValue('A'.$j, "اعزام شد");
							}else if($border!="√"){
								$objPHPExcel->getActiveSheet()->setCellValue('A'.$j, "در حال طی مراحل");
							}
						$objPHPExcel->getActiveSheet()->setCellValue('T'.$j, $row['send_number']);
						//Printing the information about different dates
						
						$objPHPExcel->getActiveSheet()->setCellValue('S'.$j, $resume);
						$objPHPExcel->getActiveSheet()->setCellValue('R'.$j, $omana);
						$objPHPExcel->getActiveSheet()->setCellValue('Q'.$j, $monifest);
						$objPHPExcel->getActiveSheet()->setCellValue('P'.$j, $interview);
						$objPHPExcel->getActiveSheet()->setCellValue('O'.$j, $warranty);
						$objPHPExcel->getActiveSheet()->setCellValue('N'.$j, $lab);
						$objPHPExcel->getActiveSheet()->setCellValue('M'.$j, $visaform);
						$objPHPExcel->getActiveSheet()->setCellValue('L'.$j, $consul);
						$objPHPExcel->getActiveSheet()->setCellValue('K'.$j, $carintro);
						$objPHPExcel->getActiveSheet()->setCellValue('J'.$j, $border);
						$objPHPExcel->getActiveSheet()->setCellValue('I'.$j, $najacode);
						$objPHPExcel->getActiveSheet()->setCellValue('H'.$j, $inplace);
						$objPHPExcel->getActiveSheet()->setCellValue('G'.$j, $insurance);
						$objPHPExcel->getActiveSheet()->setCellValue('F'.$j, $tour1);
						$objPHPExcel->getActiveSheet()->setCellValue('E'.$j, $tour2);
						$objPHPExcel->getActiveSheet()->setCellValue('D'.$j, $jong);
						$objPHPExcel->getActiveSheet()->setCellValue('C'.$j, $outplace);
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$j, $report);

					$i++;
					$j++;
					}
					
						
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			
			ob_end_clean(); // Added by me
			ob_start(); // Added by me
			
			// Sending headers to force the user to download the file
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="karvanlist.xls"');
			header('Cache-Control: max-age=0');
			$objWriter->save('php://output');
?>