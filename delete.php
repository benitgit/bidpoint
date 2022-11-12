<?php 
include_once ('connect.php');
//this are the codes for my bidpoint real functions
if (isset($_GET['del'])) 
{
	# code...
	$del = $_GET['del'];
	mysql_query("DELETE FROM product WHERE pid = '$del' ");

	header("Location:schedule.php");
}
 ?>