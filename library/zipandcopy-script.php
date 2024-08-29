<?php
include "zipfile/recurseZip.php";
function copy_all($source,$dest) {

$dir = opendir($source);

@mkdir($dest);

while (false !== ( $file = readdir($dir)) ) {

if (( $file != '.' ) && ( $file != '..' )){

if (is_dir($source . '/' .$file) ) {

copy_all($source. '/' . $file,$dest.'/'.$file);

}

else {

copy($source.'/'.$file,$dest.'/'.$file);

}

}

}

closedir($dir);

}
function zipAndCopy(){
//copy_all("../www/applicant_images/","backup-info/applicant_images/");
copy_all("backup/","backup-info/backup/");

//Source file or directory to be compressed.
$src='backup-info/';
//Destination folder where we create Zip file.
unlink("c:\\backup\ackup-info.zip");
$dst='c://backup/';
$z=new recurseZip();
echo $z->compress($src,$dst);
$files = glob("backup-info/applicant_images/*"); 
foreach($files as $file) unlink($file);
//
$files2 = glob("backup-info/visa_applicant_images/*"); 
foreach($files2 as $file2) unlink($file2);
//
$files3 = glob("backup-info/visa_dependants_images/*"); 
foreach($files3 as $file3) unlink($file3);
//
$files1 = glob("backup-info/backup/*"); 
foreach($files1 as $file1) unlink($file1);
copy("THUMS.txt","backup-info/applicant_images/THUMS.txt");
copy("THUMS.txt","backup-info/visa_applicant_images/THUMS.txt");
copy("THUMS.txt","backup-info/visa_dependants_images/THUMS.txt");
}


?>