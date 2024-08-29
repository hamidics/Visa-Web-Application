<?php
include("template_header.php");
require_once("../library/image_resize.php");
$viewid=$_GET['kid'];

?>

<script language="javascript" type='text/javascript'>

function addapplicantaddres(appid,karvanid)
{
var divid='address'+appid;

	if (appid=='')
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
			 
				xmlhttp.open('GET','karvan_applicants_addressajax.php?applicantid='+appid+'&karvanid='+karvanid+'&type=1',true);
				xmlhttp.send();
					
}

function sendtoblacklist(appid,kid)
{
var divid='address'+appid;

	if (appid=='')
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
			 
				xmlhttp.open('GET','karvan_applicants_blacklistajax.php?applicantid='+appid+'&karvanid='+kid,true);
				xmlhttp.send();
				
				
}

function viewapplicantaddres(appid,karvanid)
{
var divid='address'+appid;

	if (appid=='')
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
			 
				xmlhttp.open('GET','karvan_applicants_addressajax.php?applicantid='+appid+'&karvanid='+karvanid+'&type=2',true);
				xmlhttp.send();
				
				
}
function showinfo(applicantinfo,karvanid)
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
			 
				xmlhttp.open('GET','karvan_applicants_getinfo.php?type='+applicantinfo+'&karvanid='+karvanid,true);
				xmlhttp.send();
				
				
}
function searchnames(applicantname)
{
var divid='findname';

	if (applicantname=='')
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
			 
				xmlhttp.open('GET','karvan_applicants_getnames.php?appname='+applicantname,true);
				xmlhttp.send();
				
				
}
function disable(id){
if(document.getElementById(id).ischecked()==true){
document.getElementById('app_fname').disabled=true;
document.getElementById('app_fathername').disabled=true;
document.getElementById('app_job').disabled=true;
document.getElementById('app_birth').disabled=true;
document.getElementById('app_birthplace').disabled=true;
document.getElementById('app_photoapp_photo').disabled=true;

}else{
document.getElementById('app_fname').disabled=false;
document.getElementById('app_fathername').disabled=false;
document.getElementById('app_job').disabled=false;
document.getElementById('app_birth').disabled=false;
document.getElementById('app_birthplace').disabled=false;
document.getElementById('app_photoapp_photo').disabled=false;

}
}

function checkkafil(val){
	if(val=="none"){
		document.getElementById('checkkafildiv').style.visibility="hidden";
	}else{
		document.getElementById('checkkafildiv').style.visibility="visible";
	}

}

