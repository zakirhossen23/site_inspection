<?php 
session_start();

if (isset($_SESSION['manager'])) {
	unset($_SESSION['manager']);
	header("Location:index.php");
}else if(isset($_SESSION['site_inspector'])){
	unset($_SESSION['site_inspector']);
	header("Location:index.php");	
}
header("Location:index.php");	
 ?>