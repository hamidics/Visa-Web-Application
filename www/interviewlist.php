<?PHP
require_once("../library/db.php");

session_start();
require_once("../library/pdate.php");
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
$sql="select name,father_name,passport_no,pass_issue_date, pass_validation_date  from applicants where id='$appid'";
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
$karvancode="select send_number from karvan where id='$karvan'";
$reskarvan=mysql_query($karvancode) or die (mysql_error());
$rowkarvan=mysql_fetch_array($reskarvan);
//Getting send senter and rahgiri code
$karvancode="select rahgiri_code, send_center from mosques where id='$_GET[mosque]'";
$resmosque=mysql_query($karvancode) or die (mysql_error());
$rowmosque=mysql_fetch_array($resmosque);
$kcenter=$rowmosque['send_center'];
$ksecretcode=$rowmosque['rahgiri_code'];
$karvanmemberamount=$rw['count(id)'];
echo "<tr><td><div id='wb_Table1' style='width:236px;height:150px;margin-top:-20px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr>
			<td align='right' valign='top'  colspan='4' height='30'></br></br><b style='align:right;font-size:16px'>کاروان ".$rw['count(id)']." نفره  <br/>
			<b style='font-size:13px'> سرپرست:
			$resname[name]  </b><br/><b>کد: $ksecretcode </br></b></td>
			</tr>
			</table></div>
			</td>
			
			";
echo "<td>	<div id='wb_Table1' style='width:220px;height:150px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='2' cellspacing='0' id='Table1'>
			
			<tr>
			<td align='center'><img src='img/iranlogo.png'/></td>
			</tr>
			<tr>
			<td align='center' valign='top'  height='30'><b style='align:right;font-size:15px'>جمهوری اسلامی ایران</b><div style='margin-top:-3px'></div><b style='align:right;font-size:15px'>وزارت خارجه<div style='margin-top:-3px'></div>$kcenter <br/></b>
			<div style='margin-top:0px'></div></tr>
			</table></div>
			</td>
			<td>
			<div id='wb_Table1' style='width:245px;height:130px;font-family:B Titr' align='left' border='1' dir='rtl'>
			<table width='100%' border='0' cellpadding='0' cellspacing='0' id='Table1'>
			<tr>
			<td>
			<tr>
			<td align='right' valign='top' width='140px' colspan='3' height='25' style='font-size:14px;padding-right:8px'>سرپرست:
			<b>$resname[name] <br/> فرزند $resname[father_name] ".$blackliststate." </b>
			</br>شماره گذرنامه:<b></br>$resname[passport_no]</b>
			<div style='font-size:11px ;width:350px;margin-left:-220px' >
			تاریخ صدور: $resname[pass_issue_date]
			 | 
			تاریخ اعتبار:
	$resname[pass_validation_date]
	</div>
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
<img src="img/line.jpg"/>
<div dir="rtl" align="left">
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
	//Getting pass validate days
	if($rw['pass_validation_date']!="0000-00-00"){
	//echo $ts1;
	$date1 = date("Y-m-d");
	$date2 = $rw['pass_validation_date'];
	$sepdate1=explode("-", $date2);
	$sepdate2=explode("-", $date1);
	$newdate2=  gregorian_to_jalali($sepdate2[0], $sepdate2[1], $sqpdate2[2]);
	$date2=$newdate2[0]."-".$newdate2[1]."-".$newdate2[2];
	$diff = (($sepdate1[0] - $newdate2[0]) * 365)+(($sepdate1[1]-$newdate2[1])*30)+$sepdate1[2]-$newdate2[2];
	}
	if($id!=0){
	
		echo "
		<tr><td align='left'>
			<div id='wb_Table1' dir='rtl' style='margin-top:5px; margin-left:10px; width:700px;height:115px;font-family:B Titr; margin-bottom:5px;background-color:#e5e6ee;border:2'   >
			<table style='padding-top:0px;padding-right:4px' width='100%' border='0' dir='rtl' cellpadding='0' cellspacing='0' id='Table1'>
			<tr border='0'>
			<td width='10px' align='center'><div style='background-color:white;width:20px'>$i</div></td>

			<td align='right' valign='top' width='210' colspan='2'  height='25' style='font-size:13px;font-family:Traffic;padding-right:8px;padding-top:1px'>نام: 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $name</b>
			<div style='margin-top:0px;margin-bottom:1px;height:0px;font-size:22px'></div>
			نام پدر: 
			&nbsp;&nbsp;&nbsp;
			&nbsp;
			<b style='font-family:B Titr; font-size:13px'> $fathername </b>
			<div style='margin-top:0px;margin-bottom:1px;height:0px;font-size:22px'></div>
			شماره گذرنامه: &nbsp;&nbsp;
			<b style='font-family:B Titr; font-size:15px'>$passno</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			محل صدور: <b  style='font-family:B Titr; font-size:12px' dir='rtl' >$passisueplace</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			تاریخ تولد: <b  style='font-family:B Titr; font-size:12px' dir='rtl' >$birthdate</b>
			<div style='margin-top:0px;margin-bottom:1px;height:1px;font-size:22px'></div>
			
			 تاریخ صدور:<b  style='font-family:B Titr; font-size:12px' dir='rtl' > &nbsp;&nbsp;&nbsp;$issuedate</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تاریخ اعتبار:<b  dir='rtl' style='font-family:B Titr; font-size:12px'>&nbsp;&nbsp;&nbsp;$validate</b>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مدت اعتبار: <b  dir='rtl' style='font-family:B Titr; font-size:12px'>$diff روز</b>
			</td>
			<td align='right' valign='top' width='90' height='90'><img src='applicant_images/".$id.".jpg' style='margin-top:4px;width:85px;height:102px'/></td>			</tr>
			</table></div>
		</td>
	</tr>
		<tr><td colspan='1'><img src='img/smallline.jpg'/></td>";
		$i++;
	
	}

}
?>
<tr>
<td align="center" colspan='2'>
<?php
		echo "<h2 style='font-family:B Titr;color:blue'>روادید گروهی ";
		echo"<b style='align:right;font-size:14'>کاروان ".$karvanmemberamount." نفره    کد: $ksecretcode</b>";
		echo "<br/>صادره از  $kcenter</h2>";
?>
</td>
</tr>
</table>

</html>