function checketebar(etebardate)
{
var divid='checketebardiv';

	if (etebardate=='')
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
			 
				xmlhttp.open('GET','karvan_applicants_checketebar.php?etebardate='+etebardate,true);
				xmlhttp.send();
				
				
}
</script>

	    <div id="content" >
	    <div id="top_menu" class="clearfix">
		<ul class="sf-menu"> <!-- DROPDOWN MENU -->
			<li class="current">
	
				<a href="homepage.php">صفحه اصلی</a><!-- First level MENU -->
			</li>
			<li>
				<a href="karvans.php">صفحه قبل</a>
			</li>
		</ul>
					</div>
		<div id="content_main" class="clearfix" >
		<div align="right" dir="rtl">
		<?php echo "<form action='karvan_applicants.php?kid=$viewid' method='post' accept-charset='utf-8' id='myform' class='formular' enctype='multipart/form-data' >";?>
		<?php
			$sql="select code,mosque_id from karvan where id='$viewid'";
			$res=mysql_query($sql) or die(mysql_error());
			$ro=mysql_fetch_array($res);
			$sql="select id,name from mosques where id='$ro[mosque_id]'";
			$res=mysql_query($sql) or die(mysql_error());
			$roo=mysql_fetch_array($res);
			$sql="select applicant_id from karvan_applicants_getinfo where karvan_id='$viewid'";
			$res=mysql_query($sql) or die (mysql_error());
			$responsibleid="";
			$responsiblename="";
			$responsiblephone="";
			while($row=mysql_fetch_array($res)){
			$sql="select id,name,phone_num,applicant_type from applicants where id='$row[applicant_id]'";
			$res2=mysql_query($sql) or die(mysql_error());
			$row2=mysql_fetch_array($res2);
			if($row2['applicant_type']=="سرپرست"){
				$responsibleid=$row2['id'];
				$responsiblename=$row2['name'];
				$responsiblephone=$row2['phone_num'];
				break;
			}
			
			}
			$sql="select count(applicant_id) from karvan_applicants_getinfo where karvan_id='$viewid'";
			$rscount=mysql_query($sql) or die (mysql_error());
			$rwcount=mysql_fetch_array($rscount);
			
			if($responsibleid!=""){
			echo "<span><img style='height:75px; width:60px;' src='applicant_images/$responsibleid".".jpg"."?".time()."'/>
			سرپرست کاروان: $responsiblename>>>شماره تماس سرپرست:$responsiblephone</span>";
			}else{
			echo "<div style='color:red' >سرپرست کاروان تعیین نشده است!</div>";
			}
		?>
			<fieldset>
				<legend align="right"><span dir="rtl">کاروان <?php echo $roo['name'];?>>>>>>کد کاروان:<?php echo $ro['code'];?></span></legend>
			<div id="tabs" align="right" style='font-family:tahoma;' >
	
				<ul>
					<li><a href="#tabs-1"> بخش اعضای کاروان</a></li>
					<li><a href="#tabs-2">زمانبندی اقدامات اجرایی کاروان های اعزامی به مشهد مقدس</a></li>
					
				</ul>
				<div id="tabs-1">
				
				<br />
				<?php 
					if($rwcount['count(applicant_id)']<42){
				?>
						<a href="#" id="addlink" onclick="jQuery('#myform').validationEngine('hide')"><b>اضافه نمودن عضو جدید</b></a>
						<a href="#" id="addlinkback" onclick="jQuery('#myform').validationEngine('hide')"><b>اضافه نمودن عضو جدید</b></a>
						<input type="button" style=" width:20px; background-color:white; border:0;background-image:url(img/back.png)" /></br>
						<hr align="right"style=" width:150px"/>

				<?php
				}
				?>
						</br>

						</br>
						<div id="addlinkdata" >
						<table width="80%">
						<tr align="right">
							<td width="20%"> نام:</td>
							<td align="right" ><input type="text" size="30" name="app_name" onkeyup="searchnames(this.value)" class="validate[required]" id="app_name" />
							</td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> نام خانوادگی:</td>
							<td><input type="text" size="30" name="app_fname"  id="app_fname" /></td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> نام کفیل:</td>
							<td>
							<select name="kafilname" id="kafilname" onchange="checkkafil(this.value)">
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
									if($total>=5){
										echo "<option style='background-color:red;color:white' value='none'>$rwkafil[name] ($rwkafil[father_name])</option>";
									}else{
										echo "<option  value='$rwkafil[id]'>$rwkafil[name] ($rwkafil[father_name])</option>";
									}
								}
							?>
							</select>
							<input type="text" placeholder="نسبت شخص با کفیل" name="relationship" id="relationship"/>
							</td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						
						<tr align="right">
							<td> نام پدر:</td>
							<td><input type="text" size="30" name="app_fathername" class="validate[required]" id="app_fathername" /></td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> شغل:</td>
							<td><input type="text" size="30" name="app_job"  id="app_job" /></td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> شماره پاسپورت:</td>
							<td><?php echo "<select name='app_passno' size='4' class='validate[required]' id='app_passno' style='width:182px' onchange='showinfo(this.value,$viewid)' >";?>
							<option value="">انتخاب شماره پاسپورت</option>
							<option value="new">شماره پاسپورت جدید</option>
							<?php
							$sql="select karvan_applicants_getinfo.applicant_id as applicant_id,applicants.passport_no as passport_no,applicants.name as name from  karvan_applicants_getinfo,applicants where karvan_applicants_getinfo.karvan_id='$viewid' and applicants.id=karvan_applicants_getinfo.applicant_id and applicants.applicant_parent='' and applicants.pass_issue_date!='0000-00-00' and pass_issue_place!='همراه'";
							$res=mysql_query($sql) or die(mysql_query($sql));
							while($row=mysql_fetch_array($res)){
						
								echo "<option value='$row[applicant_id]'>$row[name] ($row[passport_no])</option>";
							}
							?>
							</select>
							</td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr><td colspan='2' id='appinfo'></td></tr>
						</table>
						<table width="50%" >
						<tr align="right">
							<td> شماره تماس:</td>
							<td><input type="text" size="30" name="app_phone" class="validate[required]" id="app_phone" /></td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> تاریخ تولد:</td>
							<td>
							<input type="text" name="app_birth" size='30' id="app_birth"  class="validate[required]" size="25"/>
							</td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> محل تولد:</td>
							<td>
							<input type="text" name="app_birthplace" size="30" class="validate[required]" id="app_birthplace"/>
							</td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> عنوان:</td>
							<td>
							<select name="app_position"  id="app_position"  style="width:182px">
							<option value="">عادی</option>
							<?php
								if($responsibleid==""){
									echo "<option>سرپرست</option>";
								}
							?>
							<option>معاون اول</option>
							<option>معاون دوم</option>
							<option>راهنما</option>
							</select>
							</td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						<tr align="right">
							<td> عکس درخواست کننده:</td>
							<td><input type="file" size="30" name="app_photo"  id="app_photo" /></td>
						</tr>
						<tr><td colspan='2'><br/></td></tr>
						
						</table>
						
							<div >
							</div>
						<span id="checkkafildiv">
						<span id="checketebardiv">
						<input type="submit" class="submit"  name="insertapplicant" value="ذخیره" id="linkdatabutton"/>
						</span>
						</span>
						<?php echo " <input type='button' id='cancel_cash' onclick='window.open (\"karvan_applicants.php?kid=$viewid\",\"_parent\")' name='cancel' value='انصراف'/></td>";?>
						
					</div></br></br>
					<b><a href='karvan_applicants_excel.php?karvanid=<?php echo $viewid;?>' style="color:blue;font-size:13px">چاپ لیست خلاصه کاروان</a></b><br/>
					<br><input type="submit" name="viewall" value="برای نمایش همه لیست کلیک کنید"/>
					<?php
					if(isset($_POST['insertapplicant'])){
						 $filename=$_FILES['app_photo']['name'];
						 $file_ext = substr($filename, strripos($filename, '.'));
						
						 $file_ext=".jpg";
						 mysql_query("start transaction;") ;
							$phone=$_POST['app_phone'];
						 if($_POST['app_passno']=='new'){
							$passno=$_POST['app_new_passno'];
							$issueplace=$_POST['app_pass_issue_place'];
							$validate=$_POST['app_valid_date'];
							$applicantparent="";
							$rspassno=true;
						 }else{

							$sql="select passport_no from applicants where id='$_POST[app_passno]'";
							$rspassno=mysql_query($sql) or die (mysql_error());
							$rwpassno=mysql_fetch_array($rspassno);
							$passno="همراه (".$rwpassno['passport_no'].")";
							$issueplace="همراه ";
							$validate="همراه";
							$applicantparent=$_POST['app_passno'];
						 }
						$sql="Insert into applicants (name, f_name, father_name, job, passport_no, birth_date, birth_place, pass_issue_date, pass_issue_place, pass_validation_date, applicant_type, phone_num, applicant_parent, kafil_id, kafil_relation) values ('$_POST[app_name]',
						'$_POST[app_fname]', '$_POST[app_fathername]', '$_POST[app_job]', '$passno', '$_POST[app_birth]', '$_POST[app_birthplace]', '$_POST[app_passissuedate]', '$issueplace', '$validate', '$_POST[app_position]', '$phone', '$applicantparent', '$_POST[kafilname]', '$_POST[relationship]')";
						$insertres=mysql_query($sql) or die(mysql_error());
						$sql="select id from applicants order by id desc LIMIT 1";
						$res=mysql_query($sql) or die(mysql_error());
						$row=mysql_fetch_array($res); 
						$sql="Insert into karvan_applicants_getinfo (applicant_id, karvan_id) values('$row[id]', '$viewid')";
						$res1=mysql_query($sql) ;
						//Checking if all transactions are done or not
						if($rspassno && $insertres && $res && $res1){
							mysql_query('commit;');
						}else{
							mysql_query('rollback;');
						}						
						  $newfilename =$row['id'].$file_ext;
						  $destination = "applicant_images/".$newfilename;
						  $temp_file = $_FILES['app_photo']['tmp_name'];
						  move_uploaded_file($temp_file,$destination);
							//Resizing Image
					   $image = new SimpleImage();
					   $image->load($destination);
					   $image->resize(75,90);

					   $image->save($destination);
						header("location:karvan_applicants.php?kid=$viewid");
						die();
						//}
						}
					?>
				<br />
				<br/>
				<table width="100%" id="table">
				<tr>
				<th>شماره</th>
				<th>نام</th>
				<th>نام پدر</th>
				<th>شماره پاس</th>
				<th>صادره پاس</th>
				<th>اعتبار</th>
				<th>عنوان</th>
				<th>شماره تماس</th>
				<th>آدرس ایران</th>
				<th>عکس</th>
				<th>عملیات</th>
				</tr>
				<?php
				if(isset($_POST['viewall'])){
				$i=1;
				$sql="select applicant_id,last_address_id,karvan_id from karvan_applicants_getinfo where karvan_id='$_GET[kid]'";
				$res=mysql_query($sql) or die(mysql_error());
				while($row=mysql_fetch_array($res)){
				$sql="select * from applicants where id='$row[applicant_id]'";
				$rs=mysql_query($sql) or die(mysql_error());
				$ro=mysql_fetch_array($rs);
					$query="select count(id) from  applicant_foreign_address where id='$row[last_address_id]'";
					$resquery=mysql_query($query) or die(mysql_error());
					$rowquery=mysql_fetch_array($resquery);
					//Counting num of dependants
					$query="select count(id) from applicants where applicant_parent='$ro[id]'";
					$rscountdep=mysql_query($query) or die (mysql_error());
					$rwcountdep=mysql_fetch_array($rscountdep);
					echo "
					<tr align='center'>
					<td>$i</td>
					<td>$ro[name]</td>
					<td> $ro[father_name]</td>
					<td>$ro[passport_no]</td>
					<td> $ro[pass_issue_place]</td>
					<td>$ro[pass_validation_date]</td>
					<td> $ro[applicant_type]</td>
					<td>$ro[phone_num]</td>";
					
					if($rowquery['count(id)']==1 &&   $ro['pass_issue_place']!='همراه '){
						echo "<td><a href='#' onclick='viewapplicantaddres($ro[id],$row[karvan_id])'>نمایش آدرس </a></td>";
					}else if($rowquery['count(id)']==0  &&  $ro['pass_issue_place']!='همراه '){
						echo "<td><img src='img/address.png' style='cursor:pointer' onclick='addapplicantaddres($ro[id],$row[karvan_id])'/></td>";
					}else {
						echo "<td>همراه</td>";
					}
					echo"
					<td><img style='width:30px;height:30px' src='applicant_images/".$ro['id'].".jpg?".time()."'/></td>";
					$countdependant=$rwcountdep['count(id)'];
	
					if($countdependant==0){
					echo"<td><a href='karvan_applicants.php?delid=$ro[id]&kid=$row[karvan_id]' class='confirm'><img src='img/cancel.png' title='پاک کردن درخواست کننده'/></a>";
					}else{
						echo "<td><img src='img/cancel1.png'/>";
					}
					echo "<a href='karvan_applicants.php?editid=$ro[id]&kid=$row[karvan_id]'><img src='img/edit.png' title='ویرایش درخواست کننده'/></a>
					<img src='img/move.png' style='cursor:pointer; height:15px; width:15px' onclick='sendtoblacklist(\"$ro[id]\",\"$row[karvan_id]\")' title='ارسال به سوابق ویزا' />
					</tr>
					<tr>
					<td colspan='11' id='address$ro[id]'></td>
					</tr>";
					$i++;
				
				}
				}
				?>
				<?php
				if(isset($_POST['insertaddress'])){
				mysql_query("start transaction;") ;
				
				$sql="INSERT INTO applicant_foreign_address (name, father_name, mobile, home_phone, id_card, home_address, relation, applicant_id) VALUES
				 ('$_POST[add_name]','$_POST[add_fname]','$_POST[add_mobile]','$_POST[add_phone]','$_POST[add_idnum]','$_POST[add_address]','$_POST[add_relation]','$_POST[app_id]')";
				$rsaddress= mysql_query($sql) or die(mysql_error());
				 $sql="select id from applicant_foreign_address order by id desc LIMIT 1";
				 $res=mysql_query($sql) or die(mysql_error());
				 $row=mysql_fetch_array($res);
				 $sql="Update karvan_applicants_getinfo set last_address_id='$row[id]' where karvan_id='$_GET[kid]' and applicant_id='$_POST[app_id]'";
				$resupdate=mysql_query($sql) or die(mysql_error());
				
				$sql="select id from karvan_applicants_getinfo where karvan_id='$_GET[kid]' and applicant_id='$_POST[app_id]'";
				$res1=mysql_query($sql) or die(mysql_error());
				$row=mysql_fetch_array($res1);
				$resarr=array();
				for($i=0;$i<sizeof($_POST['add']);$i++){
					if($_POST['add'][$i]!=""){
					$sql="insert into applicant_foreign_address (name,home_address,parentid) values('$i','".$_POST['add'][0]."','$row[id]')";
					$resarr[$i]= mysql_query($sql) or die(mysql_error());
					
					}
				}
				for($i=0;$i<sizeof($resarr);$i++){
					if($resarr[$i] && $res && $res1 && $resupdate){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
				}
				header("location:karvan_applicants.php?kid=$_GET[kid]");
				die();
				}
				if(isset($_POST['updateadd'])){
					mysql_query("start transaction;") ;
					$sql="update applicant_foreign_address set name='$_POST[add_name]',father_name='$_POST[add_fname]',mobile='$_POST[add_mobile]'
					,home_phone='$_POST[add_phone]',id_card='$_POST[add_idnum]',home_address='$_POST[add_address]'
					,relation='$_POST[add_relation]' where applicant_id='$_POST[app_id]'";
					$updatesql=mysql_query($sql) or die(mysql_error());
					$sql="select id  from karvan_applicants_getinfo where applicant_id='$_POST[app_id]' and karvan_id='$_POST[karvan_idd]'";
					$res=mysql_query($sql) or die(mysql_error());
					$row=mysql_fetch_array($res);
					
					for($i=0;$i<sizeof($_POST['addr']);$i++){
					$sql="Update applicant_foreign_address set home_address='".$_POST['addr'][$i]."' where name='$i' and parentid='$row[id]'";
						$resarr=mysql_query($sql) or die(mysql_error());
						if($resarr ){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
					}
					if( $res && $updatesql ){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
				
					header("location:karvan_applicants.php?kid=$_GET[kid]");
					die();
				}
				if(isset($_GET['delid'])){
					mysql_query("start transaction;") ;
					//$sql="Delete from karvan_applicants_getinfo where applicant_id='$_GET[delid]' and karvan_id='$_GET[kid]'";
					//$res=mysql_query($sql) or die(mysql_error());
					$sql="delete from karvan_applicants_getinfo where applicant_id='$_GET[delid]'  and karvan_id='$_GET[kid]'";
					$res1=mysql_query($sql) or die(mysql_error());
					//Deleting the applicant
					$sql="delete from applicants where id='$_GET[delid]' ";
					$res2=mysql_query($sql) or die(mysql_error());
					//Selecting the id of childs from the database
					$sql="select id from applicants where applicant_parent='$_GET[delid]'";
					$rs=mysql_query($sql) or die (mysql_error());
					$i=0;
					while($rwdel=mysql_fetch_array($rs)){
					//Deleting karvan_applicants_getinfo
					$sql="delete from karvan_applicants_getinfo where applicant_id='$rwdel[id]'  and karvan_id='$_GET[kid]'";
					$resarr1=mysql_query($sql) or die(mysql_error());
					//Deleting childs
					if($resarr1){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
					$sql="Delete from applicants where id='$rwdel[id]'";
					$resarr2=mysql_query($sql) or die (mysql_error());
					//Deleting childs
					if($resarr2){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
					}
					if($res1 && $res2){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
					//$sql="Delete from applicants where applicant_parent='$_GET[delid]'";
					//mysql_query($sql) or die (mysql_error());
					header("location:karvan_applicants.php?kid=$_GET[kid]");
					die();
				}
				if(isset($_GET['editid'])){
				
					header("location:karvan_applicant_edit.php?appid=$_GET[editid]&kid=$_GET[kid]");
					die();
				}
				
				
				
				?>
				</table>
			    </div>
				
				<?php
				//Inserting to blacklist
				if(isset($_POST['accept'])){
				
				mysql_query("start transaction;") ;
					$sql="Delete from  karvan_applicants_getinfo where applicant_id='$_POST[appid]' and karvan_id='$_POST[karvan_id]'";
					$res=mysql_query($sql) or die(mysql_error());
					//$row=mysql_fetch_array($res);
					//$sql="delete from karvan_applicants_getinfo where applicant_id='$_POST[appid]'  and karvan_id='$_POST[karvanid]'";
					//$res2=mysql_query($sql) or die(mysql_error());
					$sql="Delete from applicants where id='$_POST[appid]'";
					$res3=mysql_query($sql) or die (mysql_error());
					$sql="Insert into blacklist (created_at, name, passport_no, details) values('$_POST[cdate]', '$_POST[appname]', '$_POST[apppass]', '$_POST[details]')";
					$res4=mysql_query($sql) or die (mysql_error());
					if($res && $res3 && $res4){
						mysql_query("commit;");
					}else{
						mysql_query("rollback;");
					}
					header("location:karvan_applicants.php?kid=$_POST[karvan_id]");
					die();
				}
				?>
					     
				<div id="tabs-2">
				<table width="100%">
					<?php
						$sql="select * from karvan where id='$viewid'";
						$res=mysql_query($sql) or die(mysql_error());
						$row=mysql_fetch_array($res);
						echo"
						<tr><td width='5%'>تکمیل سوابق:</td><td width='25%' align='right'><input type='text' name='resumed' id='resumed' value='$row[resume]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"resumed\", this);'/>
						</td>";
						if($row['resume']!="0000-00-00"){
						echo"</tr>
						<tr><td width='20%'>امنا و همراه:</td><td width='70%'><input type='text' name='omanad' id='omanad' value='$row[omana]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"omanad\", this);'/>
						</td>";
						}
						if($row['omana']!="0000-00-00"){
						echo"</tr>
						<tr><td width='20%'>تایید لیست:</td><td width='25%'><input type='text' name='list_acceptd' id='list_acceptd' value='$row[list_accept]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"list_acceptd\", this);'/>
						</td>";
						}
						
						if($row['list_accept']!="0000-00-00"){
						echo"</tr>
						<tr><td width='20%'>مصاحبه:</td><td width='25%'><input type='text' name='interviewd' id='interviewd' value='$row[interview]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"interviewd\", this);'/>
						<a href='karvanforms-scripts/interviewexcel.php?karvanid=$viewid'><input type='button' value='چاپ فرم مصاحبه'/></a> |  
						<a href='interviewlist.php?karvanid=$viewid&resid=$responsibleid&mosque=$roo[id]' target='_blank' style='color:blue'><b>چاپ لیست مصاحبه</b></a> 
						</td>";
						}
						if($row['interview']!="" and $row['interview']!="0000-00-00"){
						echo"</tr>
						<tr><td width='20%'>تاریخ ضمانت:</td><td width='25%'><input type='text' name='warrantyd' id='warrantyd' value='$row[warranty]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"warrantyd\", this);'/>
						شماره فیش:<input type='text' size='12' name='kefalatfish' id='kefalatfish' value='$row[kefalatfish]'/>
						مبلغ واریزی:<input type='text' size='12' name='kefalatamount' id='kefalatamount' value='$row[kefalatamount]'/>
						توضیح:<input type='text' size='15' name='w_details' id='w_details' value='$row[wdetails]'/></td>";
						}
						if($row['warranty']!="0000-00-00" and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
					
						echo"</tr>
						<tr><td width='20%'>آزمایشگاه (با هماهنگی ستاد) : </td><td width='25%'><input type='text' name='laboratoryd' id='laboratoryd' value='$row[laboratory]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"laboratoryd\", this);'/>
						";
						}
						
						if($row['warranty']!="0000-00-00" and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						echo "ساعت آزمایش:
						<input type='text' name='lab_time' size='15' value='$row[lab_time]' id='lab_time'/>
						<a href='karvanforms-scripts/labexcel.php?karvanid=$viewid'><input type='button' value='فرم آزمایشگاه'/></a> 
</td>";
						}
						if($row['laboratory']!="0000-00-00"  and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						echo"</tr>
						<tr><td width='20%'>مبلغ حواله، بیمه و غیره:</td><td width='25%'><input type='text' name='monifestd' id='monifestd' value='$row[monifest]' size='25'/>
						شماره فیش حواله:<input type='text' id='havalenum' name='havalenum' value='$row[havalenum]' size='20' class='validate[required]'/>
						تاریخ فیش حواله:<input type='text' name='havaledate' id='havaledate' value='$row[havaledate]' size='14'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"havaledate\", this);'/>

</td>";
						}
						if($row['monifest']!="" and $row['monifest']!="0000-00-00"  and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td width='17%'>مبلغ پرداختی برای ویزا:</td>
						<td colspan='2'><input type='text' name='visa_amount' size='30' value='$row[visa_price]' id='visa_amount' />
						<a href='karvanforms-scripts/visaformexcel.php?karvanid=$viewid'><input type='button' value='فرم ویزا'/></a>
						<a href='karvanforms-scripts/visabillexcel.php?karvanid=$viewid'><input type='button' value='فیش بانکی'/></a></td>
						";
						}

						if($row['visa_price']!="" and   $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						echo"</tr>
						<tr><td width='20%'>سرکنسولگری:</td><td width='25%'><input type='text' name='consultencyd' id='consultencyd' value='$row[consultency]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"consultencyd\", this);'/>
						  <a href='monifestlist.php?karvanid=$viewid&resid=$responsibleid&mosque=$roo[id]' target='_blank' style='color:blue'><b>چاپ کردن لیست اعضای کاروان</b></a> | 
<a href='karvan_applicants_address.php?karvanid=$viewid&resid=$responsibleid&mosque=$roo[name]' target='_blank' style='color:blue'><b>چاپ کردن آدرس اعضای کاروان</b></a></br>
						</td>";
						}
						if($row['consultency']!="0000-00-00"   and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						echo"</tr>
						<tr><td width='20%'>معرفی خودرو:</td><td width='25%'><input type='text' name='card' id='card' value='$row[car]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"card\", this);'/>
						راننده: <input type='text' name='drivername' size='10' id='drivername' value='$row[driver_name]'/> 
						مدل و پلاک: <input type='text' name='carname'  id='carname' value='$row[car_name]'/> 
						<a href='karvanforms-scripts/carexcel.php?karvanid=$viewid'><input type='button' value='فرم معرفی خودرو'/></a>
						</td>";
						}
						if($row['car']!="0000-00-00"  and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						
						echo "</tr><tr><td width='20%'>شماره اعزام:</td><td width='25%'><input type='text' name='send_date' id='send_date' value='$row[send_number]' size='30'/>
						کد ناجا:
						<input type='text' name='naja_code' size='15' value='$row[naja_code]' id='naja_code' />
						<a href='idcard_validatedays.php?karvanid=$viewid&resid=$responsibleid&mosque=$roo[name]' target='_blank' style='color:blue'><b>کارت اعضای کاروان</b></a>
						 | 	<a href='karvan_applicants_dependants.php?karvanid=$viewid&resid=$responsibleid&mosque=$roo[name]' target='_blank' style='color:blue'><b>تعداد همراهان اعضا</b></a></br>

						</td>";
						}
						
						if($row['send_number']!=""  and $_SESSION['p2']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>مقصد کاروان:</td>
						<td colspan='2'><input type='text' size='30' name='karvan_destination' value='$row[destination]' id='karvan_destination' />
						<a href='karvanforms-scripts/hamahangiexcel.php?karvanid=$viewid'><input type='button' value='چاپ فرم دفتر هماهنگی زوار اعزامی'/></a></td>";
						}
						if($row['destination']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo"</tr>
						<tr><td width='20%'>اعزام به مرز:</td><td width='25%'><input type='text' name='borderd' id='borderd' value='$row[border]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"borderd\", this);'/>
						ساعت حضور در مرز:
						<input type='text' name='border_time' value='$row[border_time]' id='border_time' />
						
						<a href='karvanforms-scripts/borderexcel.php?karvanid=$viewid'><input type='button' value='چاپ فرم امور گذرنامه مرز دوغارون'/></a>
						</td>";
						}
						
						//New Added
						
						if($row['border']!="0000-00-00"  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>بیمه:</td>
						<td colspan='2'><input type='text' name='insurance' id='insurance' value='$row[insurance]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"insurance\", this);'/>
						شماره گزارش:<input type='text' size='30' name='insurance_report' value='$row[insurance_report]' id='insurance_report' /></td>";
						}
						if($row['insurance']!="0000-00-00" and $row['insurance']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>اسکان ورودی:</td>
						<td colspan='2'><input type='text' name='enter_place' id='enter_place' value='$row[enter_place]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"enter_place\", this);'/>
						شماره گزارش:<input type='text' size='30' name='enter_place_report' value='$row[enter_place_report]' id='enter_place_report' /></td>";
						}
						if($row['enter_place']!="0000-00-00"  and $row['enter_place']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>تور1:</td>
						<td colspan='2'><input type='text' name='tour1' id='tour1' value='$row[tour1]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"tour1\", this);'/>
						شماره گزارش:<input type='text' size='30' name='tour1_report' value='$row[tour1_report]' id='tour1_report' /></td>";
						}
						if($row['tour1']!="0000-00-00" and $row['tour1']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>تور2:</td>
						<td colspan='2'><input type='text' name='tour2' id='tour2' value='$row[tour2]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"tour2\", this);'/>
						شماره گزارش:<input type='text' size='30' name='tour2_report' value='$row[tour2_report]' id='tour2_report' /></td>";
						}
						if($row['tour2']!="0000-00-00" and $row['tour2']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>جنگ:</td>
						<td colspan='2'><input type='text' name='jong' id='jong' value='$row[jong]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"jong\", this);'/>
						شماره گزارش:<input type='text' size='30' name='jong_report' value='$row[jong_report]' id='jong_report' /></td>";
						}
						if($row['jong']!="0000-00-00"  and $row['jong']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>اسکان خروجی:</td>
						<td colspan='2'><input type='text' name='out_place' id='out_place' value='$row[out_place]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"out_place\", this);'/>
						شماره گزارش:<input type='text' size='30' name='out_place_report' value='$row[out_place_report]' id='out_place_report' /></td>";
						}
						if($row['out_place']!="0000-00-00" and $row['out_place']!=""  and $_SESSION['p3']==1 || $_SESSION['user_type']=="admin"){
						echo "</tr><tr><td>سایر:</td>
						<td colspan='2'><input type='text' name='other' id='other' value='$row[other]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"other\", this);'/>
						توضیح:<input type='text' size='60' name='other_details' value='$row[other_details]' id='other_details' /></td>";
						}
						//End of new parts
						
						if($row['other']!="" and $row['other']!="0000-00-00"  and $_SESSION['p4']==1 || $_SESSION['user_type']=="admin"){
						echo"</tr>
						<tr><td width='20%'>مراجعت به مرز:</td><td width='25%'><input type='text' name='backd' id='backd' value='$row[back]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"backd\", this);'/>
						ساعت حضور در مرز:<input type='text' name='back_border_time' value='$row[backbordertime]' id='back_border_time' /><a href='karvanforms-scripts/borderexcelback.php?karvanid=$viewid'><input type='button' value='چاپ فرم امور گذرنامه مرز دوغارون'/></a></td>";

						}
						if($row['back']!="0000-00-00"  and $_SESSION['p4']==1 || $_SESSION['user_type']=="admin"){
						echo"</tr>
						<tr><td width='20%'>ارائه گزارش : </td><td width='25%'><input type='text' name='reportd' id='reportd' value='$row[report]' size='25'/>
						<input type='button' style='background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px ' onclick='displayDatePicker(\"reportd\", this);'/>
						</td>";
						}
						echo"</tr>
						";
					?>
					</table>
					<input type="submit" value="تایید تغییرات" name="acceptchange" class="submit"/>
					<?php
						if(isset($_POST['acceptchange'])){
							$st='new';
							if(($_POST['reportd']!='0000-00-00' and $_POST['reportd']!='') and $_POST['backd']!='0000-00-00' and $_POST['backd']!=''){
								$st='sent';
							}
							echo $_POST['reportd'];
							echo $st;
							$sql="Update karvan set send_number='$_POST[send_date]',naja_code='$_POST[naja_code]',resume='$_POST[resumed]',omana='$_POST[omanad]',list_accept='$_POST[list_acceptd]'
							,interview='$_POST[interviewd]',monifest='$_POST[monifestd]',lab_time='$_POST[lab_time]',border_time='$_POST[border_time]',bill='$_POST[billd]',laboratory='$_POST[laboratoryd]',warranty='$_POST[warrantyd]', wdetails='$_POST[w_details]',
							consultency='$_POST[consultencyd]',car='$_POST[card]',car_name='$_POST[carname]',driver_name='$_POST[drivername]',visa_price='$_POST[visa_amount]',destination='$_POST[karvan_destination]',border='$_POST[borderd]',back='$_POST[backd]',report='$_POST[reportd]'
							,insurance =  '$_POST[insurance]',
							backbordertime='$_POST[back_border_time]',
							insurance_report =  '$_POST[insurance_report]',
							enter_place =  '$_POST[enter_place]',
							enter_place_report =  '$_POST[enter_place_report]',
							tour1 =  '$_POST[tour1]',
							tour1_report =  '$_POST[tour1_report]',
							tour2 =  '$_POST[tour2]',
							tour2_report =  '$_POST[tour2_report]',
							jong =  '$_POST[jong]',
							jong_report =  '$_POST[jong_report]',
							out_place =  '$_POST[out_place]',
							out_place_report =  '$_POST[out_place_report]',
							other =  '$_POST[other]',
							other_details =  '$_POST[other_details]'
							,
							kefalatfish =  '$_POST[kefalatfish]',
							kefalatamount =  '$_POST[kefalatamount]',
							havalenum =  '$_POST[havalenum]',
							havaledate =  '$_POST[havaledate]'
							
							,status='$st' where id='$viewid'";
							mysql_query($sql) or die(mysql_error());
							header("location:karvan_applicants.php?kid=$viewid#tabs-2");
							die();
						}					
					?>
				</div>
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
