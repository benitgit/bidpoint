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
        
        hi' <?php echo $userow['fname']; ?>
        </div>
    </div>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
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
        <li class="active"><a href="#"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="#"><i class="glyphicon glyphicon-open-file"></i> Reports</a></li>
        <li><a href="#"><i class="fa fa-envelope"></i> messages</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="edit_user.php"><i class="fa fa-user"></i>  Profile</a></li>
            
            <li><a href="logout.php?logout"><i class="fa fa-sign-out"></i>  SignOut</a></li>
            
          </ul>
        </li>
      </ul>
      <!--<form class="navbar-form navbar-left">
        
      </form>-->
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 
<!--<div class="container">
<table class="table">
    <tr>
    <td><div class="row">
        <div class="col-sm-6 col-md-3">
              <div class="thumbnail">
              <?php 
              $list = mysql_query("SELECT * FROM product");
              $date = date("Y-m-d");
              
              while ($row=mysql_fetch_object($list)) {
                ?>


              
            <img  src="uploads/<?=$row->pic1?>">
            <div class="caption">
          <h3><?=$row->pname?></h3>
          <p><?=$row->pdesc?></p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          <?php
          }
               ?>
          </div> 
              </div>
        </div>
    </div></td>
    </tr>
    </table>
</div>-->
  <div class="container">
    <div class="row">
    
    <?php 
              $list = mysql_query("SELECT * FROM product");
              $date = date("Y-m-d");
              
              while ($row=mysql_fetch_object($list)) {
                ?>
    
    <!--<div class="col-sm-6 col-md-4">-->
    <div class="thumbnail" style="width:800px; margin-left:100px;">         
      <img style="width:200px; height:200px;" src="uploads/<?=$row->pic1?>">
      <div class="caption">
      
        <p><strong>Name: </strong><?=$row->pname?></p>
        <p><strong>Description: </strong><?=$row->pdesc?></p>
        <p><strong>Category: </strong><?=$row->ptype?></p>
        <p><a class="btn btn-primary" role="button" href="bidpoint.php?pro=<?= $row->pid?>">View details</a></p> 
        </div>
    <!--</div>-->
  
</div>

        <?php
          }
               ?>  
               </div>
</div>   
  <hr>   
<footer>
  <div class="row">
                <div class="col-lg-10">
                    <p><strong>Copyright &copy; Bidpoint 2016</strong></p>
                </div>
            </div>
</footer>
</body>
</html>