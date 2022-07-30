<?php 
session_start();

if (isset($_SESSION['manager'])) {
	unset($_SESSION['manager']);
	header("Location:index.php");
}else if(isset($_SESSION['admin'])){
	unset($_SESSION['admin']);
	header("Location:index.php");
}else if(isset($_SESSION['user'])){
	unset($_SESSION['user']);
	header("Location:index.php");
}else if(isset($_SESSION['Site_Inspector'])){
	unset($_SESSION['site_inspector']);
	header("Location:index.php");	
}
header("Location:index.php");	
 ?>