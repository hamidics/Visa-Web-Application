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
		<form action="karvans.php" method="post" accept-charset="utf-8" id="myform"  class="formular">
			<fieldset>
				<legend align="right"><span >فرم درخواست روادید</span></legend>
			<div id="tabs" align="right" style='font-family:tahoma' >
	
				<ul>
					<li><a href="#tabs-1"> تعریف کاروان جدید و مشخص کردن اعضای کاروان</a></li>
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
						مربوط به مسجد:</br></br>
						<select name='mosquename' id='mosquename' class='validate[required]'  size="5" style="width:400px">
						<option value="">انتخاب مسجد مربوطه</option>
						<?php
						$sql="select id,name,code from mosques order by id desc";
						$res=mysql_query($sql) or die(mysql_error());
						while($row=mysql_fetch_array($res)){
						echo "<option value='$row[id]'>$row[name] ($row[code])</option>";
						}
						?>
						</select></br></br>
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
						تاریخ مراجعه کاروان:</br>
						<input type="text" name="created_at" id="created_at"  class="validate[required]" size="30"/><input type="button" style="background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px " onclick="displayDatePicker('created_at', this);"/>
						</br></br>
						
						<input type="submit" class="submit"  id="insertkarvan" name="insertkarvan" value="ذخیره" id="linkdatabutton"/>
						<input type="button" id="cancel_cash" onclick="window.open ('karvans.php','_parent')" name="cancel" value="انصراف"/></td>
					</div>
					<?php
					}
					?>
						</br>
					<!--
					جستجو متنی مراکز کاروان:
					<input type="text" id="searchdata"  name="searchdata"/>
					<input type="submit" class="submit"  name="searchkarvan" value="نمایش کاروانها" />
					-->
					
					<select name="viewkarvantype" id="viewkarvantype">
						<?php
						if($_SESSION['user_type']=="admin"){echo "<option value='%'>همه کاروان ها</option>";}
						if($_SESSION['user_type']=="admin" || $_SESSION['p1']==1){echo "<option value='1'>کاروان های جدید</option>";}
						if($_SESSION['user_type']=="admin" || $_SESSION['p2']==1){echo "<option value='2'>کاروان های مصاحبه شده</option>";}
						if($_SESSION['user_type']=="admin" || $_SESSION['p3']==1){echo "<option value='3'> کاروان های اعزام شده</option>";}
						if($_SESSION['user_type']=="admin" || $_SESSION['p4']==1){echo "<option value='4' >کاروان های بازگشتی</option>";}
						?>
					</select>
					
					<input type="submit" class="submit"  name="viewallkarvans" value="نمایش کاروان ها" />
					</br>
					<div align="center" style='font-size:13px'>
					<?php 
						
							$searchval=$_POST['viewkarvantype'];
							if($searchval=="%"){
								echo "<b align='center' style='color:orange' >همه کاروان های فعال</b>";
							}
							if($searchval==1){
								echo "<b align='center'  style='color:orange' >کاروان های جدید</b>";
							}
							if($searchval==2){
								echo "<b align='center'  style='color:orange' >کاروان های مصاحبه شده</b>";
							}
							if($searchval==3){
								echo "<b align='center'  style='color:orange' >کاروان های اعزام شده</b>";
							}
							if($searchval==4){
								echo "<b align='center'  style='color:orange' >کاروان های بازگشتی</b>";
							}
						
					
					?>
					</br>
					</div>
					<?php

						$q="select code from karvan  order by id desc LIMIT 1 ";
						$res=mysql_query($q) or die(mysql_error());
						$r=mysql_fetch_array($res);
						if($r){
						$c=$r['code'];
						$c++;

							$code=$c;
						}else{
							$code="K-000001";
						}

					
					if(isset($_POST['insertkarvan'])){
						//$user=$_SESSION['user_name'];
						$sql="Insert into karvan (code, created_by, recipe_date, mosque_id, status) values ('$code', '$_POST[user]', '$_POST[created_at]', '$_POST[mosquename]','new')";
						mysql_query($sql) or die(mysql_error());
						header("location:karvans.php");
						}
					if(isset($_GET['delkarvan'])){
						$sql="Delete from karvan where id='$_GET[delkarvan]'";
						mysql_query($sql) or die (mysql_error());
						header("location:karvans.php");
					}
					?>
				<br />
				<br/>
				<table width="100%" id="table">
				<tr>
				<th>شماره</th>
				<th>کد کاروان</th>
				<th>توسط</th>
				<th>کد رهگیری</th>
				<th>تاریخ مراجعه</th>
				<th>عملیات</th>
				</tr>
				<?php
				if(isset($_POST['viewallkarvans'])){
				$i=1;
				$querycont="";
				if($_SESSION['user_type']=="admin"){
						$adminquery="";
					}else{
						$adminquery="and `karvan`.created_by='$_SESSION[user_id]'";
					}
				if($_POST['viewkarvantype']=="%" ){
					$querycont="and   `karvan`.status='new' and (report='0000-00-00' || report='')";
				$sql="select `mosques`.rahgiri_code, `karvan`.id as id, `karvan`.code, `karvan`.created_by,  `karvan`.mosque_id, recipe_date  from mosques, karvan where  `karvan`.mosque_id=`mosques`.id $querycont order by id desc";

				}
				if( $_POST['viewkarvantype']==1){
					
					$querycont=" $adminquery and `karvan`.status='new' and (laboratory='0000-00-00' || laboratory='') and monifest='' and visa_price='' ";
					
				$sql="select `mosques`.rahgiri_code, `karvan`.id as id, `karvan`.code, `karvan`.created_by,  `karvan`.mosque_id, recipe_date  from mosques, karvan where  `karvan`.mosque_id=`mosques`.id $querycont order by id desc";

				}
				if( $_POST['viewkarvantype']==2){
				
					//$querycont="and  (laboratory='0000-00-00' || laboratory='') and created_by='$_SESSION[user_id]'";
					$querycont.="  $adminquery  and  (warranty!='0000-00-00' and warranty!='') and (interview!='0000-00-00' and interview!='') and (border='' || border='0000-00-00')   and   status='new'";
				$sql="select `mosques`.rahgiri_code, `karvan`.id as id, `karvan`.code, `karvan`.created_by,  `karvan`.mosque_id, recipe_date  from mosques, karvan where  `karvan`.mosque_id=`mosques`.id $querycont order by id desc";

				}
				if( $_POST['viewkarvantype']==3){
					
					$querycont.="  $adminquery  and   destination!='' and send_number!='' and  (back='0000-00-00' || back='') and (report='0000-00-00' || report='') and `karvan`.status='new' ";
				$sql="select `mosques`.rahgiri_code, `karvan`.id as id, `karvan`.code, `karvan`.created_by,  `karvan`.mosque_id, recipe_date  from mosques, karvan where  `karvan`.mosque_id=`mosques`.id $querycont order by id desc";

				} 
				if($_POST['viewkarvantype']==4){
				
					$querycont.=" $adminquery and (other!='' and other!='0000-00-00') and (out_place!='' and out_place!='0000-00-00')  and (report='' || report='0000-00-00') and (`karvan`.status='sent'  || `karvan`.status='new') ";
				$sql="select `mosques`.rahgiri_code, `karvan`.id as id, `karvan`.code, `karvan`.created_by,  `karvan`.mosque_id, recipe_date  from mosques, karvan where  `karvan`.mosque_id=`mosques`.id $querycont order by id desc";

				}
				
				$res=mysql_query($sql) or die(mysql_error());
				while($row=mysql_fetch_array($res)){
					$sql="select count(id) from karvan_applicants_getinfo where karvan_id='$row[id]'";
					$rs=mysql_query($sql) or die (mysql_error());
					$rw=mysql_fetch_array($rs);
					$delimg="<img src='img/cancel1.png'/>";
					if($rw['count(id)']==0 and $_SESSION['user_type']=="admin"){
						$delimg="<a href='karvans.php?delkarvan=$row[id]' class='confirm'><img style='cursor:pointer;' src='img/cancel.png'   /></a>";
					}
					
					$sql="select name from users where id='$row[created_by]'";
					$rsuser=mysql_query($sql) or die (mysql_error());
					$rwuser=mysql_fetch_array($rsuser);
					echo "
					<tr align='center'>
					<td>$i</td>
					<td>$row[code]</td>
					<td>$rwuser[name]</td>
					<td> $row[rahgiri_code]</td>
					<td>$row[recipe_date]</td>
					<td><a style='color:blue' href='karvan_applicants.php?kid=$row[id]'>تعیین اعضای کاروان و زمانبندی اقدامات اجرائی کاروان</a>  $delimg";
					if($_SESSION['user_type']=="admin"){
					echo"
					<img src='img/edit.png' style='cursor:pointer' onclick='editkarvan(".$row['id'].")'/>
					";
					}
					echo"
					</td>
					</tr>
					<tr><td colspan='6' id='editkarvan".$row['id']."'></td></tr>";
					$i++;
				}
				}
				?>
				</table>
			    </div>
				 </div>
 		</fieldset>
		<?php
			if(isset($_POST['acceptedit'])){
			$sql="Update karvan set  recipe_date='$_POST[recipedate]', created_by='$_POST[nuser]', mosque_id='$_POST[nmosque]' where id='$_POST[karvan_id]'";
			mysql_query($sql) or die (mysql_error());
			header("location:karvans.php");
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
