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
<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/-theme.min.css">-->
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
        
        hi' <?php echo $userow['access_level'] . ' '. $userow['fname']; ?> 
        </div>
    </div>
    
</div>    
        
        <div class="bs-example" data-example-id="simple-nav-tabs"> 
        
        <ul class="nav nav-tabs" role="navigation"> 
        
        <li role="presentation" ><a href="admin_home.php"><i class="fa fa-home"></i>Home</a></li> 
        
        <li role="presentation" class="active"><a href="#"><i class="fa fa-user"></i>Profile</a></li> 
        
        <li role="presentation"><a href="#"><i class="fa fa-send"></i>Messages</a></li> 
        
        <!-- <li role="presentation"><a href="#"><i class="fa fa-cogs"></i>Settings</a></li> -->

        <li role="presentation"></li>
        <ul class="nav nav-pills">
  
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-cogs"></i>Settings<span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="priviledge.php"><span class="glyphicon glyphicon-flag"></span> Set priviledges</a></li>
      <li><a href="new_auction.php"><i class="fa fa-plus"></i> Register New Product</a></li>
      <li><a href="schedule.php"><i class="fa fa-gavel"></i>  Products Inventory</a></li>
      <li><a href="admin_logout.php?logout"><i class="fa fa-sign-out"></i>  Log out</a></li>
    </ul>
  </li>
  
</ul>
        <!--<li role="presentation"><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>-->

        
        </ul>
        </ul> 
        
        </div>
<!--<div class="vd_status-widget vd_bg-green widget">-->
    <div class="col-md-6 col-md-offset-3">
<h1>Edit Profile</h1>
  <form method="POST">
    <div class="form-group">
      <label class="">First Name</label>
     <div class="input-group">
     <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="type" class="form-control" name="fname" value="<?php echo $userow['fname']?>">
        </div>
    </div>
    <div class="form-group">
      <label class="">Last Name</label>
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="type" class="form-control" name="lname" value="<?php echo $userow['lname']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="">Gender</label>
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-dashboard"></i></div>
      <select class="form-control" name="gender">
        <option>Male</option>
        <option>Female</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="">Address</label>
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-home"></i></div>
      <input type="type" class="form-control" name="address" value="<?php echo $userow['address']?>">
        </div>
    </div>
    <div class="form-group">
      <label class="">Phone No (+250)</label>
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-phone"></i></div>
      <input type="type" class="form-control" name="tel" value="<?php echo $userow['tel']?>">
        </div>
    </div>
    <div class="form-group">
    
      <label class="">Enter Current Password</label>
    <div class="input-group">
    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
      <input type="password" class="form-control" name="current_p" required>
        </div>
    </div>
    <div class="form-group">

      <label class="">Enter New Password</label>
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
      <input type="password" class="form-control" name="password" required>
        </div>
    </div>
    <div class="form-group">
      <label class="">Email</label>
      <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
      <input type="type" class="form-control" name="email" value="<?php echo $userow['email']?>">
    </div>
    </div>
    <button class="btn btn-primary" name="save">Save Changes</button>
    <button class="btn btn-default">Cancel</button>
  </form>
</div>
</body>
</html>