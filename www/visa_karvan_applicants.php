<?php
include("template_header.php");
$viewid=$_GET['kid'];
?>
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
		<form method="post" action="visa_karvan_applicants.php?kid=<?php echo $_GET['kid'];?>" accept-charset="utf-8" id="myform"  class="formular">
			<fieldset>
				<legend align="right"><span >
				<?php
					$sql="select description, limits from visa_karvan where id='$viewid'";
					$resk=mysql_query($sql) or die (mysql_error());
					$rwk=mysql_fetch_array($resk);
					echo "نام کاروان: $rwk[description] >> کد رهگیری: $rwk[rahgiri_code]";
				?>
				</span></legend>
				<?php
					$sql="select count(id) from visa_applicants where source_id='$viewid'";
					$rscount=mysql_query($sql) or die (mysql_error());
					$rwcount=mysql_fetch_array($rscount);
					if($rwcount['count(id)']<$rwk['limits']){
				?>
				<a href="visa_karvan_appnew.php?kid=<?php echo $viewid;?>" ><img src="img/newvapp.png"/ ></a>
				<?php
					}else{
						echo "<div align='center'><b align='center' style='color:red; size:16px'>محدوده این کاروان تکمیل گردیده است. لطفا با ادمین به تماس شوید!</b></div>";
					}
				?>
				<br/>
				نوع جستجو :
				<select name="search_type" id="search_type" class="validate[required]">
					<option value="">انتخاب</option>
					<option value="name">نام</option>
					<option value="passport_num">شماره گذر نامه</option>
					<option value="all">همه لیست</option>
				</select>
				<input type="text" id="search_data" name="search_data"  size='30'/>
				<input type="submit" class="submit"  name="search" value="جستجو"/>
				<h3 class="ico_mug"></h3>
				<div id="tabledata" class="section">
				<table width="90%" id="table" >
				<tr>
				<th style="width:5%">شماره</th>
				<th>تاریخ</th>
				<th>متقاضی</th>
				<th>نوع و شماره گذرنامه</th>
				<th>تهیه فرم</th>
				<?php
				$usertype=$_SESSION['user_type'];
					if($usertype=="admin"){
				?>
				<th>عملیات</th>
				<th>وضعیت</th>
				<?php
				}
				?>
				</tr>
				<?php
				    if(isset($_POST['search'])){
					    $number = 0;
						if($usertype=="user"){
							$formstatus="and status='accepted'";
						}else{
							$formstatus="and (status='rejected' || status='' || status='accepted')";
						}
					    if($_POST['search_type'] == "name"){
						
						   $sql="Select id, created_at, first_name, last_name, passport_num, passport_kind, status from visa_applicants where first_name LIKE '%".$_POST['search_data']."%' and (type='old' || type='new') $formstatus and source_id='$viewid' order by id desc ";
				           $res=mysql_query($sql) or die(mysql_error());
				           while($row=mysql_fetch_array($res)){
						      $number++;
						      $id = $row['id'];
					          $first_name = $row['first_name'];
					          $last_name = $row['last_name'];
					          $passport_num = $row['passport_num'];
							  $passport_kind = $row['passport_kind'];
						      $created_at = $row['created_at'];
							  
							  echo"<tr>
						      <td class='table_date'  align='center'>$number</td>
						      <td class='table_date'  align='center'>$created_at</td>
						      <td class='table_date'  align='center'>$first_name $last_name</td>
						      <td class='table_date'  align='center'>$passport_num $passport_kind</td>
							  <td class='table_date'  align='center' style='width:150px'>
							  <input type='button' onclick='window.open(\"visa_archive_visaform_excel.php?visaapplicant=$id\",\"_parent\")'  value='درخواست روادید'/>
							  <input type='button' onclick='window.open(\"visa_archive_bill_excel.php?visaapplicant=$id\",\"_parent\")'  value='فیش بانک'/>
							  </td>
						      ";
							  if($usertype=="admin"){
							  echo "
							  <td class='table_date'  align='center' >
							  <a href='visa_karvan_applicants_edit.php?edit_id=$id&kid=$_GET[kid]'><img src='img/edit.png' width='15px' height='15'/></a> 
							  <a href='visa_karvan_applicants.php?accept_id=$id&kid=$_GET[kid]'><img src='img/accept.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?reject_id=$id&kid=$_GET[kid]'><img src='img/reject.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?delete_id=$id&kid=$_GET[kid]' class='confirm'><img src='img/cancel.png' width='15px' height='15'/></a>   
						      </td>";
							  $state="";
							  if($row['status']==""){
								$state="<b style='color:blue'>تعیین نشده</b>";
							  }else if($row['status']=="accepted"){
								$state="<b style='color:green'>تایید شده</b>";
							  }else{
								$state="<b style='color:red'>رد شده</b>";
							  }
						      echo "<td align='center'>$state</td>";
							  }
							  echo"</tr>";
						    }
						}
						
						elseif($_POST['search_type'] == "passport_num"){
						   $sql="Select id, created_at, first_name, last_name, passport_num, passport_kind, status from visa_applicants where passport_num LIKE '%$_POST[search_data]%' and (type='old' || type='new') $formstatus and source_id='$viewid' order by id desc";
				           $res=mysql_query($sql) or die(mysql_error());
				           while($row=mysql_fetch_array($res)){
						      $number++;
						      $id = $row['id'];
					          $first_name = $row['first_name'];
					          $last_name = $row['last_name'];
					          $passport_num = $row['passport_num'];
							  $passport_kind = $row['passport_kind'];
						      $created_at = $row['created_at'];
							  
							   echo"<tr>
						      <td class='table_date'  align='center'>$number</td>
						      <td class='table_date'  align='center'>$created_at</td>
						      <td class='table_date'  align='center'>$first_name $last_name</td>
						      <td class='table_date'  align='center'>$passport_num $passport_kind</td>
							  <td class='table_date'  align='center' style='width:150px'>
							  <input type='button' onclick='window.open(\"visa_archive_visaform_excel.php?visaapplicant=$id\",\"_parent\")'  value='درخواست روادید'/>
							  <input type='button' onclick='window.open(\"visa_archive_bill_excel.php?visaapplicant=$id\",\"_parent\")'  value='فیش بانک'/>

							  </td>
						      ";
							  if($usertype=="admin"){
							 echo "
							  <td class='table_date'  align='center' >
							  <a href='visa_karvan_applicants_edit.php?edit_id=$id&kid=$_GET[kid]'><img src='img/edit.png' width='15px' height='15'/></a> 
							  <a href='visa_karvan_applicants.php?accept_id=$id&kid=$_GET[kid]'><img src='img/accept.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?reject_id=$id&kid=$_GET[kid]'><img src='img/reject.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?delete_id=$id&kid=$_GET[kid]' class='confirm'><img src='img/cancel.png' width='15px' height='15'/></a>   
						      </td>";
							  $state="";
							  if($row['status']==""){
								$state="<b style='color:blue'>تعیین نشده</b>";
							  }else if($row['status']=="accepted"){
								$state="<b style='color:green'>تایید شده</b>";
							  }else{
								$state="<b style='color:red'>رد شده</b>";
							  }
						      echo "<td align='center'>$state</td>";
							  }
						    }
						
						}else if($_POST['search_type'] == "all"){
						
						  $sql="Select id, created_at, first_name, last_name, passport_num, passport_kind, status from visa_applicants where (type='old' || type='new') $formstatus and source_id='$viewid' order by id desc";
				          $res=mysql_query($sql) or die(mysql_error());
				           while($row=mysql_fetch_array($res)){
						      $number++;
						      $id = $row['id'];
					          $first_name = $row['first_name'];
					          $last_name = $row['last_name'];
					          $passport_num = $row['passport_num'];
							  $passport_kind = $row['passport_kind'];
						      $created_at = $row['created_at'];
							  
							   echo"<tr>
						      <td class='table_date'  align='center'>$number</td>
						      <td class='table_date'  align='center'>$created_at</td>
						      <td class='table_date'  align='center'>$first_name $last_name</td>
						      <td class='table_date'  align='center'>$passport_num $passport_kind</td>
							  <td class='table_date'  align='center' style='width:150px'>
							  <input type='button' onclick='window.open(\"visa_archive_visaform_excel.php?visaapplicant=$id\",\"_parent\")'  value='درخواست روادید'/>
							  <input type='button' onclick='window.open(\"visa_archive_bill_excel.php?visaapplicant=$id\",\"_parent\")'  value='فیش بانک'/>
							  </td>

						      ";
							if($usertype=="admin"){
							  echo "
							  <td class='table_date'  align='center' >
							  <a href='visa_karvan_applicants_edit.php?edit_id=$id&kid=$_GET[kid]'><img src='img/edit.png' width='15px' height='15'/></a> 
							  <a href='visa_karvan_applicants.php?accept_id=$id&kid=$_GET[kid]'><img src='img/accept.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?reject_id=$id&kid=$_GET[kid]'><img src='img/reject.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?delete_id=$id&kid=$_GET[kid]' class='confirm'><img src='img/cancel.png' width='15px' height='15'/></a>   
						      </td>";
							  $state="";
							  if($row['status']==""){
								$state="<b style='color:blue'>تعیین نشده</b>";
							  }else if($row['status']=="accepted"){
								$state="<b style='color:green'>تایید شده</b>";
							  }else{
								$state="<b style='color:red'>رد شده</b>";
							  }
						      echo "<td align='center'>$state</td>";
							  }
						    }
						}
					}else{
						  $sql="Select id, created_at, first_name, last_name, passport_num, passport_kind, status from visa_applicants where (type='old' || type='new')  $formstatus and source_id='$viewid' order by id desc";
				          $res=mysql_query($sql) or die(mysql_error());
				           while($row=mysql_fetch_array($res)){
						      $number++;
						      $id = $row['id'];
					          $first_name = $row['first_name'];
					          $last_name = $row['last_name'];
					          $passport_num = $row['passport_num'];
							  $passport_kind = $row['passport_kind'];
						      $created_at = $row['created_at'];
							  
							   echo"<tr>
						      <td class='table_date'  align='center'>$number</td>
						      <td class='table_date'  align='center'>$created_at</td>
						      <td class='table_date'  align='center'>$first_name $last_name</td>
						      <td class='table_date'  align='center'>$passport_num $passport_kind</td>
							  <td class='table_date'  align='center' style='width:150px'>
							  <input type='button' onclick='window.open(\"visa_archive_visaform_excel.php?visaapplicant=$id\",\"_parent\")'  value='درخواست روادید'/>
							  <input type='button' onclick='window.open(\"visa_archive_bill_excel.php?visaapplicant=$id\",\"_parent\")'  value='فیش بانک'/>
							  </td>
						      ";
							  if($usertype=="admin"){
							  echo "
							  <td class='table_date'  align='center' >
							  <a href='visa_karvan_applicants_edit.php?edit_id=$id&kid=$_GET[kid]'><img src='img/edit.png' width='15px' height='15'/></a> 
							  <a href='visa_karvan_applicants.php?accept_id=$id&kid=$_GET[kid]'><img src='img/accept.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?reject_id=$id&kid=$_GET[kid]'><img src='img/reject.png' width='15px' height='15'/></a>
							  <a href='visa_karvan_applicants.php?delete_id=$id&kid=$_GET[kid]' class='confirm'><img src='img/cancel.png' width='15px' height='15'/></a>   
						      </td>";
							  $state="";
							  if($row['status']==""){
								$state="<b style='color:blue'>تعیین نشده</b>";
							  }else if($row['status']=="accepted"){
								$state="<b style='color:green'>تایید شده</b>";
							  }else{
								$state="<b style='color:red'>رد شده</b>";
							  }
						      echo "<td align='center'>$state</td>";
							  }
						    }	
					}
				
				?>
				</table>
				</div>
			 </div>
 		</fieldset>
			
		</form>
		<?php
		if(isset($_GET['delete_id'])){
		mysql_query("start transaction;") ;
		$sql="Delete from visa_applicants where id='$_GET[delete_id]'";
		$rs1=mysql_query($sql) or die (mysql_error());
		$sql="Delete from visa_dependants where applicant_id='$_GET[delete_id]'";
		$rs2=mysql_query($sql) or die (mysql_error());
		$sql="Delete from visa_info where applicant_id='$_GET[delete_id]'";
		$rs3=mysql_query($sql) or die (mysql_error());
		if($rs1 && $rs2 && $rs3){
		mysql_query("commit;");
		}else{
		mysql_query("rollback;");
		}
		header("location:visa_karvan_applicants.php?kid=$_GET[kid]");
		die();
		}
		if(isset($_GET['accept_id'])){
			mysql_query("start transaction;") ;
			$sql="Update visa_applicants set status='accepted' where id='$_GET[accept_id]'";
			$rs=mysql_query($sql) or die(mysql_error());
			if($rs){
				mysql_query("commit;");
				}else{
				mysql_query("rollback;");
			}
			header("location:visa_karvan_applicants.php?kid=$_GET[kid]");
			die();
		}
		
		if($_GET['reject_id']){
			mysql_query("start transaction;") ;
			$sql="Update visa_applicants set status='rejected' where id='$_GET[reject_id]'";
			$rs=mysql_query($sql) or die(mysql_error());
			if($rs){
				mysql_query("commit;");
				}else{
				mysql_query("rollback;");
			}
			header("location:visa_karvan_applicants.php?kid=$_GET[kid]");
			die();
		}
		?>
		</div>
		
</div><!-- end container -->
	   <?php
	   
	   include ("template_footer.php");
	   ?>
</body>
</html>
