<?php
require_once("../library/db.php");
require_once("../library/pdate.php");

?>
<html>
<head>
<meta http-equiv='Content-Language' content='fa'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

</head>

<?php

//echo $ts1;
$date1 = date("Y-m-d");
$date2 = $_GET['etebardate'];
$sepdate=explode("-", $date2);
$newdate= jalali_to_gregorian($sepdate[0], $sepdate[1], $sqpdate[2]);
$date2=$newdate[0]."-".$newdate[1]."-".$newdate[2];
$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

if($diff<7){
echo $diff;
	echo "<b style='color:red'>اعتبار پاسپورت برای گرفتن ویزا کافی نمی باشد.</b>";
}else{
	echo "<input type='submit' class='submit'  name='insertapplicant' value='ذخیره' id='linkdatabutton'/>";
}

?>
</html>