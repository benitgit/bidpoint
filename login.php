<?php 
session_start();
include_once 'connect.php';
if (isset($_SESSION['user'])!="") 
{
	header("Location:home.php");	
}
if (isset($_SESSION['useradmin'])!="") 
{
	header("Location:admin_home.php");	
}
if (isset($_POST['login'])) 
{
	$fname=mysql_real_escape_string($_POST['firstname']);
	$password=($_POST['password']);
	$query=mysql_query("SELECT * FROM users WHERE fname='$fname'");
	$row=mysql_fetch_array($query);
	$admin="admin";
	if ($row['password'] == $password && $row['access_level'] == $admin ) 
	{
		$_SESSION['useradmin']=$row['u_id'];
		header("Location:admin_home.php");
	}
	else if($row['password'] == $password && $row['access_level'] =="" && $row['status'] == "unlocked")
	{
		$_SESSION['user']=$row['u_id'];
		header("Location:home.php");

	}
	else if($row['password'] == $password && $row['access_level']=="" && $row['status'] =="locked")
	{
		?>
		<script>alert('Your account has been Locked By The Administator');</script>
		<?php
	}	
	else
	{
		?>
		<script>alert('Wrong details');</script>
		<?php
	}
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>LOGIN</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.4.0/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>

<div id="login">

<div id="link">
	<a href="index.php"><button>SignUP</button></a>
</div>
		<blockquote><h1 style="margin-left:250px; font-size:3.0em;"><font style="color:#95A5A6; font-family:Franklin Gothic Demi;">Bid</font><font style="color:#2C3E50; font-family:Franklin Gothic Demi ;">Point</font><font style="color:black; font-family:Franklin Gothic Demi;"> Login</font></h1></blockquote>
	<form class="form-horizontal" method="POST">
	<div class="form-group">
    		<label  class="col-sm-2 control-label">Username</label>
    	<div class="col-xs-3">
    			<div class="input-group">
    				<span class="input-group-addon"><i class="fa fa-user"></i></span>
      		<input type="text" name="firstname" class="form-control" placeholder="Username" autocomplete="off" required>
    			</div>
    	</div>
  	</div>

  	<div class="form-group">
    		<label  class="col-sm-2 control-label">Password</label>
    	<div class="col-xs-3">
    			<div class="input-group">
    				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
      		<input type="password" name="password" class="form-control" placeholder="password" autocomplete="off" required>
    			</div>
    	</div>
  	</div>
  	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="login" class="btn btn-primary">Sign in</button>
      <button type="cancel" class="btn btn-default">Cancel</button>
    </div>
	</form>
</div>

 </body>
 </html>