<?php
session_start();
include("template_header.php");
include("logout.php");

  
	if (isset($_GET['logout'])) {
	    logout();
    }
?>
	    <div id="content" >
	    <div id="top_menu" class="clearfix">
		<ul class="sf-menu"> <!-- DROPDOWN MENU -->

		</ul>
					</div>
					<div id="content_main" class="clearfix">
			<div id="main_panel_container" class="left">
			
			
			<?php 
			    $user_id = $_SESSION['user_id'];
				$sql="Select * from users where id ='$user_id'";
	            $res=mysql_query($sql) or die(mysql_error()."hi");
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
				$kafil=$row['kafil'];
				$type = $row['type'];
				
			?>
			
			<div id="shortcuts" class="clearfix" align="right">
				<h2 class="sidebar">بخش ها</h2>
				<ul>
				   <?php if($karvans == "1" ){ echo"<li><a href='karvans.php'><img src='img/visa_form.png' alt='Comments' width='200' height='200'/><span><b style='font-size:14px'>کاروان های جدید</b></span></a></li>"; } ?>
				   <?php if($karvan_archive == "1" ){ echo"<li><a href='archive.php'><img src='img/archive.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>آرشیو کاروانها</b></span></a></li>"; } ?>
				    <?php if($karvan_center == "1" ){ echo"<li><a href='mosques.php'><img src='img/mosques.jpg' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>مدیریت مراکز کاروانها</span></b></a></li>"; } ?>
				    <?php if($kafil == "1" ){ echo"<li><a href='kafils.php'><img src='img/zamen.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>مدیریت کفیل</span></b></a></li>"; } ?>
					<?php if($report == "1" ){ echo"<li><a href='reports.php'><img src='img/report.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>بخش گزارش دهی</span></b></a></li>"; } ?>
					<?php if($user_management == "1" ){ echo"<li><a href='users.php'><img src='img/Administrator.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>مدیریت کاربران</span></b></a></li>"; } ?>
					<?php if($visa_centers == "1" ){ echo"<li><a href='visa_centers.php'><img src='img/visacenter.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>مدیریت ویزاهای انفرادی</b></span></a></li>"; } ?>
					<?php if($newvisa == "1" ){ echo"<li><a href='visa_form.php'><img src='img/singlevisaicon.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>ويزاي جديد</span></b></a></li>"; } ?>
					<?php if($visa_archive == "1" ){ echo"<li><a href='visa_archive.php'><img src='img/visaarchive.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>آرشيو ويزا</b></span></a></li>"; } ?>
					<?php if($visa_resume == "1" ){ echo"<li><a href='blacklist.php'><img src='img/blacklist.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>سوابق ویزا</span></b></a></li>"; } ?>
					<?php if($backup == "1" ){ echo"<li><a href='backup.php'><img src='img/backup.png' alt='Gallery' width='200' height='200'/><span><b style='font-size:14px'>پشتیبانی سیستم</b></span></a></li>"; } ?>

				</ul>
			</div><!-- end #shortcuts -->
			</div>
	    </div><!-- end #content -->
	   <?php
	   include ("template_footer.php");
	   ?>
</div><!-- end container -->

</body>
</html>
