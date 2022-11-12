<?php 
ob_start();
session_start();
include_once 'connect.php';
if(!isset($_SESSION['user']))
{
	header("Location:login.php");
}
	$res=mysql_query("SELECT * FROM users WHERE u_id=".$_SESSION['user']) or die(mysql_error());
	$userow=mysql_fetch_array($res);
  $idm = $userow['u_id'];
  /*$userd=mysql_fetch_object($res);
  $idm = ($userd->u_id);*/
 if (isset($_POST['save'])) 
 {
   # code...
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $tel = $_POST['tel'];
  $current_p = $_POST['current_p'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  if ($current_p == $userow['password']) 
  {
    # code...
    $d = mysql_query("UPDATE users SET fname='$fname',lname='$lname',address='$address',tel='$tel',password='$password',gender='$gender',email='$email' WHERE u_id='$idm'");
      if ($d) 
      {
        # code...
        echo "<script>alert('SUCCESSFULLY UPDATED PROFILE');</script>";
      }
      
  }
  else
      {
        echo "<script>alert('CHANGES NOT DONE');</script>";
      }
 }
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
<style type="text/css">
  
</style>
</head>
<body>

<div id="header">
	<div id="left">
    <label>BidPoint</label>
    </div>
    <div id="right">
    	<div id="content">
        
        hi' <?php echo $userow['fname']; ?> this is ur Profile Editor
        </div>
    </div>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid"">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bidpoint</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="#"><i class="glyphicon glyphicon-open-file"></i> Reports</a></li>
        <li><a href="#"><i class="fa fa-envelope"></i> messages</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
            
            <li><a href="logout.php?logout"><i class="fa fa-sign-out"></i>  SignOut</a></li>
            
          </ul>
        </li>
      </ul>
</nav>
<!-- <div class="benit"> 
  Edit profile
</div> -->
<div class="col-md-6 col-md-offset-3">
<h1>Edit Profile</h1>
  <form method="POST">
    <div class="form-group">
      <label class="">First Name</label>
      <input type="type" class="form-control" name="fname" value="<?php echo $userow['fname']?>">
    </div>
    <div class="form-group">
      <label class="">Last Name</label>
      <input type="type" class="form-control" name="lname" value="<?php echo $userow['lname']?>">
    </div>
    <div class="form-group">
      <label class="">Gender</label>
      <select class="form-control" name="gender">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="form-group">
      <label class="">Address</label>
      <input type="type" class="form-control" name="address" value="<?php echo $userow['address']?>">
    </div>
    <div class="form-group">
      <label class="">Phone No (+250)</label>
      <input type="type" class="form-control" name="tel" value="<?php echo $userow['tel']?>">
    </div>
    <div class="form-group">
      <label class="">Enter Current Password</label>
      <input type="password" class="form-control" name="current_p" required>
    </div>
    <div class="form-group">
      <label class="">Enter New Password</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
      <label class="">Email</label>
      <input type="type" class="form-control" name="email" value="<?php echo $userow['email']?>">
    </div>
    <button class="btn btn-primary" name="save">Save Changes</button>
    <button class="btn btn-default">Cancel</button>
  </form>
</div>
</body>
</htm>