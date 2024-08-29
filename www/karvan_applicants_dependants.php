<?PHP
require_once("../library/db.php");

session_start();
include("check_login.php");
 login();
 $karvan=$_GET['karvanid'];
 $appid=$_GET['resid'];
 $mosquename=$_GET['mosque'];
 //$days=$_GET['validatedays'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php

$sql="select count(id) from karvan_applicants_getinfo where karvan_id='$karvan'";
$res=mysql_query($sql) or die(mysql_error());
$rw=mysql_fetch_array($res);
?>
<div align="left">
<table width="60%" dir='rtl' >
<?php
$sql="select name,father_name,passport_no from applicants where id='$appid'";
$rs=mysql_query($sql)or die(mysql_error());
$resname=mysql_fetch_array($rs);

$karvancode="select send_number from karvan where id='$karvan'";
$reskarvan=mysql_query($karvancode) or die (mysql_error());
$rowkarvan=mysql_fetch_array($reskarvan);
$karvanmemberamount=$rw['count(id)'];
echo "<tr><td><div id='wb_Table1' style='width:290px;height:100px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr>
			<td align='right' valign='top'  colspan='4' height='30'></br></br><b style='align:right;font-size:14'>کاروان ".$rw['count(id)']." نفره $mosquename </br></b></td>
			</tr>
			</table></div>
			</td>
			
			";
echo "<td>	<div id='wb_Table1' style='width:370px;height:110px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='2' cellspacing='0' id='Table1'>
			
			<tr>
			<td align='center'><img src='img/iranlogo.png'/></td>
			</tr>
			<tr>
			<td align='center' valign='top'  height='30'><b style='align:right;font-size:17'>روادید گروهی صادره از سرکنسولگری ج.ا.ایران - هرات</b></td>
			</tr>
			</table></div>
			</td>
			<td>
			<div id='wb_Table1' style='width:300px;height:120px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr>
			<td>
			<tr>
			<td align='right' valign='top' width='140px' colspan='3' height='25' style='font-size:14px;padding-right:8px'>سرپرست:
			</br><b>$resname[name] فرزند $resname[father_name] </b>
			</br>شماره گذرنامه:<b></br>$resname[passport_no]</b>
			</td>
			</td>
			<td align='right' valign='top' width='66' height='95'><img src='applicant_images/$appid.jpg' style='width:85px;height:100px'/></td>
			</tr>
			<tr><td>
			<td align='right' valign='top' height='25'  style='font-size:14px;padding-right:16px'></td>
			<td align='right' valign='top'    colspan='3' height='25' colspan='4' style='font-size:14px'></td>
			
			</td>
			</tr>
			</td>
			<td></td>
			</tr>
			</table></div>
			</td>
			</tr>
			";
			?>
</table>
<img src="img/line2.jpg" />
</br>
<div dir="rtl" >
<table width="50%">
<?php
$sql="select name,phone_num,applicant_type from applicants where id='$appid'";
$rs=mysql_query($sql)or die(mysql_error());
$resname=mysql_fetch_array($rs);
$sql="select mobile from applicant_foreign_address where applicant_id='$appid'";
$rs=mysql_query($sql) or die(mysql_error());
$resmobile=mysql_fetch_array($rs);
$sql="select applicant_id from karvan_applicants_getinfo where karvan_id='$karvan'";
$res=mysql_query($sql) or die(mysql_error());
$i=0;
$karvancode="select * from karvan where id='$karvan'";
$reskarvan=mysql_query($karvancode) or die (mysql_error());
$rowkarvan=mysql_fetch_array($reskarvan);
$counter="";
while($row=mysql_fetch_array($res)){
if($i==0){
$counter="سرپرست";
}else{
$counter=$i;
}
	$sq="select *from applicants where id='$row[applicant_id]' ";
	$rs=mysql_query($sq) or die(mysql_error());
	$rw=mysql_fetch_array($rs);
	$name=$rw['name'];
	$fathername=$rw['father_name'];
	$familyname=$rw['f_name'];
	$passisueplace=$rw['pass_issue_place'];
	$country="افغانستان";
	$birthdate=$rw['birth_date'];
	$birthplace=$rw['birth_place'];
	$passno=$rw['passport_no'];

	$issuedate=$rw['pass_issue_date'];
	$passvalidateion=$rw['pass_validation_date'];
	$id=$rw['id'];
	$code ="کد کاروان:".$rowkarvan['code'];
	if($id!=0 && $passisueplace!='همراه ' and ($issuedate!='0000-00-00' and $issuedate!="")){
	//Getting the address information in iran
	$sql="Select * from applicant_foreign_address where applicant_id='$id'";
	$rss=mysql_query($sql) or die (mysql_error());
	$rww=mysql_fetch_array($rss);
	//Counting dependants of the applicant
	$dependantsamount=0;
	$dependantscode="";
	$sqcount="select count(applicants.id) from applicants, karvan_applicants_getinfo where applicant_parent='$rw[id]' and karvan_applicants_getinfo.applicant_id=applicants.id  and karvan_applicants_getinfo.karvan_id='$karvan'";
	$rscount=mysql_query($sqcount) or die (mysql_error());
	$rwcount=mysql_fetch_array($rscount);
	$dependantsamount=$rwcount['count(applicants.id)'];
	switch($dependantsamount){
		case 0:
		$dependantscode="A";
		break;
		case 1:
		$dependantscode="B";
		break;
		case 2:
		$dependantscode="C";
		break;
		case 3:
		$dependantscode="D";
		break;
		case 4:
		$dependantscode="E";
		break;
		case 5:
		$dependantscode="F";
		break;
		case 6:
		$dependantscode="G";
		break;
		case 7:
		$dependantscode="H";
		break;
		default:
		$dependantscode="O";
		
	}
	
	
		echo "
		<tr><td align='left'>
			<div id='wb_Table1' style='width:980px;height:140px;font-family:B Titr; background-color:#E9E4E4;border:2'   >
			<table style='padding-top:4px;padding-right:0px' width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr border='0'>
			<td align='right' valign='top' width='18%'  height='25' style='font-size:13px;font-family:B Titr;padding-right:8px;padding-top:3px'>شماره: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $counter</b><div style='margin-top:1px;margin-bottom:1px;height:6px;font-size:22px'></div>

			نام: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $name</b><div style='margin-top:1px;margin-bottom:1px;height:6px;font-size:22px'></div>
			نام پدر: 
			&nbsp;&nbsp;&nbsp;
			&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $fathername </b><div style='margin-top:1px;margin-bottom:1px;height:6px;font-size:22px'></div>
			شماره گذرنامه: 
			<b style='font-family:B Titr; font-size:12px'>$passno</b>
			</td>
			<td width='9%'><img style='width:85px;height:100px' src='applicant_images/".$id.".jpg' /></td>
			<td rowspan='2' width='60%' style='background-color:#DBFEFE;font-size:14px' align='center' >
			<table width='40%'>
			<tr><th>تعداد همراهان</th><th>کد</th></tr>
			<tr align='center'><td>$dependantsamount</td><td>$dependantscode</td></tr>
			
			</table>
			</td>
			</tr></table>
			
			
			</div></td><td>

		</td>
		
		</tr>";
		
	}
	$i++;
	}


?>
<tr>
<td align="center" >
<?php
		echo "<h2 style='font-family:B Titr;color:blue'>روادید گروهی ";
		echo"<b style='align:right;font-size:14'>کاروان ".$karvanmemberamount." نفره $mosquename </b>";
		echo "<br/>صادره از سرکنسولگری ج.ا.ایران - هرات </h2>";
?>
</td>
</tr>
</table>
</div>
</html>