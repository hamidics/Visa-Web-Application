<?php
include("template_header.php");
?>
<script>
function editkarvan(karvanid)
{
var divid='editkarvan'+karvanid;
	if (karvanid=='')
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
			 
				xmlhttp.open('GET','karvan_editajax.php?karvanid='+karvanid,true);
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
		<div id="content_main" class="clearfix" >
		<div align="right" dir="rtl">
		<form action="visa_centers.php" method="post" accept-charset="utf-8" id="myform"  class="formular">
			<fieldset>
				<legend align="right"><span >مدیریت ویزاهای انفرادی</span></legend>
			<div id="tabs" align="right" style='font-family:tahoma' >
	
				<ul>
					<li><a href="#tabs-1"> تعریف کاروان ویزای انفرادی جدید</a></li>
				</ul>
				<div id="tabs-1">
				<br />
				<?php 
					if($_SESSION['user_type']=="admin"){
					?>
						<a href="#" id="addlink" onclick="jQuery('#myform').validationEngine('hide')"><b>اضافه کردن کاروان جدید</b></a>
						<a href="#" id="addlinkback" onclick="jQuery('#myform').validationEngine('hide')"><b>اضافه کردن کاروان جدید</b></a>
						<input type="button" style=" width:20px; background-color:white; border:0;background-image:url(img/back.png)" /></br>
						<hr align="right"style=" width:150px"/>
						</br>
						
						</br>
						<div id="addlinkdata">
						توضیح یا نام مرکز:</br></br>
						<input type="text" id="name" name="name" class="validate[required]"/>
						</br></br>
						کد رهگیری:</br></br>
						<input type="text" id="rahgiricode" name="rahgiricode" class="validate[required]"/>
						</br></br>
						تعداد افراد:</br></br>
						<input type="text" id="numofpersons" name="numofpersons" class="validate[required]"/>
						</br></br>
						نام کاربر مربوطه: </br></br>
						<select name='user' id='user' class='validate[required]'  size="5" style="width:180px">
						<option value="">انتخاب نام کاربر</option>
						<?php
						$sql="select id, name, user_name from users order by id desc";
						$res=mysql_query($sql) or die(mysql_error());
						while($row=mysql_fetch_array($res)){
						echo "<option value='$row[id]'>$row[name] ($row[user_name])</option>";
						}
						?>
						</select></br></br>
						تاریخ ایجاد :</br>
						<input type="text" name="created_at" id="created_at"  class="validate[required]" size="30"/><input type="button" style="background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px " onclick="displayDatePicker('created_at', this);"/>
						</br></br>
						
						<input type="submit" class="submit"  id="insertkarvan" name="insertkarvan" value="ذخیره" id="linkdatabutton"/>
						<input type="button" id="cancel_cash" onclick="window.open ('karvans.php','_parent')" name="cancel" value="انصراف"/></td>
					</div>
					<?php
					}
					?>
						</br>
				
					جستجو متنی مراکز کاروان:
					<input type="text" id="searchdata"  name="searchdata"/>
					<input type="submit" class="submit"  name="searchkarvan" value="نمایش کاروانها" />
					
					
					
					
					</br>
					<div align="center" style='font-size:13px'>
					
					</br>
					</div>
					<?php

						$q="select code from visa_karvan  order by id desc LIMIT 1 ";
						$res=mysql_query($q) or die(mysql_error());
						$r=mysql_fetch_array($res);
						if($r){
						$c=$r['code'];
						$c++;

							$code=$c;
						}else{
							$code="VK-000001";
						}

					
					if(isset($_POST['insertkarvan'])){
						//$user=$_SESSION['user_name'];
						mysql_query("start transaction;") ;
						$sql="Insert into visa_karvan (code, description, rahgiri_code, created_by, created_at, limits) values ('$code', '$_POST[name]', '$_POST[rahgiricode]', '$_POST[user]', '$_POST[created_at]','$_POST[numofpersons]')";
						$rs=mysql_query($sql) or die(mysql_error());
						if($rs){
						mysql_query('commit;');
						}else{
						mysql_query('rollback;');
						}
						header("location:visa_centers.php");
						}
					if(isset($_GET['delkarvan'])){
						mysql_query("start transaction;") ;
						$sql="Delete from visa_karvan where id='$_GET[delkarvan]' and created_by='$_SESSION[user_id]'";
						$rs=mysql_query($sql) or die (mysql_error());
						if($rs){
						mysql_query('commit;');
						}else{
						mysql_query('rollback;');
						}
						header("location:visa_centers.php");
					}
					?>
				<br />
				<br/>
				<table width="100%" id="table">
				<tr>
				<th>شماره</th>
				<th>کد کاروان</th>
				<th>توضیح</th>
				<th>توسط</th>
				<th>کد رهگیری</th>
				<th>تاریخ مراجعه</th>
				<th>محدودیت افراد</th>
				<th>ذخیره شده</th>
				<th>باقیمانده</th>
				<th>عملیات</th>
				</tr>
				<?php
				$sql="";
				$searchdata="";
				$whereclause="where ";
				if($_POST['searchdata']==""){
					$searchdata="description LIKE '%' ";
				}else{
					$searchdata="description LIKE '%$_POST[searchdata]%' ";
				}
				$whereclause.=$searchdata;
				if($_SESSION['user_type']=="admin"){
						$adminquery="";
					}else{
						$adminquery="and  created_by='$_SESSION[user_id]'";
					}
				$whereclause.=$adminquery;
				
				$sql="select *  from  visa_karvan    $whereclause order by id desc";

				
				$res=mysql_query($sql) or die(mysql_error());
				while($row=mysql_fetch_array($res)){
					$sql="select count(id) from visa_applicants where source_id='$row[id]'";
					$rs=mysql_query($sql) or die (mysql_error());
					$rw=mysql_fetch_array($rs);
					$delimg="<img src='img/cancel1.png'/>";
					if($rw['count(id)']==0 and $_SESSION['user_type']=="admin"){
						$delimg="<a href='visa_centers.php?delkarvan=$row[id]' class='confirm'><img style='cursor:pointer;' src='img/cancel.png'   /></a>";
					}
					//Counting num of remained persons
					$remained=$row['limits']-$rw['count(id)'];
					$stored=$rw['count(id)'];
					$sql="select name from users where id='$row[created_by]'";
					$rsuser=mysql_query($sql) or die (mysql_error());
					$rwuser=mysql_fetch_array($rsuser);
					echo "
					<tr align='center'>
					<td>$i</td>
					<td>$row[code]</td>
					<td>$row[description]</td>
					<td>$rwuser[name]</td>
					<td> $row[rahgiri_code]</td>
					<td>$row[created_at]</td>
					<td>$row[limits]</td>
					<td>$stored</td>
					<td>$remained</td>
					<td><a style='color:blue' href='visa_karvan_applicants.php?kid=$row[id]'>تعیین اعضاء و مدیریت</a>  $delimg";
					if($_SESSION['user_type']=="admin"){
					echo"
					<img src='img/edit.png' style='cursor:pointer' onclick='editkarvan(".$row['id'].")'/>
					";
					}
					echo"
					</td>
					</tr>
					<tr><td colspan='10' id='editkarvan".$row['id']."'></td></tr>";
					$i++;
				}
				
				?>
				</table>
			    </div>
				 </div>
 		</fieldset>
		<?php
			if(isset($_POST['acceptedit'])){
			mysql_query("start transaction;") ;
			$sql="Update karvan_visa set  description='$_POST[editname]', rahgiri_code='$_POST[nrahgiri]', limit='$_POST[nlimit]', created_by='$_POST[nuser]', created_at='$_POST[ncreatedat]' where id='$_POST[karvan_id]'";
			$rs=mysql_query($sql) or die (mysql_error());
			if($rs){
						mysql_query('commit;');
						}else{
						mysql_query('rollback;');
						}
			header("location:visa_centers.php");
			die();
			}

		?>	
		</form>
		</div>
		
</div><!-- end container -->
<?php
include("template_footer.php");
?>
</body>
</html>
