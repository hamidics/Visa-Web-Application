<?php
require_once("../library/db.php");
?>
<html>
<head>
<meta http-equiv='Content-Language' content='fa'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>


</head>


<?php
	$userId=$_GET['userId'];
	
	$sql="Select * from users where id ='$userId'";
	            $res=mysql_query($sql) or die(mysql_error());
	            $row=mysql_fetch_array($res);
				  $karvans = $row['karvans'];
			      $karvan_archive = $row['karvan_archive'];
				   $karvan_center = $row['karvan_center'];
				   $report = $row['report'];
				   $user_management = $row['user_management'];
				   $visa_centers = $row['visa_centers'];
				   $newvisa = $row['newvisa'];
				   $visa_archive = $row['visa_archive'];
				   $visa_resume = $row['visa_resume'];
				   $backup = $row['backup'];
				   $kafil = $row['kafil'];
				   if($_GET['usertype']=="admin"){  
				echo"<table width='30%' >
				<tr >
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td>نام :</td>
					<td><input type='text' id='name' class='validate[required] text-input' name='name' value='$row[name]'/></td>
				</tr>
				<tr>
					<td>ایمیل:</td>
					<td><input type='text' id='email' class='validate[required] text-input' name='email' value='$row[email]'/></td>
				</tr>
				<tr>
					<td>نام کاربری :</td>
					<td><input type='text' id='user_name' class='validate[required] text-input' name='user_name' value='$row[user_name]'/></td>
				</tr>
				<tr>
					<td>کلمه عبور :</td>
					<td><input type='password' id='password' class='validate[required] text-input' value='$row[password]' name='password' value='$row[password]'/></td>
				</tr>
				<tr>
					<td>تکرار کلمه عبور :</td>
					<td><input type='password' id='repassword' class='validate[required] text-input' value='$row[password]' name='repassword'/></td>
				</tr>
				<tr>
					<td>نوع کاربر :</td>
					<td><select name='etype' id='etype' class='validate[required]'>
					<option value=''>انتخاب</option>";
					echo"<option value='admin'"; if($row['type'] == "admin"){ echo "selected"; } echo">کاربر مدیر</option>";
					echo"<option value='user'"; if ($row['type'] == "user"){ echo "selected"; } echo">کاربر عادی</option>";
					echo"</select>
					</td>
				</tr>
				<tr>
					<td>سطح دسترسی :</td>
					<td>";
					echo"کاروان های جدید<input type='checkbox' name='nkarvan' id='nkarvan' value='1'"; if($row['newkarvans'] == 1){ echo "checked"; } echo"/>";
					echo"<br/>کاروان های مصاحبه شده<input type='checkbox' name='ikarvan' id='ikarvan' value='1'"; if ($row['interviewdkarvans'] == 1){ echo "checked"; } echo"/>";
					echo"<br/>کاروان های اعزام شده<input  type='checkbox' name='skarvan' id='skarvan' value='1'"; if ($row['sentkarvans'] == 1){ echo "checked"; } echo"/>";
					echo"<br/>کاروان های مراجعت نموده<input   type='checkbox' name='bkarvan' id='bkarvan' value='1'"; if($row['backkarvans'] == 1){ echo "checked"; } echo"></option>";
					echo"
					</td>
				</tr>
				<tr>
					<td>وضیعت :</td>
					<td><select name='status' id='status' class='validate[required]'>
					<option value=''>انتخاب</option>";
					echo"<option value='1'"; if($row['status'] == 1){ echo "selected"; } echo">فعال</option>";
					echo"<option value='2'"; if ($row['status'] == 2){ echo "selected"; } echo">غیر فعال</option>";
					echo"</select>
					</td>
				</tr>
				</tr>
					<td>تفصیل :</td>
					<td><textarea cols='17' rows='3' id='description' name='description' >$row[description]</textarea></td>
				</tr>
				<tr>
					<td align='left'><b>کاروان های جدید</b></td>
					<td><input type='checkbox' name='newkarvan' id='newkarvan' value='1'"; if($karvans == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>آرشیو کاروانها</b></td>
					<td><input type='checkbox' name='karchvie' id='karchvie' value='1' "; if($karvan_archive == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>مراکز کاروانها</b></td>
					<td><input type='checkbox' name='kcenters' id='kcenters' value='1' "; if($karvan_center == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>گزارش دهی کاروانها</b></td>
					<td><input type='checkbox' name='kreport' id='kreport' value='1' "; if($report == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت کاربران</b></td>
					<td><input type='checkbox' name='users' id='users' value='1' "; if($user_management == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت ویزاهای انفرادی</b></td>
					<td><input type='checkbox' name='vcenter' id='vcenter' value='1' "; if($visa_centers == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>مدیریت کفیل</b></td>
					<td><input type='checkbox' name='newkafil' id='newkafil' value='1' "; if($kafil == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>ویزای جدید</b></td>
					<td><input type='checkbox' name='vnew' id='vnew' value='1'"; if($newvisa == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>آرشیو ویزا </b></td>
					<td><input type='checkbox' name='visa_archive' id='visa_archive' value='1'"; if($visa_archive == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>سوابق ویزا </b></td>
					<td><input type='checkbox' name='vresume' id='vresume' value='1'"; if($visa_resume == 1){ echo"checked";} echo"/></td>
				</tr>
				<tr>
					<td align='left'><b>پشتیبانی سیستم</b></td>
					<td><input type='checkbox' name='backup' id='backup' value='1'"; if($backup == 1){ echo"checked";} echo"/></td>
				</tr>
			";
			}else{
				echo "<tr>
					<td>کلمه عبور :</td>
					<td><input type='password' id='password' class='validate[required] text-input' name='password' value='$row[password]'/></td>
				</tr>
				<tr>
					<td>تکرار کلمه عبور :</td>
					<td><input type='password' id='repassword' class='validate[required] text-input' value='$row[password]' name='repassword'/></td>
				</tr>";
				}
				echo "
				<tr>
				<td></td>
				<td align='left'><input type='submit' class='submit'  name='edit_user' value='ذخیره' id='linkdatabutton'/>
				<a href='users.php'><input type='button' name='cancel' value='انصراف'/></a></td>
				<input type='hidden' name='user_id' value='$userId'/>
				</tr>
				</table>
				</br>";
		
?>


</html>