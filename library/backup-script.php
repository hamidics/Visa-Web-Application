<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?PHP
require_once("zipandcopy-script.php");
$handledb=@mysql_connect('79.143.176.2', 'hzayer_visaform', 'KssT&RA4VPE2') or die("Could not connect database");
@mysql_select_db('hzayer_visaform', $handledb) or die("Could not select database");
    @mysql_query("SET NAMES utf8", $GLOBALS['DB']);
    @mysql_query("SET CHARACTER SET utf8", $handledb);
	mysql_set_charset('utf8', $handledb);

   /* backup the db OR just a table */
    function backup_tables($tables, $backup_dir)
    {
        $return ="";
        

        //get all of the tables
        if($tables == "*")
        {
            $tables = array();
            $result = mysql_query("SHOW TABLES");
            while($row = mysql_fetch_row($result))
            {
                $tables[] = $row[0];
            }
        }
        else
        {
            $tables = is_array($tables) ? $tables : explode(",",$tables);
        }
        
        //cycle through
        $return.="SET FOREIGN_KEY_CHECKS=0;"."\n";
        foreach($tables as $table)
        {
            $result = mysql_query("SELECT * FROM ".$table);
            $num_fields = mysql_num_fields($result);
            
            $return.= "DROP TABLE IF EXISTS ".$table.";";
            $row2 = mysql_fetch_row(mysql_query("SHOW CREATE TABLE ".$table));
            $return.= "\n\n".$row2[1].";\n\n";
            
            for ($i = 0; $i < $num_fields; $i++) 
            {
                while($row = mysql_fetch_row($result))
                {
                    $return.= "INSERT INTO ".$table." VALUES(";
                    for($j=0; $j<$num_fields; $j++) 
                    {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("(\n)","\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ","; }
                    }
                    $return.= ");\n";
                }
            }
            $return.="\n\n\n";
			
			if($table=="applicants"){

			
			copy_all("../www/applicant_images/","backup-info/applicant_images/");
			
			
			}
			if($table=="visa_applicants"){
			
			copy_all("../www/visa_applicant_images/","backup-info/visa_applicant_images/");

			}
			if($table=="visa_dependants"){

			
			
			copy_all("../www/visa_dependants_images/","backup-info/visa_dependants_images/");
			
			
			}
            

        }
        $return.="SET FOREIGN_KEY_CHECKS=1;"." \n";

        //save file
        $filename = "backup.sql";
        if ($handle = fopen($backup_dir . "" . $filename, "w+") ) {
            fwrite($handle, $return);
            //echo sprintf("<div>[%s] فایل پشتیبان موفقانه تهیه گردید!<br />%s<br /><a href='../www/homepage.php'>بازگشت به صفحه اصلی</a> </br>فایل پشتیبان را می توانید از مسیر ذیل کاپی نمایید:</br></div>",date("Y-m-d H:i:s"),$backup_dir.$filename);
            echo "<div dir='rtl' align='center'><img src='../www/img/successbuckup.jpg'/></br>
			<a href='backup-script.php?download=1' ><img src='../www/img/download.png'/></a></div>";
			fclose($handle);
        } else {
            die("<div>Sorry, there is a problem at the moment. Please contact Database Administrator.<br /><a href=\"index.php\">Back to Home</a></div>");
        }
    }//end function

 backup_tables("*", "backup/");
 zipAndCopy();
 
 if(isset($_GET['download'])){
	$file="c://backup/ackup-info.zip";
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/force-download");
	header( "Content-Disposition: attachment; filename=".basename($file));
	header( "Content-Description: File Transfer");
	@readfile($file);
 
 
 
 }
?>