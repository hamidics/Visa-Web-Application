<?php
$handledb=@mysql_connect('79.143.176.2', 'hzayer_visaform', 'KssT&RA4VPE2') or die("Could not connect database");
@mysql_select_db('hzayer_visaform', $handledb) or die("Could not select database");
    @mysql_query("SET NAMES utf8", $GLOBALS['DB']);
    @mysql_query("SET CHARACTER SET utf8", $handledb);
	mysql_set_charset('utf8', $handledb);


FUNCTION run_query_batch($handle, $filename=""){
 
  // Open SQL file.
  IF (! ($fd = FOPEN($filename, "r")) ) {
    DIE("Failed to open $filename: " . MYSQL_ERROR() . "<br>");
  }
 $stmt="";
  // Iterate through each line in the file.
  WHILE (!FEOF($fd)) {
 
    // Read next line from file.
    $line = FGETS($fd, 32768);
    $stmt = "$stmt$line";
 
    // Semicolon indicates end of statement, keep adding to the statement.
    // until one is reached.
    IF (!PREG_MATCH("/;/", $stmt)) {
      CONTINUE;
    }
 
    // Remove semicolon and execute entire statement.
    $stmt = PREG_REPLACE("/;/", "", $stmt);
 
    // Execute the statement.
    MYSQL_QUERY($stmt, $handle) ||
      DIE("Query failed: " . MYSQL_ERROR() . "<br>");
 
    $stmt = "";
  }
 
  // Close SQL file.
  FCLOSE($fd);
}
//
?>