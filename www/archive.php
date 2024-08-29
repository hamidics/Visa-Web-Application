<?php
include("template_header.php");
?>
<script language="javascript" type='text/javascript'>
function searchtypemethod(stype)
{
var divid='stypediv';

	if (stype=='')
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
			 
				xmlhttp.open('GET','archive_getmosquesajax.php?searchtype='+stype,true);
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
		<form method="post" action="archive.php" accept-charset="utf-8" id="myform"  class="formular">
			<fieldset>
				<legend align="right"><span >آرشیف</span></legend>
				جستجوی کاروان بر اساس:<select name="search_type" id="search_type" onchange="searchtypemethod(this.value)" >
					<option value="">انتخاب</option>
					<option value="mosquename">نام مسجد</option>
					<option value="karvan">شماره اعزام</option>
					<option value="all">نمایش همه</option>
				</select>
				<span id="stypediv">
				
				</span>
				<input type="submit" class="submit"  name="search" value="جستجو"/>
				</br>
				</br>
				جستجوی شخص: 
				</br>
				نام شخص:<input type='text' name='appname' size='25' />
				نام پدر:<input type='text' name='appfname' size='25' />
				شماره پاسپورت:<input type='text' name='passport' size='25' />
				<input type="submit"   name="search2" value="جستجو"/>
				<h3 class="ico_mug"></h3>
				<div id="tabledata" class="section">
				<table width="100%" id="table" >
				<?php
					if(isset($_POST['search'])){
						if($_POST['search_type']=="mosquename"){
							echo "
							<tr>
							<th>شماره</th>
							<th>شماره اعزام</th>
							<th>نام مسجد مربوطه</th>
							<th>تاریخ مراجعه</th>
							<th>تاریخ بازگشت</th>
							<th>تاریخ گزارش دهی</th>
							<th>عملیات</th>
							</tr>
							";
							$i=1;
							//$sql="select id from mosques where name='$_POST[search_data]' ";
							//$res=mysql_query($sql) or die(mysql_error());
							//while($row=mysql_fetch_array($res)){
							$sql="select `mosques`.name, `karvan`.id, `karvan`.send_number, `karvan`.mosque_id, recipe_date  from mosques, karvan where  `mosques`.name LIKE '%$_POST[search_data]%' and `karvan`.mosque_id=`mosques`.id order by `mosques`.name ";
							$res=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($res)){
								echo "
								<tr align='center'>
								<td>$i</td>
								<td>$row[send_number]</td>
								<td> $row[name]</td>
								<td>$row[recipe_date]</td>
								<td>$row[back]</td>
								<td>$row[report]</td>
								<td><a style='color:blue' href='karvan_applicants.php?kid=$row[id]'>نمایش اعضا و زمانبندی کاروان</a></td>
								</tr>";
								$i++;
							}
							//}
						
						
						}else if($_POST['search_type']=="karvan"){
							echo "
							<tr>
							<th>شماره</th>
							<th>شماره اعزام</th>
							<th>نام مسجد مربوطه</th>
							<th>تاریخ مراجعه</th>
							<th>تاریخ بازگشت</th>
							<th>تاریخ گزارش دهی</th>
							<th>عملیات</th>
							</tr>
							";
							$i=1;
							$sql="select `mosques`.name, `mosques`.id AS mosqueid, `karvan`.id, `karvan`.send_number, `karvan`.mosque_id, recipe_date  from mosques, karvan where `karvan`.send_number='$_POST[search_data]' and `karvan`.mosque_id=`mosques`.id";
							$res=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($res)){
								echo "
								<tr align='center'>
								<td>$i</td>
								<td>$row[send_number]</td>
								<td> $row[name]</td>
								<td>$row[recipe_date]</td>
								<td>$row[back]</td>
								<td>$row[report]</td>
								<td><a style='color:blue' href='karvan_applicants.php?kid=$row[id]' style='color:blue'>نمایش اعضا و زمانبندی کاروان</a></td>
								</tr>";
								$i++;
							}
							}else if($_POST['search_type']=="all"){
								echo "
							<tr>
							<th>شماره</th>
							<th>شماره اعزام</th>
							<th>نام مسجد مربوطه</th>
							<th>تاریخ مراجعه</th>
							<th>تاریخ بازگشت</th>
							<th>تاریخ گزارش دهی</th>
							<th>عملیات</th>
							</tr>
							";
							$i=1;
							$sql="select `mosques`.name, `mosques`.id AS mosqueid, `karvan`.id, `karvan`.send_number, `karvan`.mosque_id, recipe_date  from mosques, karvan where   `karvan`.mosque_id=`mosques`.id";
							$res=mysql_query($sql) or die(mysql_error());
							while($row=mysql_fetch_array($res)){
								echo "
								<tr align='center'>
								<td>$i</td>
								<td>$row[send_number]</td>
								<td> $row[name]</td>
								<td>$row[recipe_date]</td>
								<td>$row[back]</td>
								<td>$row[report]</td>
								<td><a style='color:blue' href='karvan_applicants.php?kid=$row[id]' style='color:blue'>نمایش اعضا و زمانبندی کاروان</a></td>
								</tr>";
								$i++;
							
							}
						
						}
						}else if(isset($_POST['search2'])){
							if($_POST['appname']==""){
								$_POST['appname']="%";
							}
							if($_POST['appfname']==""){
								$_POST['appfname']="%";
							}
							if($_POST['passport']==""){
								$_POST['passport']="%";
							}
	
							$sql="select *from applicants where name LIKE '%$_POST[appname]%' and father_name LIKE '%$_POST[appfname]%' and passport_no LIKE '%$_POST[passport]%' ";
							
							$res=mysql_query($sql) or die(mysql_error());
							echo "
							<tr>
							<th>عکس</th>
							<th>نام</th>
							<th>نام پدر</th>
							<th>شماره پاس</th>
							<th>آخرین تاریخ برگشت از ایران</th>
							<th></th>
							</tr>
							";
							while($row=mysql_fetch_array($res)){
								$sq="select karvan_id, count(id) from karvan_applicants_getinfo where applicant_id='$row[id]'";
								$rs=mysql_query($sq) or die(mysql_error($sq));
								$rw1=mysql_fetch_array($rs);
								$sq="select back,status from karvan where id='$rw1[karvan_id]'";
								$rs=mysql_query($sq) or die(mysql_error());
								$rw=mysql_fetch_array($rs);
								echo "<tr align='center'>
								<td ><img style='width:50px;height:60px' src='applicant_images/$row[id].jpg'/></td>
								<td style='vertical-align:middle'>$row[name]</td>
								<td style='vertical-align:middle'>$row[father_name]</td>
								<td style='vertical-align:middle'>$row[passport_no]</td>";
								if($rw1['count(id)']!=0 && $rw['back']!="0000-00-00"){
								echo"
								<td style='vertical-align:middle'>$rw[back]</td>";
								}else if($rw1['count(id)']==0){
								echo"
								<td style='vertical-align:middle'>تا به حال سفری به ایران نداشته است</td>";
								}else{
								echo"
								<td style='vertical-align:middle'>فعلا در ایران به سر می برد</td>";
								}
								
								echo"
								<td style='vertical-align:middle'><a href='karvan_applicants.php?kid=$rw1[karvan_id]' style='color:blue'>نمایش کاروان</a></td>
								</tr>";

							
							}
						}
						//else{
						//	echo "<b style='font-size:20px; color:red; align:center'>جستجو ناموفق بود! دوباره سعی نمایید!</b>";
						//}
				
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
