<?php
include("template_header.php");
require_once("../library/image_resize.php");
?>
<script>
function showinfo(applicantinfo,karvanid,passnumber,issueplace,issuedate,issuevalidate)
{
var divid='appinfo';
	if (applicantinfo=='')
  		{
  			document.getElementById(divid).innerHTML='';
 			 return;
 		 } 
	if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
 		 }
		else
		  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
 		 }
			xmlhttp.onreadystatechange=function()
			  {
 			 if (xmlhttp.readyState==4 && xmlhttp.status==200)
 			   {
					document.getElementById(divid).innerHTML=xmlhttp.responseText;    }
			  }
			 
				xmlhttp.open('GET','karvan_applicants_getinfo.php?type='+applicantinfo+'&karvanid='+karvanid+'&passno='+passnumber+'&issueplace='+issueplace+'&issuedate='+issuedate+'&validedate='+issuevalidate,true);
				xmlhttp.send();
				
				
}
function checkkafil(val){
	if(val=="none"){
		document.getElementById('editapplicant').style.visibility="hidden";
	}else{
		document.getElementById('editapplicant').style.visibility="visible";
	}

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
		<div id="content_main" class="clearfix" >
		<div align="right" dir="rtl" >
		<form action="<?php echo "karvan_applicant_edit.php?appid=$_GET[appid]&kid=$_GET[kid]";?>" method="post" accept-charset="utf-8" id="myform" enctype='multipart/form-data' class="formular">
			<fieldset>
				<legend align="right"><span >ویرایش متقاضی</span></legend>
						<div style="margin-right:50px">
							<?php
							$sql="select * from applicants where id='$_GET[appid]'";
							$res=mysql_query($sql) or die (mysql_error());
							$row=mysql_fetch_array($res);
							?>
							 نام:</br></br>
							<input type="text" size="30" name="app_name" value="<?php echo $row['name'];?>" onkeyup="searchnames(this.value)" class="validate[required]" id="app_name" />
							</br></br>
							نام خانوادگی:</br></br>
							<input type="text" size="30" name="app_fname" value="<?php echo $row['f_name'];?>" id="app_fname" />

						</br></br>
							 نام پدر:</br></br>
							<input type="text" size="30" value="<?php echo $row['father_name'];?>" name="app_fathername" class="validate[required]" id="app_fathername" />

						</br></br>
						
							 نام کفیل:</br></br>
							
							<select name="newkafil" id="newkafil" onchange="checkkafil(this.value)">
							<option value="">انتخاب نام کفیل</option>
							<?php
								$sqkafil="select id, name, father_name from kafils";
								$rskafil=mysql_query($sqkafil) or die (mysql_error());
								while($rwkafil=mysql_fetch_array($rskafil)){
									//Counting applicant kafils
										$sqlcountkafil="select count(id) from applicants where kafil_id='$rwkafil[id]'";
										$rscountkafil=mysql_query($sqlcountkafil) or die (mysql_error());
										$rwcountkafil1=mysql_fetch_array($rscountkafil);
									//Counting visa applicants kafils
										$sqlcountkafil="select count(id) from visa_applicants where kafil_id='$rwkafil[id]'";
										$rscountkafil=mysql_query($sqlcountkafil) or die (mysql_error());
										$rwcountkafil2=mysql_fetch_array($rscountkafil);
									$total=$rwcountkafil1['count(id)']+$rwcountkafil2['count(id)'];
									if($total==5 and $rwkafil['id']==$row['kafil_id']){
											echo "<option selected style='color:white;background-color:red' value='$rwkafil[id]'>$rwkafil[name] ($rwkafil[father_name])</option>";
									}
									if($total<5 and $rwkafil['id']==$row['kafil_id']){
											echo "<option selected  value='$rwkafil[id]'>$rwkafil[name] ($rwkafil[father_name])</option>";
									}
									if($total==5 and $rwkafil['id']!=$row['kafil_id']){
											echo "<option  style='color:white;background-color:red' value='none'>$rwkafil[name] ($rwkafil[father_name])</option>";
									}
									if($total<5 and $rwkafil['id']!=$row['kafil_id']){
											echo "<option   value='$rwkafil[id]'>$rwkafil[name] ($rwkafil[father_name])</option>";
									}
								}
							?>
							</select>
							<input type="text" name="relationshipkafil" value="<?php echo $row['kafil_relation'];?>" id="relationshipkafil" placeholder="نسبت شخص با کفیل"/>
							<br/><br/>
						
							 شغل:</br></br>
							<input type="text" size="30" value="<?php echo $row['job'];?>" name="app_job"  id="app_job" />
						</br></br>
						شماره پاسپورت فعلی : <b><?php echo $row['passport_no'];?></b>
						</br></br>
							 تغییر شماره پاسپورت:</br></br>
							<?php echo "<select name='app_passno' size='4' style='width:220px' id='app_passno' style='width:182px' onchange='showinfo(this.value,$_GET[kid],\"$row[passport_no]\",\"$row[pass_issue_place]\",\"$row[pass_issue_date]\",\"$row[pass_validation_date]\")' >";?>
							<option value="">انتخاب شماره پاسپورت</option>
							<option value="new">شماره پاسپورت جدید</option>
							<?php
							$sql="select karvan_applicants_getinfo.applicant_id as applicant_id,applicants.passport_no as passport_no,applicants.name as name from  karvan_applicants_getinfo,applicants where karvan_applicants_getinfo.karvan_id='$_GET[kid]' and applicants.id=karvan_applicants_getinfo.applicant_id and applicants.applicant_parent='' and applicants.pass_issue_date!='0000-00-00' and pass_issue_place!='همراه'";

							$res=mysql_query($sql) or die(mysql_query($sql));
							while($rw=mysql_fetch_array($res)){
						
								echo "<option value='$rw[applicant_id]'>$rw[name] ($rw[passport_no])</option>";
							}
							?>
							</select>
							</br></br>
							<div  id='appinfo'></div>
				
							شماره تماس:</br></br>
							<input type="text" size="30" name="app_phone" value="<?php echo $row['phone_num'];?>" class="validate[required]" id="app_phone" /></br></br>
							 تاریخ تولد:</br></br>
							
							<input type="text" name="app_birth" size='30' value="<?php echo $row['birth_date'];?>" id="app_birth"  class="validate[required]" size="25"/>
							</br></br>
							محل تولد:</br></br>
							<input type="text" name="app_birthplace" size="30" value="<?php echo $row['birth_place'];?>" class="validate[required]" id="app_birthplace"/>
							</br></br>
							عنوان:</br></br>
							<select name="app_position"  id="app_position"  style="width:220px">
							<option value="">عادی</option>
							<?php
							if($row['applicant_type']=="سرپرست"){
								echo "<option selected>سرپرست</option>";
								echo "<option >معاون اول</option>";
								echo "<option >معاون دوم</option>";
								echo "<option >راهنما</option>";
							}else if($row['applicant_type']=="معاون اول"){
								echo "<option >سرپرست</option>";
								echo "<option selected>معاون اول</option>";
								echo "<option >معاون دوم</option>";
								echo "<option >راهنما</option>";
							
							}else if($row['applicant_type']=="معاون دوم"){
								echo "<option >سرپرست</option>";
								echo "<option >معاون اول</option>";
								echo "<option selected>معاون دوم</option>";
								echo "<option >راهنما</option>";							
							}else if($row['applicant_type']=="راهنما"){
								echo "<option >سرپرست</option>";
								echo "<option >معاون اول</option>";
								echo "<option >معاون دوم</option>";
								echo "<option selected>راهنما</option>";	
							
							}else{
								echo "<option >سرپرست</option>";
								echo "<option >معاون اول</option>";
								echo "<option >معاون دوم</option>";
								echo "<option >راهنما</option>";
							}
							?>
							
							</select>
							</br></br>
							<td align="right"><img width="130" height="160" src="applicant_images/<?php echo $_GET['appid'];?>.jpg?<?php echo time();?>"/></br><input type="file" size="8" name="app_photo"  id="app_photo" /></td>
						</br></br>
						</div>
						<input type="submit" class="submit"  style="margin-right:80px" id="editapplicant" name="editapplicant" value="ذخیره نمودن تغییرات" id="linkdatabutton"/>
						<input type="submit" class="submit"  id="cancel" name="cancel" value="انصراف" id="linkdatabutton"/>
				</br></br></br></br>
				<div id="addlinkdata">
				<?php
				if(isset($_POST['editapplicant'])){
						$filename=$_FILES['app_photo']['name'];
						 $file_ext = substr($filename, strripos($filename, '.'));
						/* if($file_ext!="jpg" || $file_ext!=".JPG"){
							echo "<div align='center' style='color:red'>پسوند عکس آپلود شده باید فقط jpg باشد!</div>";
						 }else{
						 */
						 mysql_query("start transaction;");
						 $file_ext=".jpg";
						$passno=$row['passport_no'];
						$issueplace=$row['pass_issue_place'];
						$validate=$row['pass_validation_date'];
						$passissuedate=$row['pass_issue_date'];
						$phone=$_POST['app_phone'];
						$rspassno=true;
						 if($_POST['app_passno']=='new'){
							$passno=$_POST['app_new_passno'];
							$issueplace=$_POST['app_pass_issue_place'];
							$passissuedate=$_POST['app_passissuedate'];
							$validate=$_POST['app_valid_date'];
							$applicantparent="";
							$rspassno=true;
						 }else if($_POST['app_passno']!="" && $_POST['app_passno']!="new"){
							$sql="select passport_no from applicants where id='$_POST[app_passno]'";
							$rspassno=mysql_query($sql) or die (mysql_error());
							$rwpassno=mysql_fetch_array($rspassno);
							
							$passno="همراه (".$rwpassno['passport_no'].")";
							$issueplace="همراه ";
							$validate="همراه";
							$applicantparent=$_POST['app_passno'];
						 }else{
							$applicantparent=$row['applicant_parent'];
						 }
						$sql="Update  applicants set name='$_POST[app_name]', f_name='$_POST[app_fname]', father_name='$_POST[app_fathername]', job='$_POST[app_job]'
						, passport_no='$passno', birth_date='$_POST[app_birth]', birth_place='$_POST[app_birthplace]', pass_issue_date='$passissuedate'
						, pass_issue_place='$issueplace', pass_validation_date='$validate', applicant_type='$_POST[app_position]', phone_num='$phone'
						, applicant_parent='$applicantparent', kafil_id='$_POST[newkafil]', kafil_relation='$_POST[relationshipkafil]' where id='$row[id]'";
						$updatequery=mysql_query($sql) or die(mysql_error());
						
						//Checking if the queries are done or not
						if($rspassno && $updatequery){
							mysql_query('commit;');
						}else{
							mysql_query('rollback;');
						}
						 $filename =$_GET['appid'].$file_ext;
						  $destination = "applicant_images/".$filename;
						  $temp_file = $_FILES['app_photo']['tmp_name'];
						  move_uploaded_file($temp_file,$destination);
						  
							//Resizing Image
					   $image = new SimpleImage();
					   $image->load($destination);
					   $image->resize(75,90);
					   $image->save($destination);
						  
						header("location:karvan_applicants.php?kid=$_GET[kid]&ref=1");
						 die();
				}
				if(isset($_POST['cancel'])){
						 header("location:karvan_applicants.php?kid=$_GET[kid]");
						 die();
				}
				?>
			    </div>

 		</fieldset>
			
		</form>
		</div>
		
</div><!-- end container -->
<?php
include("template_footer.php");
?>
</body>
</html>
