<?php

//Unzip a folder and store it into a folder
 require_once('pclzip-2-8-2/pclzip.lib.php');
  $archive = new PclZip('test.zip');
  if (($v_result_list = $archive->extract(PCLZIP_OPT_PATH, 'uploads')) == 0) {
    die("Error : ".$archive->errorInfo(true));
  }
  echo "<pre>";
  var_dump($v_result_list);
  echo "</pre>";


?>