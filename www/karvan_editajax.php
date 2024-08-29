<?php
require_once("../library/db.php");
?>
<html>
<head>
<meta http-equiv='Content-Language' content='fa'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

</head>
<?php
$sq="select id,code,recipe_date, created_by, mosque_id from karvan where id='$_GET[karvanid]'";
$rs=mysql_query($sq) or die (mysql_error());
$rw=mysql_fetch_array($rs);

?>
<table width="100%" style="background-color:blue">
<tr>
<td align="center" style="color:white">

کاربر مربوطه : <select name='nuser' id='nuser' class='validate[required]'   >
						<option value="">انتخاب نام کاربر</option>
						<?php
						$sql="select id, name, user_name from users order by id desc";
						$res=mysql_query($sql) or die(mysql_error());
						while($row=mysql_fetch_array($res)){
						if($row['id']==$rw['created_by']){
							echo "<option selected value='$row[id]'>$row[name] ($row[user_name])</option>";
						}else{
							echo "<option value='$row[id]'>$row[name] ($row[user_name])</option>";
						}
						}
						?>
						</select>
	کدرهگیری مرکز : <select name='nmosque' id='nmosque' class='validate[required]'   >
						<option value="">انتخاب کدرهگیری</option>
						<?php
						$sql="select id, rahgiri_code, name from mosques order by id desc";
						$res=mysql_query($sql) or die(mysql_error());
						while($row=mysql_fetch_array($res)){
						if($row['id']==$rw['mosque_id']){
							echo "<option selected value='$row[id]'>$row[rahgiri_code] </option>";
						}else{
							echo "<option value='$row[id]'>$row[rahgiri_code]</option>";
						}
						}
						?>
						</select>
تاریخ مراجعه:<input type="text" name="recipedate" id="recipedate" size="22" value="<?php echo $rw['recipe_date'];?>" class="validate[required,custom[date]]"/>

<input type="button" style="background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px " onclick="displayDatePicker('recipedate', this);"/>

<input type="submit" name="acceptedit" value="تایید ویرایش" id="submit" class="submit"/>
<input type="button" name="cancel" onclick="window.open('karvans.php','_parent')" value="انصراف" />
<input type="hidden" name="karvan_id" value="<?php echo $_GET['karvanid'];?>"/>
</td>
</tr>
</table>

</html>
