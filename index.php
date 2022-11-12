<?php 
session_start();
if (isset($_SESSION['user'])!="") 
{
	header("Location:home.php");	
}
include_once 'connect.php';
if (isset($_POST['register'])) 
{
	$fname=mysql_real_escape_string($_POST['firstname']);
	$lname=mysql_real_escape_string($_POST['secondname']);
	$address=mysql_real_escape_string($_POST['address']);
	$tel=$_POST['tel'];
	$password=mysql_real_escape_string($_POST['password']);
	$gender=$_POST['gender'];
    $email=$_POST['email'];
    $access_level="";
	if (mysql_query("INSERT INTO users (fname,lname,address,tel,password,access_level,gender,email) VALUES ('$fname','$lname','$address','$tel','$password','$access_level','$gender','$email')")) 
	{
		
		echo "<script>alert('successfully registered');</script>";

		  
       
	}
	else
	{
	
		echo"<script>alert('error while registering you...');</script>";
	
	}
header("Location:login.php");
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>SIGN UP</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="font-awesome-4.4.0/css/font-awesome.css">
 <link rel="stylesheet" type="text/css" href="style.css">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 <script src="jquery/jquery.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
 
<div id="registering">
 	<h1 style="margin-left:300px;">Registration</h1>
 	<form class="form-horizontal" method="POST">

   		<div class="form-group">
   			<label class="col-sm-3 control-label">First Name</label>
   			<div class="col-xs-3">
   				<div class="input-group">
   			<div class="input-group-addon"><i class="fa fa-user"></i></div>
   				<input type="text" class="form-control" name="firstname">
   				</div>
   			</div>
   		</div>
   		<div class="form-group">
   			<label class="col-sm-3 control-label">Last Name</label>
   			<div class="col-xs-3">
   				<div class="input-group">
   			<div class="input-group-addon"><i class="fa fa-user"></i></div>
   				<input type="text" class="form-control" name="secondname">
   				</div>
   			</div>
   		</div>
   		<div class="form-group">
   		<label class="col-sm-3 control-label">Gender</label>
      		<div class="col-xs-3">
      			<select class="form-control" name="gender">
      				<option>Male</option>
      				<option>Female</option>
      			</select>
      		</div>
      </div>
      <div class="form-group">
   			<label class="col-sm-3 control-label">Address</label>
   			
   			<div class="col-xs-3">
   					<div class="input-group">
   			<div class="input-group-addon"><i class="fa fa-home"></i></div>
   				<input type="text" class="form-control" name="address">
   				</div>
   			</div>
   			
   		</div>
   		<div class="form-group">
   			<label class="col-sm-3 control-label">Phone No(+250)</label>
   			<div class="col-xs-3">
   				<div class="input-group">
   			<div class="input-group-addon"><i class="fa fa-phone"></i></div>
   				<input type="text" class="form-control" name="tel">
   				</div>
   			</div>
   		</div>
    	<div class="form-group">
   			<label class="col-sm-3 control-label">Password</label>
   			<div class="col-xs-3">
   				<div class="input-group">
   			<div class="input-group-addon"><i class="fa fa-lock"></i></div>
   				<input type="password" class="form-control" name="password">
   				</div>
   			</div>
   		</div>
   		<div class="form-group">
   			<label class="col-sm-3 control-label">Email</label>
   			<div class="col-xs-3">
   				<div class="input-group">
   			<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
   				<input type="text" class="form-control" name="email">
   				</div>
   			</div>
   		</div>
   		<div style="position:relative; left:300px; top:20px;">
   		<button type="submit" class="btn btn-primary" name="register">Register</button>
   		<button type="cancel" class="btn btn-default">Cancel</button>
  		</div>	
  <!--</div>-->
    </form>
</div>   
 </body>
 </html>