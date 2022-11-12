<?php 
ob_start();
session_start();
include 'connect.php';
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
<!--<link rel="stylesheet"  href="bootstrap/css/theme.min.css">
<link rel="stylesheet"  href="bootstrap/css/theme-responsive.min.css">-->
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
        
        hi' <?php echo $userow['access_level'] . ' '. $userow['fname']; ?> &nbsp;<!-- <a href="admin_logout.php?logout">Sign Out</a> -->
        </div>
    </div>
    
</div>    
        <!-- this the menu of the bidpoint -->
        <div class="bs-example" data-example-id="simple-nav-tabs"> 
        
        <ul class="nav nav-tabs" role="navigation"> 
        
        <li role="presentation" class="active"><a href="#"><i class="fa fa-home"></i> Home</a></li> 
        
        <li role="presentation"><a href="upload.php"><i class="fa fa-user"></i> Profile</a></li> 
        
        <li role="presentation"><a href="message.php"><i class="fa fa-send"></i> Messages</a></li> 
        

        <ul class="nav nav-pills">
  
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-cogs"></i>Settings<span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="priviledge.php"><span class="glyphicon glyphicon-flag"></span> Set priviledges</a></li>
      <li><a href="new_auction.php"><i class="fa fa-plus"></i> Create new Auction</a></li>
      <li><a href="schedule.php"><i class="fa fa-gavel"></i>  Auction schedules</a></li>
      <li><a href="admin_logout.php?logout"><i class="fa fa-sign-out"></i>  Log out</a></li>
    
    </ul>
  </li>
  
</ul>
        <!--<li role="presentation"><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>-->

        
        </ul> 
        
        </div>
<!--<div class="vd_status-widget vd_bg-green widget">-->
   <!--this is green and the yellow bars on the admin_home.php-->
    <!--<div id="sub-container">
        <div id="status">
            
                <i class="fa fa-gavel" style="color:whitesmoke; font-size:100px; opacity:0.3; margin-left:5px; margin-top:5px;"></i>

            <span style="color:whitesmoke; font-family:Verdana, Geneva, sans-serif;font-size:70px; margin-left:70px; opacity:0.8;  ">
            <?php
            ob_start();
            
            $q = mysql_query("SELECT count(pname) as nopname FROM product");
            $row = mysql_fetch_array($q);
            echo $row['nopname'];
             ?>
                 

            </span>
            <p style="color:whitesmoke; font-size:20px; font-family:Verdana, Geneva, sans-serif; margin-left:20px; opacity:0.8;">
                   Available Auctions in Bidpoint
                 </p>
        </div>
        <div id="profile">
            <i class="fa fa-user" style="color:whitesmoke; font-size:100px; opacity:0.3; margin-left:5px; margin-top:5px;"></i>
        
        <span style="color:whitesmoke; font-family:Verdana, Geneva, sans-serif;font-size:70px; margin-left:70px; opacity:0.8;">
          <?php 
          ob_start();
          $q = mysql_query("SELECT count(fname) as fname FROM users WHERE u_id>0 AND access_level=''");
          $row = mysql_fetch_array($q);
          echo $row['fname'];
           ?>
        </span>
        <p style="color:whitesmoke; font-size:20px; font-family:Verdana, Geneva, sans-serif; margin-left:80px; opacity:0.8;">
                   Bidders accounts
                 </p>
                 </div>
                 <!--
                <div id="patients">
                    <?php 
                            
                     ?>
                </div>
                 -->
    </div>
    <div class="container">
    <div class="row visible-on" style="margin:20px;">
        <div class="col-xs-12 col-sm-6">
            <div id="members">
              <i class="fa fa-gavel" style="color:whitesmoke; font-size:120px; opacity:0.3; margin-left:5px; margin-top:15px;"></i>

            <span style="color:whitesmoke; font-family:Verdana, Geneva, sans-serif;font-size:80px; margin-left:70px; opacity:0.8;  ">
            <?php
            ob_start();
            
            $q = mysql_query("SELECT count(pname) as nopname FROM product");
            $row = mysql_fetch_array($q);
            echo $row['nopname'];
             ?>
                 

            </span>
            <p style="color:whitesmoke; font-size:25px; font-family:Verdana, Geneva, sans-serif; margin-left:20px; margin-top:30px; opacity:0.8;">
                   Available Auctions in Bidpoint
                 </p>
            </div>          
        </div>
    
    
        <div class="col-xs-12 col-sm-6">
            <div id="accounts">
              <i class="fa fa-user" style="color:whitesmoke; font-size:120px; opacity:0.3; margin-left:5px; margin-top:15px;"></i>
        
        <span style="color:whitesmoke; font-family:Verdana, Geneva, sans-serif;font-size:80px; margin-left:70px; opacity:0.8;">
          <?php 
          ob_start();
          $q = mysql_query("SELECT count(fname) as fname FROM users WHERE u_id>0 AND access_level=''");
          $row = mysql_fetch_array($q);
          echo $row['fname'];
           ?>
        </span>
        <center>
        <p style="color:whitesmoke; font-size:25px; font-family:Verdana, Geneva, sans-serif; margin-left:20px; margin-top:30px; opacity:0.8;">
                   Active Bidders accounts
                 </p></center>
            </div>          
        </div>
    </div>
    </div>
</body>
</html>