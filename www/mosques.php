<?php
include("template_header.php");
?>
<script>
function editmosque(mosqueid)
{
var divid='edit'+mosqueid;
	if (mosqueid=='')
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
			 
				xmlhttp.open('GET','mosque_editajax.php?mid='+mosqueid,true);
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
		<form action="mosques.php" method="post" accept-charset="utf-8" id="myform"  class="formular">
			<fieldset>
				<legend align="right"><span >مدیریت مراکز کاروان ها</span></legend>

				<a href="#" id="addlink" onclick="jQuery('#myform').validationEngine('hide')"><b>اضافه کردن مرکز جدید</b></a>
				<a href="#" id="addlinkback" onclick="jQuery('#myform').validationEngine('hide')"><b>اضافه کردن مرکز جدید</b></a>
				<input type="button" style=" width:20px; background-color:white; border:0;background-image:url(img/back.png)" /></br>
				<hr align="right"style=" width:150px"/>
				</br>

				</br>
				<div id="addlinkdata">
				<?php
			//Getting the code number for the new product
				$q="select code from mosques order by id desc LIMIT 1";
				$res=mysql_query($q) or die(mysql_error());
				$r=mysql_fetch_array($res);
				if($r){
					$last_code_num=$r['code'];
					$last_code_num++;
					$code=$last_code_num;
				}else{
					$code="CM-0000001";
				}
				?>
				<table width="100%" >
				<tr >
					<th height="40px" width="10%">کد</th>
					<th>نام مرکز</th>
					<th>مسئول مرکز </th>
					<th>آدرس مرکز</th>
					<th width="15%">تاریخ</th>
					<th>کد رهگیری</th>
					<th>مرکز اعزام</th>
					
				</tr>
				<tr>
					<td align="center"><?php echo $code;?></td>
					<td >
						<input type="text" id="name" class="validate[required] text-input" size="15" name="name"/>
					</td>
					<td >
						<input type="text" id="responsible" class="validate[required] text-input" size="10" name="responsible"/>
					</td>
					<td >
						<input type="text" id="address" class="validate[required] text-input" size="15" name="address"/>
					</td>
					<td>
						<input type="text" name="created_at" id="created_at"  class="validate[required]" size="10"/><input type="button" style="background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px " onclick="displayDatePicker('created_at', this);"/>
						
					</td>
					<td>
					<input type="text" id="secretcode" name="secretcode" size="15" class="validate[required]"/>
					</td>
					<td>
						<input type="text" id="sendcenter" name="sendcenter" size="25" class="validate[required]"/>
						
					</td>
					
				</tr>
				<tr><td colspan="7" align="center">
				<input type="submit" class="submit"  name="insertnew" value="ذخیره کردن" id="linkdatabutton"/>
						<input type="button" onclick="window.open ('mosques.php','_parent')" name="cancel" value="انصراف" id="linkdatabutton1"/>
				</td></tr>
				<?php
				    if(isset($_POST['insertnew'])){
					    $sql="Insert into  mosques(code, name, address, responsible, send_center, rahgiri_code, created_at) values('$code', '$_POST[name]', '$_POST[address]', '$_POST[responsible]', '$_POST[sendcenter]', '$_POST[secretcode]', '$_POST[created_at]')";
				        mysql_query($sql) or die(mysql_error());
				        header("location: mosques.php");
						die();
					}
				?>
				</table>
				<br/><br/>
				</div>
				
				جستجو متنی مراکز کاروان:
				<input type="text" id="searchdata"  name="searchdata"/>
				<input type="submit" class="submit"  name="searchmosque" value="نمایش مراکز کاروان" />
				<input type="submit" class="submit"  name="viewallmosques" value="نمایش همه مراکز کاروانها" />
				</br>
				<?php 
					
						$searchval=$_POST['searchdata'];
						if($searchval==""){
							$searchval="%";
						}
					
				
				?>
				<br />
				<table width="100%" id="table">
					<tr align="center">
						<th width="10%">کد مرکز</th>
						<th width="17%"> نام مرکز</th>
						<th width="17%">آدرس مرکز</th>
						<th width="10%">تاریخ ایجاد</th>
						<th width="15%">مسئول مرکز</th>
						<th width="15%">کد رهگیری</th>
						<th width="15%">مرکز اعزام</th>
						<th>عملیات</th>
					</tr>
				<?php
				if(isset($_POST['viewallmosques']) || $_POST['searchmosque']){
					$sql="select * from mosques where name LIKE '%$searchval%' order by id desc";
					$res=mysql_query($sql) or die(mysql_error());
					while($row=mysql_fetch_array($res)){
					echo "<tr align='center'>
					<td>$row[code]</td>
					<td>$row[name]</td>
					<td>$row[address]</td>
					<td>$row[created_at]</td>
					<td>$row[responsible]</td>
					<td>$row[rahgiri_code]</td>
					<td>$row[send_center]</td>
					";
					$sq="select count(id) from karvan where mosque_id='$row[id]'";
					$rs=mysql_query($sq) or die (mysql_error());
					$rw=mysql_fetch_array($rs);
					if($rw['count(id)']==0){
					echo"<td><a href='mosques.php?delid=$row[id]' class='confirm'><img src='img/cancel.png'/></a>";
					}else{
					echo"<td><img src='img/cancel1.png'/>";
					}
					echo "
					<img src='img/edit.png' style='cursor:pointer' onclick='editmosque(\"$row[id]\")' /></td>
					</tr>
					<tr> <td colspan='8' id='edit".$row['id']."' align='center'></td></tr>";
					}
				
				}
				?>
				</table>
				<br />
			    </div>
				<?php
				if(isset($_POST['acceptedit'])){
				$sql="update mosques set name='$_POST[name]', address='$_POST[maddress]', responsible='$_POST[mresponsible]', send_center='$_POST[nsendcenter]', rahgiri_code='$_POST[nsecretcode]', created_at='$_POST[ncreated_at]' where id='$_POST[mosqueid]'";
				mysql_query($sql) or die (mysql_error());
				header("location:mosques.php");
				die();
				}
				if(isset($_GET['delid'])){
				$sq="delete from mosques where id='$_GET[delid]'";
				mysql_query($sq) or die (mysql_query($sq));
				header("location:mosques.php");
				die();
				}

				?>
 		</fieldset>
			
		</form>
		</div>
		
</div><!-- end container -->
<?php
include("template_footer.php");
?>
</body>
</html>
