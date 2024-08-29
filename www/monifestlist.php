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
<table width="50%" dir='rtl'>
<?php
$sql="select name,father_name,passport_no, pass_issue_date, pass_validation_date from applicants where id='$appid'";
$rs=mysql_query($sql)or die(mysql_error());
$resname=mysql_fetch_array($rs);
//Checking if the person is in the black list or not
$blackliststate="";
$sqlch="select count(id) from blacklist where passport_no='$resname[passport_no]'";
$resch=mysql_query($sqlch) or die(mysql_error());
$rowch=mysql_fetch_array($resch);
if($rowch['count(id)']>0){
$blackliststate="<b style='color:red'>*</b>";
}
//Finished Checking
$karvancode="select send_number, mosque_id from karvan where id='$karvan'";
$reskarvan=mysql_query($karvancode) or die (mysql_error());
$rowkarvan=mysql_fetch_array($reskarvan);
//Getting send senter and rahgiri code
$karvancode="select rahgiri_code, send_center from mosques where id='$_GET[mosque]'";
$resmosque=mysql_query($karvancode) or die (mysql_error());
$rowmosque=mysql_fetch_array($resmosque);
$kcenter=$rowmosque['send_center'];
$ksecretcode=$rowmosque['rahgiri_code'];
$karvanmemberamount=$rw['count(id)'];
echo "<tr><td><div id='wb_Table1' style='width:197px;height:140px;margin-top:-20px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr>
			<td align='right' valign='top'  colspan='4' height='30'></br></br><b style='align:right;font-size:16px'>کاروان ".$rw['count(id)']." نفره  <br/>
			<b style='font-size:13px'> سرپرست:
			$resname[name]  </b><br/><b>کد: $ksecretcode </br></b></td>
			</tr>
			</table></div>
			</td>
			
			";
