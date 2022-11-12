<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die("connection failed");
}
else
{
	$db=mysql_select_db("auction");
}
?>
