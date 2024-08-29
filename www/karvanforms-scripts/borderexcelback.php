<?php		
require_once("../../library/db.php");
require_once '../../library/excel_library/PHPExcel/IOFactory.php';
require_once '../../library/pdate.php';
			
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load("../excel_templates/borderback.xls");
			
	$viewid=$_GET['karvanid'];
	$today=pdate("Y-m-d");
	$sql="select code,mosque_id, visa_price, recipe_date, back, backbordertime from karvan where id='$viewid'";
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
	//echo $responsibleid;
							//Getting applicants dependants Amount
			            $sql3="Select count(id) from karvan_applicants_getinfo where karvan_id='$viewid'";
				        $res3=mysql_query($sql3) or die(mysql_error());
						$row3=mysql_fetch_array($res3);
						
						//Printing information into Excel File
						$objPHPExcel->getActiveSheet()->setCellValue('B3', $today);
						
						$objPHPExcel->getActiveSheet()->setCellValue('B16', $roo['name']);
						$objPHPExcel->getActiveSheet()->setCellValue('B17', $row['name']." ".$row['f_name']);
						$objPHPExcel->getActiveSheet()->setCellValue('B18', $row3['count(id)']);
						$objPHPExcel->getActiveSheet()->setCellValue('B19', $ro['back']);
						$objPHPExcel->getActiveSheet()->setCellValue('B20', $row['phone_num']);
						
						$objPHPExcel->getActiveSheet()->setCellValue('B21', $ro['backbordertime']);
						//$objPHPExcel->getActiveSheet()->setCellValue('G35', $row2['issue_date']);
						//$objPHPExcel->getActiveSheet()->setCellValue('A4', $row['name']." ".$row['f_name']);
						//$objPHPExcel->getActiveSheet()->setCellValue('E15', $row1['passport_kind']." ".$row1['passport_num']);

						
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			
			ob_end_clean(); // Added by me
			ob_start(); // Added by me
			
			// Sending headers to force the user to download the file
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="border.xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter->save('php://output');
?>