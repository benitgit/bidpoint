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

//update codes start from here
 if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	
	$row = mysql_fetch_object(mysql_query("SELECT * FROM product WHERE pid = '$id'"));	
}
if (isset($_POST['update'])) 
{
	# code...
	$id = $_GET['id'];
	$pname = $_POST['pname'];
	$ptype = $_POST['ptype'];
	$pdate = $_POST['pdate'];
	$minbid = $_POST['minbid'];
	$pdesc = $_POST['pdescription'];

	$d = mysql_query("UPDATE product SET pname='$pname',pdate='$pdate',minbid='$minbid',ptype='$ptype',pdesc='$pdesc' WHERE pid = '$id'");
	if ($d) {
		# code...
		echo"<script>alert('SUCCESSFULLY UPDATED');</script>";
		header('location:schedule.php');
	}
	else
	{
		echo "<script>alert('SUCCESSFULLY UPDATED');</script>";
	}

}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome -> <?php echo $userow['access_level']; ?> new auction</title>
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
        
        <span class="glyphicon glyphicon-user x"></span> hi' <?php echo $userow['access_level'] . ' '. $userow['fname']; ?> &nbsp;<!--<a href="admin_logout.php?logout">Sign Out</a>-->
        </div>
    </div>
    
</div>    
        <!--this the menu of the bidpoint-->
        <div class="bs-example" data-example-id="simple-nav-tabs"> 
        
        <ul class="nav nav-tabs" role="navigation"> 
        
        <li role="presentation" ><a href="admin_home.php"><i class="fa fa-home"></i>Home</a></li> 
        
        <li role="presentation"><a href="upload.php"><i class="fa fa-user"></i>Profile</a></li> 
        
        <li role="presentation"><a href="#"><i class="fa fa-send"></i>Messages</a></li> 
        

        <ul class="nav nav-pills">
  
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
       <i class="fa fa-cogs"></i>Settings<span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#"><span class="glyphicon glyphicon-flag"></span> Set priviledges</a></li>
      <li><a href="new_auction.php"><i class="fa fa-plus"></i> Create new Auction</a></li>
      <li><a href="schedule.php"><i class="fa fa-gavel"></i>  Auction schedules</a></li>
      <li><a href="admin_logout.php?logout"><i class="fa fa-sign-out"></i>  Log out</a></li>
    </ul>
  </li>
  
</ul>
        <!--<li role="presentation"><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>-->

        
        </ul> 
        
        </div>
        <!--end of the bidpoint menu-->
<!--<div class="vd_status-widget vd_bg-green widget">-->
   <!--this is green and the yellow bars on the admin_home.php-->
    
    <div id="upload-form">
    <form action="" method="POST">
        <table class="table">
        <thead><h1>UPDATE AUCTION DETAILS</h1></thead>
            <tr>
                <td>
                    <label>Enter Product Name</label>
                    <input type="text" name="pname" class="form-control" placeholder="<?php echo $row->pname ?>" value="<?= $row->pname ?>"  required>
                </td>
                <td>
                    <label>Enter Product Type</label>
                    <select class="form-control" name="ptype">
                        <option selected><?php echo $row->ptype ?></option>
                        <option>Electronics Parts</option>
                        <option>Vehicles & Spare Parts</option>
                        <option>Construction Tools</option>
                        <option>Animal Stock</option>
                        <option>Home & Interiors</option>
                        <option>Others</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Date To Be Auctioned</label>
                    <input type="date" name="pdate" class="form-control" placeholder="<?php echo $row->pdate ?>" value="<?= $row->pdate ?>" required>
                </td>
                <td>
                    <label>Min BID</label>
                    <input type="text" name="minbid" class="form-control" placeholder="<?=$row->minbid ?>" value="<?= $row->minbid ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Product Description</label>
                    <textarea name="pdescription" class="form-control" required><?=$row->pdesc?></textarea>
                </td>
            </tr>
                               
                </table>
                <div style="margin-left:300px;">
                <button class="btn btn-primary" type="submit" name="update">
                    Update
                </button>
                <button class="btn btn-default" type="cancel">
                    Cancel
                </button>
                </div>
    </form>
        
    </div>
    
 <?php 
include 'connect.php';
$event = '';



  ?>

</body>
</html>