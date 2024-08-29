<?php
require_once("../library/db.php");
?>
<html>
<head>
<meta http-equiv='Content-Language' content='fa'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

</head>
<?php
$sq="select * from mosques where id='$_GET[mid]'";
$rs=mysql_query($sq) or die (mysql_error());
$rw=mysql_fetch_array($rs);

?>
<table width="100%" style="background-color:blue">
<tr>
<td align="center">
<input type="text" name="name" id="editmosquename" size="15" value="<?php echo $rw['name'];?>" class="validate[required]"/>
<input type="text" name="maddress" id="address" size="15" value="<?php echo $rw['address'];?>" class="validate[required]"/>
<input type="text" name="ncreated_at" id="ncreated_at" value="<?php echo $rw['created_at'];?>" class="validate[required]" size="10"/><input type="button" style="background-color:white; border:0; background-image:url(img/cal.png); width:24px;height:24px " onclick="displayDatePicker('ncreated_at', this);"/>

<input type="text" name="mresponsible" id="responsible" size="15" value="<?php echo $rw['responsible'];?>" class="validate[required]"/>
 <input type="text" id="nsecretcode" name="nsecretcode" size="18" value="<?php echo $rw['rahgiri_code'];?>" class="validate[required]"/>
<input type="text" id="nsendcenter" name="nsendcenter" size="20" value="<?php echo $rw['send_center'];?>" class="validate[required]"/>
<input type="submit" name="acceptedit" value="تایید ویرایش" id="submit" class="submit"/>
<input type="button" name="cancel" onclick="window.open('mosques.php','_parent')" value="انصراف" />
<input type="hidden" name="mosqueid" value="<?php echo $_GET['mid'];?>"/>
</td>
</tr>
</table>

</html>