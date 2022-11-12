<?php 
ob_start();
session_start();
include 'connect.php';
include_once 'dateCountDown.php';
if(!isset($_SESSION['useradmin']))
{
	header("Location:login.php");

}
	$res=mysql_query("SELECT * FROM users WHERE u_id=".$_SESSION['useradmin']) or die(mysql_error());
	$userow=mysql_fetch_array($res);
 ?>
 <?php 
 	if(isset($_GET['lock']))
 	{
 		$id = $_GET['lock'];
 		$low=mysql_query("UPDATE users SET status='locked' WHERE u_id='$id'");
 		if($low)
 		{
 			echo "<script>alert('The lock is successfully applied!!');</script>";
 		}
 	}
 	if(isset($_GET['unlock']))
 	{
 		$idd = $_GET['unlock'];
 		$query = mysql_query("UPDATE users SET status='unlocked' WHERE u_id='$idd'");
 		if($query)
 		{
 			echo "<script>alert('The Unlock is successfully applied');</script>";
 		}
 	}
  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Set priviledge</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="font-awesome-4.4.0/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatables/mytable.js"></script>

 </head>
 <body>
 <div id="header">
    <div id="left">
    <label>BidPoint</label>
    </div>
    <div id="right">
        <div id="content">
        
        This your Users manager <?php echo $userow['access_level'] . ' '. $userow['fname']; ?> &nbsp;<!--<a href="admin_logout.php?logout">Sign Out</a>-->
        </div>
    </div>
    
</div>
<div class="bs-example" data-example-id="simple-nav-tabs"> 
        
        <ul class="nav nav-tabs" role="navigation"> 
        
        <li role="presentation" ><a href="admin_home.php"><i class="fa fa-home"></i>Home</a></li> 
        
        <li role="presentation"><a href="upload.php"><i class="fa fa-user"></i>Profile</a></li> 
        
        <li role="presentation"><a href="message.php"><i class="fa fa-send"></i>Messages</a></li> 
        

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
        <div class="container" style="margin-top:100px;">
        <div class="table-responsive">
        	
        
        <table class="table table-striped" id="mytable">
        	<thead>
        		<th>User Name</th>
        		<th>Address</th>
        		<th>Email</th>
        		<th>Gender</th>
        		<th>Status</th>
        		<th>Priviledges</th>
        	</thead>
        	<tbody>

        	<?php 
        		$q = mysql_query("SELECT * FROM users WHERE access_level=''");
        		while($load = mysql_fetch_object($q))

        		{
        	 ?>
        		<tr>
        			<td><?=$load->fname?></td>
        			<td><?=$load->address?></td>
        			<td><?=$load->email?></td>
        			<td><?=$load->gender?></td>
        			<td><?=$load->status?></td>
        			<td>
        				<a class="btn btn-success" href="priviledge.php?lock=<?=$load->u_id?>">Lock</a>  <a class="btn btn-warning" href="priviledge.php?unlock=<?=$load->u_id?>">Unlock</a>
        			</td>
        		</tr>
        		<?php
        		}
        		?>
        	</tbody>
        </table>
        	</div>	
        </div>
 </body>
 </html>