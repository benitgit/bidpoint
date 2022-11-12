<?php 
ob_start();
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: login.php");
}
else if(isset($_SESSION['useradmin'])!="")
{
	header("Location: admin_home.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['useradmin']);
	header("Location: login.php");
}
 ?>