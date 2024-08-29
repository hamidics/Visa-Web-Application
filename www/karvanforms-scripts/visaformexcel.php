<?php		
require_once("../../library/db.php");
require_once '../../library/excel_library/PHPExcel/IOFactory.php';
require_once '../../library/pdate.php';
			


			
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load("../excel_templates/visa_form narrow.xls");
			
	$viewid=$_GET['karvanid'];
	$today=pdate("Y-m-d");
	$sql="select code,mosque_id, visa_price from karvan where id='$viewid'";
	$res=mysql_query($sql) or die(mysql_error());
	$ro=mysql_fetch_array($res);
	
	$sql="select id,name from mosques where id='$ro[mosque_id]'";
	$res=mysql_query($sql) or die(mysql_error());
	$roo=mysql_fetch_array($res);
	$sql="select * from applicants, karvan_applicants_getinfo  where  karvan_applicants_getinfo.karvan_id='$viewid' and karvan_applicants_getinfo.applicant_id=applicants.id and applicants.applicant_type='سرپرست' ";
	$res=mysql_query($sql) or die (mysql_error());
	$row=mysql_fetch_array($res);
	//echo  $row['id'];

	$responsibleid=$row['id'];
	
	//$responsiblename=$row['name'];
	//$responsiblephone=$row['phone_num'];
						// Add a visa form image to the worksheet
						$photo=$responsibleid.".jpg";
						$objDrawing = new PHPExcel_Worksheet_Drawing();
						
						$objDrawing->setName('photo');
						$objDrawing->setDescription('PHOTo');
						$objDrawing->setPath('../applicant_images/'.$photo);
						$objDrawing->setCoordinates('H6');
						$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
						
						//Getting applicants dependants Amount
			            $sql3="Select count(id) from karvan_applicants_getinfo where karvan_id='$viewid'";
				        $res3=mysql_query($sql3) or die(mysql_error());
						$row3=mysql_fetch_array($res3);
						
						$objPHPExcel->getActiveSheet()->setCellValue('G19', $row3['count(id)']."نفر");

						$objPHPExcel->getActiveSheet()->setCellValue('A5', $today);
						
						//$objPHPExcel->getActiveSheet()->setCellValue('E7', $row2['command']);
						//$objPHPExcel->getActiveSheet()->setCellValue('E8', $row2['specialist']);
						//$objPHPExcel->getActiveSheet()->setCellValue('E9', $row2['num_center_mojavez']);
						//$objPHPExcel->getActiveSheet()->setCellValue('E10', $row2['date_center_mojavez']);
						//$objPHPExcel->getActiveSheet()->setCellValue('A6', $row2['visa_type']);
						//Should be taken from the karvan
						$objPHPExcel->getActiveSheet()->setCellValue('A7', $ro['visa_price']);
						//$objPHPExcel->getActiveSheet()->setCellValue('A8', "30 رو");
						//$objPHPExcel->getActiveSheet()->setCellValue('A9', $row2['arjaeat']);
						//$objPHPExcel->getActiveSheet()->setCellValue('G35', $row2['issue_date']);
						//$objPHPExcel->getActiveSheet()->setCellValue('A4', $row2['visa_num']);
						$objPHPExcel->getActiveSheet()->setCellValue('E13', $row['name']." ".$row['f_name']);
						$objPHPExcel->getActiveSheet()->setCellValue('E14', $row['birth_date']." ".$row['birth_place']);
						$objPHPExcel->getActiveSheet()->setCellValue('E15', $row['passport_no']);
						//$objPHPExcel->getActiveSheet()->setCellValue('E16', $row1['education']);
						$objPHPExcel->getActiveSheet()->setCellValue('A13', $row['father_name']);
						//$objPHPExcel->getActiveSheet()->setCellValue('A14', $row1['marital_status']);
						$objPHPExcel->getActiveSheet()->setCellValue('A15', $row['pass_issue_date']." ".$row['pass_issue_place']);
						$objPHPExcel->getActiveSheet()->setCellValue('A16', $row['job']);
						
						//$objPHPExcel->getActiveSheet()->setCellValue('A28', $row1['add_in_iran']." ".$row1['phone_in_iran']);
						$objPHPExcel->getActiveSheet()->setCellValue('A30', $row['phone_num']);
						//$objPHPExcel->getActiveSheet()->setCellValue('A29', $row1['job_add_in_afghanistan']." ".$row1['job_phone_in_afghanistan']);
						
						$centerinfo=$roo['name'];
						
						$objPHPExcel->getActiveSheet()->setCellValue('A10', $centerinfo);
						
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			
			ob_end_clean(); // Added by me
			ob_start(); // Added by me
			
			// Sending headers to force the user to download the file
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="visa_form-'.$today.'.xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter->save('php://output');
?>