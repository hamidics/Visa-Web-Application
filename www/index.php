<?php
ob_start();
session_start();
require_once("../library/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ستاد اعزام زائران به مشهد</title>
<link rel="stylesheet" href="login/css/screen.css" type="text/css" media="screen" title="default" />

</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">
<form action="index.php" method="post">
	<!-- start logo -->
	<div id="logo-login"  dir ="rtl" >
		<h1 style="margin-left:70px;color:white">ستاد اعزام زائران به مشهد</h1>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner" >
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			
			<td dir="rtl"><input name="username" type="text" value="<?php echo getenv("username"); ?>" class="login-inp" /></td>
			<th align="right" dir="rtl">نام کاربری : </th>
		</tr>
		<tr>
			
			<td dir="rtl"><br/><input type="password" name="password" value="************"  onfocus="this.value=''" class="login-inp" /></td>
			<th align="right" dir="rtl"><br/>رمز عبور : </th>
		</tr>
		<tr>
			<th></th>
		</tr>
		<tr>
		<td><br/><br/><input type="submit" name="login" value="ورود" class="submit-login"  /></td>
			<th></th>
			
		</tr>
		</table>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
 </div>
 <!--  end loginbox -->
 <br/>
<?php 

   if(isset($_POST['login'])){
      $username = escape_data($_POST['username']);
	  $password = escape_data($_POST['password']);
	  $sql="Select id, name, user_name, type, password, newkarvans, interviewdkarvans, sentkarvans, backkarvans from users where status=1 and user_name='$username' and password='$password'";
	  $res=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_array($res);
	     $login_username = $row['user_name'];  
		 $login_password = $row['password'];
		 $_SESSION['user_name'] = $row['name'];
		 $_SESSION['user_id'] = $row['id'];
		 $_SESSION['user_type'] = $row['type'];
		 $_SESSION['p1'] = $row['newkarvans'];
		 $_SESSION['p2'] = $row['interviewdkarvans'];
		 $_SESSION['p3'] = $row['sentkarvans'];
		 $_SESSION['p4'] = $row['backkarvans'];
      
	  if($username == $login_username and $username != "" and  $password == $login_password and $password != ""){
			header("location:homepage.php");
			die();		 }
		 
		 if($username != $login_username or $password != $login_password or $username == "" or $password == ""){
		     echo"
			 <div dir='rtl' align='center'>
			 <b align='center' style='color:red; font-size:14px ; align:center;font-family:Tahoma'>
			 
			 ";
             echo"نام کاربری یا رمز عبور اشتباه است!";
			 echo"</b>
			 </div>";
		 }
		 
		 //echo $login_username; echo $login_password;
  }
  
?> 

</form>
</div>
<div align="center" style="color:white;margin-top:40px; font-size:12px; font-family:Tahoma" ><br/><br/></div>
<!-- End: login-holder -->
</body>
</html>