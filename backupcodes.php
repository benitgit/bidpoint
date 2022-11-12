<?php 
ob_start();
session_start();
include_once 'connect.php';
if(!isset($_SESSION['useradmin']))
{
	header("Location:login.php");

}
	$res=mysql_query("SELECT * FROM users WHERE u_id=".$_SESSION['useradmin']) or die(mysql_error());
	$userow=mysql_fetch_array($res);

 ?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome -> <?php echo $userow['fname']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="font-awesome-4.4.0/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div id="header">
	<div id="left">
    <label>BidPoint</label>
    </div>
    <div id="right">
    	<div id="content">
        
        hi' <?php echo $userow['access_level'] . ' '. $userow['fname']; ?> &nbsp;<a href="admin_logout.php?logout">Sign Out</a>
        </div>
    </div>
    
</div>    

</body>
</html>
<!--when what am trying wont work i -->