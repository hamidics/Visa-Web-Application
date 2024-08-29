<?php
//check session
session_start();

if(!isset($_SESSION['userId']) || !($_SESSION['access'] == "DBA" || $_SESSION['access'] == "Librarian")){
	header('Location: index.php');
}
?>