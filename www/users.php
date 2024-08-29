<?php
include("template_header.php");
?>
<script>
    function check_exist(user_name){
        var divid="userExist";
        
     	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
 		 }
		else{// code for IE6, IE5
			  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
 		 }
			xmlhttp.onreadystatechange=function()
		 {
 			if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(divid).innerHTML=xmlhttp.responseText;    }
			  }
			 
				xmlhttp.open('GET','user_check.php?user_name='+user_name,true);
				xmlhttp.send();
				
				}
  function getUserInfo(userId,utype){
        var divid="userEdit";
        
     	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
 		 }
		else{// code for IE6, IE5
			  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
 		 }
			xmlhttp.onreadystatechange=function()
		 {
 			if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById(divid).innerHTML=xmlhttp.responseText;    }
			  }
			 
				xmlhttp.open('GET','user_edit.php?userId='+userId+'&usertype='+utype,true);
				xmlhttp.send();
				
				}
</script>
	    <div id="content" >
	    <div id="top_menu" class="clearfix">
		<ul class="sf-menu"> <!-- DROPDOWN MENU -->
			<li class="current">
				<a href="homepage.php">صفحه اصلی</a><!-- First level MENU -->
			</li>
		</ul>
					</div>
		<div id="content_main" class="clearfix">
		<div align="right" dir="rtl">
		<form method="post" action="users.php" accept-charset="utf-8" id="myform"  class="formular">
			<fieldset>
				<legend align="right"><span >کاربران</span></legend>
				<?php
				if($_SESSION['user_type']=='admin' ){
				
				?>
				<a href="#" id="addlink" ><b>اضافه نمودن کاربر جدید</b></a>
				<a href="#" id="addlinkback"><b>اضافه نمودن کاربر جدید</b></a>
				<input type="button" style=" width:20px; background-color:white; border:0;background-image:url(img/back.png)" /></br>
				</br>
				<div id="addlinkdata">
				<div id="userExist"></div>
				<table width="30%" >
				<tr >
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td>نام :</td>
					<td><input type="text" id="name" class="validate[required] text-input" name="name"/></td>
				</tr>
				<tr>
					<td>ایمیل:</td>
					<td><input type="text" id="email" class="validate[required] text-input" name="email"/></td>
				</tr>
				<tr>
					<td>نام کاربری :</td>
					<td><input type="text" id="user_name" class="validate[required] text-input" name="user_name" onKeyup="check_exist(this.value)"/></td>
				</tr>
				<tr>
					<td>کلمه عبور :</td>
					<td><input type="password" id="password" class="validate[required] text-input" name="password"/></td>
				</tr>
				<tr>
					<td>تکرار کلمه عبور :</td>
					<td><input type="password" id="repassword" class="validate[required] text-input" name="repassword"/></td>
				</tr>
				<tr>
					<td>نوع کاربر :</td>
					<td><select name="type" id="type" class="validate[required]">
					<option value="">انتخاب</option>
					<option value="admin">کاربر مدیر</option>
					<option value="user">کاربر عادی</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>سطح دسترسی :</td>
					<td>
					کاروان های جدید <input type="checkbox" name="newkarvan" id="newkarvan" value="1"/><br/>
					کاروان های مصاحبه شده <input type="checkbox" name="interviewed" id="interviewed" value="1"/><br/>
					کاروان های اعزام شده<input type="checkbox" name="sent" id="sent" value="1"/><br/>
					کاروان های مراجعت نموده <input type="checkbox" name="backkarvan" id="backkarvan" value="1"/><br/>
					
					
					</td>
				</tr>
				<tr>
					<td>وضیعت :</td>
					<td><select name="status" id="status" class="validate[required]">
					<option value="">انتخاب</option>
					<option value="1">فعال</option>
					<option value="2">غیر فعال</option>
					</select>
					</td>
				</tr>
				</tr>
					<td>تفصیل :</td>
					<td><textarea cols="17" rows="3" id="description" name="description" class="validate[required]"><?php if(isset($_GET['edit'])){ echo  $property_description; } ?></textarea></td>
				</tr>
				<tr>
					<td align='left'><b>کاروان های جدید</b></td>
					<td><input type='checkbox' name='newkarvan' id='newkarvan' value='1'/></td>
				</tr>
				<tr>
					<td align='left'><b>آرشیو کاروانها</b></td>
					<td><input type='checkbox' name='karchvie' id='karchvie' value='1' /></td>
				</tr>
				<tr>
					<td align='left'><b>مراکز کاروانها</b></td>
					<td><input type='checkbox' name='kcenters' id='kcenters' value='1' /></td>
				</tr>
				<tr>
					<td align='left'><b>گزارش دهی کاروانها</b></td>
					<td><input type='checkbox' name='kreport' id='kreport' value='1' /></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت کفیل</b></td>
					<td><input type='checkbox' name='kafil' id='kafil' value='1' /></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت کاربران</b></td>
					<td><input type='checkbox' name='users' id='users' value='1' /></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت ویزاهای انفرادی</b></td>
					<td><input type='checkbox' name='vcenter' id='vcenter' value='1' /></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت کفیل </b></td>
					<td><input type='checkbox' name='kafil' id='kafil' value='1'/></td>
				</tr>
				<tr>
					<td align='left'><b>ویزای جدید</b></td>
					<td><input type='checkbox' name='vnew' id='vnew' value='1'/></td>
				</tr>
				<tr>
					<td align='left'><b>آرشیو ویزا </b></td>
					<td><input type='checkbox' name='visa_archive' id='visa_archive' value='1'/></td>
				</tr>
				<tr>
					<td align='left'><b>سوابق ویزا </b></td>
					<td><input type='checkbox' name='vresume' id='vresume' value='1'/></td>
				</tr>
				<tr>
					<td align='left'><b>پشتیبانی سیستم</b></td>
					<td><input type='checkbox' name='backup' id='backup' value='1'/></td>
				</tr>
				<tr>
				<td></td>
				<td align="left"><input type="submit" class="submit"  name="save" value="ذخیره" id="linkdatabutton"/>
				<a href="users.php"><input type="button" name="cancel" value="انصراف"/></a></td>
				</tr>
				</table>
				</br>
				
				</div>
				<?php
				}
				?></br>
				<?php
				    if(isset($_POST['save'])){
						 
						if($_POST['user_exist']){
						     echo"<div id='fail' class='info_div' align right><span class='ico_cancel'>شما بر خلاف قوانین فورم اطلاعات وارد کردید</span></div>";
						}
						
					     $sql="Insert into users( name, email, user_name, password, status, type, karvans, karvan_archive, karvan_center, report, user_management, visa_centers, newvisa, visa_archive, visa_resume, kafil, backup, newkarvans, interviewdkarvans, sentkarvans, backkarvans, kafil) values('$_POST[name]','$_POST[email]', '$_POST[user_name]', '$_POST[password]', '$_POST[status]', '$_POST[type]',
						 '$_POST[newkarvan]','$_POST[karchvie]','$_POST[kcenters]','$_POST[kreport]','$_POST[users]','$_POST[vcenter]'
						 ,'$_POST[vnew]','$_POST[visa_archive]','$_POST[vresume]', '$_POST[kafil]', '$_POST[backup]', '$_POST[newkarvan]', '$_POST[interviewed]', '$_POST[sent]', '$_POST[backkarvan]', '$_POST[kafil]' )";
				             mysql_query($sql) or die(mysql_error());
				             header("location: users.php");
						
					}                                                                                                                                                                             
				?>
				<div id="userEdit"></div>
				<h3 class="ico_mug">لیست کاربران سیستم</h3>
				<div id="tabledata" class="section">
				<table width="90%" id="table" >
				<tr>
				<th>نام</th>
				<th>نام کاربری</th>
				<th>ایمل</th>
				<th>وضیعت</th>
				<th>عملیات</th>
				</tr>
				<?php
				    if($_SESSION['user_type']!='admin'){
				     $sql="Select id, name, email, user_name, description, status, type from users where id='$_SESSION[user_id]'";
					 }else{
					 $sql="Select id, name, email, user_name, description, status, type from users";
					 }
				     $res=mysql_query($sql) or die(mysql_error());
				        while($row=mysql_fetch_array($res)){
						  $id = $row['id'];
					      $name = $row['name'];
					      $email = $row['email'];
					      $user_name = $row['user_name'];
						  $status = $row['status'];
					      $description = $row['description'];
						  
						  if($status == "1"){
						    $condetion = "فعال";
						  }
						  
						  if($status == "2"){
						     $condetion = "غیر فعال";
						  }
						echo"<tr>
						<td class='table_date'  align='center'>$name</td>
						<td class='table_date'  align='center'>$user_name</td>
						<td class='table_date'  align='center'>$email</td>
						<td class='table_date'  align='center'>$condetion</td>";
						echo "
						<td class='table_date'  align='center' ><img src='img/edit.png' style='cursor:pointer' onclick='getUserInfo(\"$row[id]\",\"$_SESSION[user_type]\")'/>";
						if($_SESSION['user_type']=="admin"){
						echo"
						<a href='users.php?delete_user=$id' class='confirm'><img src='img/cancel.png' width='15px' height='15'/></a>   ";
						}echo"
						</td>
						</tr>";
						
					}
				?>
				
				<?php
				if(isset($_POST['edit_user'])){
							if($_SESSION['user_type']=="admin"){
					       $sql="Update users SET name = '$_POST[name]', user_name = '$_POST[user_name]' , password = '$_POST[password]', email = '$_POST[email]', status = '$_POST[status]', type = '$_POST[etype]', description = '$_POST[description]', karvans='$_POST[newkarvan]', karvan_archive='$_POST[karchvie]', karvan_center='$_POST[kcenters]', report='$_POST[kreport]',
 user_management='$_POST[users]', visa_centers='$_POST[vcenter]', newvisa='$_POST[vnew]', visa_archive='$_POST[visa_archive]',
 visa_resume='$_POST[vresume]', kafil='$_POST[ukafil]', backup='$_POST[backup]', newkarvans='$_POST[nkarvan]', interviewdkarvans='$_POST[ikarvan]',
 sentkarvans='$_POST[skarvan]', backkarvans='$_POST[bkarvan]', kafil='$_POST[newkafil]' where id='$_POST[user_id]'";
					       }
						   else{
						   $sql="Update users SET  password = '$_POST[password]' where id='$_POST[user_id]'";
						   }
						   mysql_query($sql) or die(mysql_error());
						
					       header("location:users.php");
						   die();
				    }
				?>
				
				<?php
				   if(isset($_GET['delete_user'])){
				         $id = $_GET['delete_user'];
				         $sql="Delete from users where id='$id'";
				         mysql_query($sql);
						 
						 header("location: users.php");
						 die();
				   }
				?>
				</table>
				</div>
			 </div>
 		</fieldset>
			
		</form>
		</div>
		
</div><!-- end container -->
	   <?php
	   include ("template_footer.php");
	   ?>
</body>
</html>