echo "<td>	<div id='wb_Table1' style='width:250px;height:160px;font-family:B Titr'  border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='2' cellspacing='0' id='Table1'>
			
			<tr>
			<td align='center'><img src='img/iranlogo.png'/></td>
			</tr>
			<tr>
			<td align='center' valign='top'  height='30'><b style='align:right;font-size:15px'>جمهوری اسلامی ایران</b><div style='margin-top:-3px'></div><b style='align:right;font-size:15px'>وزارت خارجه<div style='margin-top:-3px'></div>$kcenter <br/></b>
			<div style='margin-top:0px'></div><span style='font-size:15px; font-family:Traffic'>شماره روادید............. تاریخ روادید ..............</span></td>
			</tr>
			</table></div>
			</td>
			<td>
			<div id='wb_Table1' style='width:260px;height:155px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr>
			<td>
			<tr>
			<td align='right' valign='top' width='140px' colspan='3' height='25' style='font-size:14px;padding-right:6px'>سرپرست:
			<b>$resname[name] <br/>فرزند $resname[father_name] ".$blackliststate." </b>
			</br>شماره گذرنامه:<b></br>$resname[passport_no]</b>
			<br/>
			<div style='font-size:11px ;width:350px;margin-left:-220px' dir='rtl' >
			<b>تاریخ صدور:</b> <b dir='rtl'>$resname[pass_issue_date]</b>
			 <br/> 
			<b>تاریخ اعتبار:</b>
	<b dir='rtl'>$resname[pass_validation_date]</b>
	</div>
	<br/>
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
<img src="img/line.jpg" style='margin-left:-6px'/>
<div dir="rtl" align="left" >
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
$i=1;
$karvancode="select * from karvan where id='$karvan'";
$reskarvan=mysql_query($karvancode) or die (mysql_error());
$rowkarvan=mysql_fetch_array($reskarvan);
while($row=mysql_fetch_array($res)){
	$sq="select *from applicants where id='$row[applicant_id]' and applicant_type!='سرپرست'";
	$rs=mysql_query($sq) or die(mysql_error());
	$rw=mysql_fetch_array($rs);
	//Checking if the person is in the black list or not
	$blackliststate="";
	$sqlch="select count(id) from blacklist where passport_no='$rw[passport_no]' ";
	$resch=mysql_query($sqlch) or die(mysql_error());
	$rowch=mysql_fetch_array($resch);
	if($rowch['count(id)']>0){
	$blackliststate="<b style='color:red'>*</b>";
	}else{
	$blackliststate="";
	}
	//Finished Checking
	
	$name=$rw['name']." ".$blackliststate;
	$fathername=$rw['father_name'];
	$familyname=$rw['f_name'];
	$passisueplace=$rw['pass_issue_place'];
	$country="افغانستان";
	$birthdate=$rw['birth_date'];
	$birthplace=$rw['birth_place'];
	$passno=$rw['passport_no'];
	$validate=$rw['pass_validation_date'];
	
	//Counting number of times that this person has gotten visa (not blacklist)
	$sql="select count(id) from applicants where passport_no='$passno' and applicant_parent='' and pass_issue_date!='0000-00-00' and pass_issue_place!='همراه'";
	$rss=mysql_query($sql) or die(mysql_error());
	$rww=mysql_fetch_array($rss);
	if($rww['count(id)']!=0){
	$countingvisa="<b style='color:red; font-size:11px; font-family:Tahoma'>".($rowch['count(id)']+$rww['count(id)'])."</b>";
	}else{
	$countingvisa="";
	}
	$issuedate=$rw['pass_issue_date'];
	$passvalidateion=$rw['pass_validation_date'];
	$id=$rw['id'];
	$code ="کد کاروان:".$rowkarvan['code'];
	if($id!=0){
	if(($i%2)){
		echo "
		<tr><td align='left'>
			<div id='wb_Table1' style='margin-bottom:5px;margin-top:3px; width:355px;height:140px;font-family:B Titr; background-color:#befdf6;border:2'   >
			<table style='padding-top:4px;padding-right:3px' width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr border='0'>
			<td width='10px' align='center'><div style='background-color:white;width:20px'>$i</div></td>

			<td align='right' valign='top' width='210'  height='25' style='font-size:13px;font-family:Traffic;padding-right:8px;padding-top:3px'>نام: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $name</b><div style='margin-top:0px;margin-bottom:1px;height:4px;font-size:22px'></div>
			نام پدر: 
			&nbsp;&nbsp;&nbsp;
			&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $fathername </b><div style='margin-top:0px;margin-bottom:1px;height:4px;font-size:22px'></div>
			شماره گذرنامه: 
			<b style='font-family:B Titr; font-size:13px'>$passno</b><div style='margin-top:0px;margin-bottom:1px;height:20px;font-size:22px'></div>
			<div style='width:350px;margin-left:-220px'><b>تاریخ صدور:</b><b dir='rtl' style='font-family:B Titr; font-size:11px'>$issuedate</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>تاریخ اعتبار:</b><b  dir='rtl' style='font-family:B Titr; font-size:11px;'>$validate</b>
			</div>
			
			</td>
			<td align='center' rowspan='2' valign='top' width='20px' ><img src='applicant_images/".$id.".jpg' style='width:52px;height:67px'/></br>$countingvisa</td>
			<td align='right' valign='top' width='90' height='90'><img src='applicant_images/".$id.".jpg' style='width:85px;height:102px'/></td>			</tr>
			</table></div>
		</td>";
		$i++;
	}else {
		echo "
		<td align='center'>
			<div id='wb_Table1' style='margin-bottom:5px;margin-top:3px;width:355px;height:140px;font-family:B Titr; margin-left:5px;background-color:#befdf6;border:2'   >
			<table style='padding-top:4px;padding-right:3px' width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr border='0'>
			<td width='10px' align='center'><div style='background-color:white;width:20px'>$i</div></td>

			<td align='right' valign='top' width='210'  height='25' style='font-size:13px;font-family:Traffic;padding-right:8px;padding-top:3px'>نام: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $name</b><div style='margin-top:0px;margin-bottom:1px;height:4px;font-size:22px'></div>
			نام پدر: 
			&nbsp;&nbsp;&nbsp;
			&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $fathername </b><div style='margin-top:0px;margin-bottom:1px;height:4px;font-size:22px'></div>
			شماره گذرنامه: 
			
			<b style='font-family:B Titr; font-size:13px'>$passno</b><div style='margin-top:0px;margin-bottom:1px;height:20px;font-size:22px'></div>
			<div style='width:350px;margin-left:-220px'><b>تاریخ صدور:</b><b dir='rtl' style='font-family:B Titr; font-size:11px'>$issuedate</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>تاریخ اعتبار:</b><b  dir='rtl' style='font-family:B Titr; font-size:11px;'>$validate</b>
			</div>
			</td>
			<td align='center' rowspan='2' valign='top' width='20px' ><img src='applicant_images/".$id.".jpg' style='width:52px;height:67px'/></br>$countingvisa</td>
			<td align='right' valign='top' width='90' height='90'><img src='applicant_images/".$id.".jpg' style='width:85px;height:102px'/></td>
			</tr>
			</table></div>
		</td></tr>
		<tr><td colspan='3' align='center'><img src='img/smallline.jpg'/></td>";
		$i++;
	}
	}

}
?>
<tr>
<td align="center" colspan='2'>
<?php
		echo "<h2 style='font-family:B Titr;color:blue'>روادید گروهی ";
		echo"<b style='align:right;font-size:14'>کاروان ".$karvanmemberamount." نفره    کد: $ksecretcode</b>";
		echo "<br/>صادره از   $kcenter</h2>";
?>
</td>
</tr>
</table>
</div>
</html>