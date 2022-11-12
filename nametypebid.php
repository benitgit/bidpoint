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
 	<title>Scheduled Auctions <?php echo " ".$userow['access_level']; ?></title>
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
        
        hi' <?php echo $userow['access_level'] . ' '. $userow['fname']; ?> &nbsp;<!--<a href="admin_logout.php?logout">Sign Out</a>-->
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
<!--this is the schedul table-->
<div class="container">         
<table class="table">

	<thead>

	<h1>SEARCH RESULTS</h1>
	<div style="margin-left:600px;">
	<form method="POST" action="nametypebid.php">
	<div style="float:left; font-size:20px; color:rgba(00,11,22,33);">Search By:</div>
	<div style="float:left; height:20px; font-size:17px; font-family:Barmeno-Regular; color:#ccc;">
		
			
		<select class="form-control" style="/*height:33.4px; background:rgba(00,11,22,33); border:1px solid #3498DB; border-radius:3px;*/" name="cbosearch">
		<option>Name</option>
		<option>Type</option>
		<option>Bid</option>
	</select>

	</div>
	<div class="row">
	  <div class="col-lg-6">
    
    <div class="input-group">

      
      <input type="text" class="form-control" placeholder="Search for..." name="txtsearch">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">SEARCH</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
	
	</form>
	</div>
	<th>Product Name</th>
	<th>Product Type</th>
	<th>Date To be Auctioned</th>
	<th>Minimum Bid</th>
	<th>Actions</th>

	</thead>
	<tbody>
	<!--reaching to the point of making the table of auctions
	remember to start with this when you start again
	
	TABLE OF ALL RESULTS CONTAINED IN THE SEARCH TERMS
	-->
		<?php 
		ob_start();
			$text = $_POST['txtsearch'];
			if($text == "")
			{
				echo "<script>alert('NO RESULTS FOUND!!!!!!');</script>";
			}
		 ?>
		 <?php 
		 include 'connect.php';
		 	$cbo = $_POST['cbosearch'];
		 	$search = $_POST['txtsearch'];
		  	?>

		  	<?php
		  	if($cbo == "Name")
		  	{
		  		$name = mysql_query("SELECT * FROM product WHERE pname like '".$search."'");
		  	?>
		  	<?php
		  	while($di=mysql_fetch_object($name))
		  	{
		  		?>
		  		<tr>
		  				<td><?=$di->pname?></td>
		  				<td><?=$di->ptype?></td>
		  				<td><?=$di->pdate?></td>
		  				<td><?=$di->minbid?></td>
		  				<td>
		  					<a href="edit.php?id=<?= $di->pid?>">Edit</a>|
							<a href="#">View More</a>|
							<a href="#">Delete</a>|
							<a href="#">Check in For Approval</a>
		  				</td>
		  		</tr>
		  		<?php
		  	}
		   }
		   elseif($cbo == "Type")
		   {
		   		$type = mysql_query("SELECT * FROM product WHERE ptype like '".$search."'");
		   
		   ?>
		   <?php
		  	while($pety = mysql_fetch_object($type))
		  	{
		  		?>
		  		<tr>
		  				<td><?=$pety->pname?></td>
		  				<td><?=$pety->ptype?></td>
		  				<td><?=$pety->pdate?></td>
		  				<td><?=$pety->minbid?></td>
		  				<td>
		  					<a href="edit.php?id=<?= $pety->pid?>">Edit</a>|
							<a href="#">View More</a>|
							<a href="#">Delete</a>|
							<a href="#">Check in For Approval</a>
		  				</td>
		  		</tr>
		  	<?php
		  	}

		  		?>
		  		<?php
		  	}elseif ($cbo == "Bid") {
		  		# code...
		  		$bid = mysql_query("SELECT * FROM product WHERE minbid>=0 AND minbid<=$search");
		  		?>
		  		<?php
		  		while($dib = mysql_fetch_object($bid))
		  		{
		  			?>
		  			<tr>
		  				<td><?=$dib->pname?></td>
		  				<td><?=$dib->ptype?></td>
		  				<td><?=$dib->pdate?></td>
		  				<td><?=$dib->minbid?></td>
		  				<td>
		  					<a href="edit.php?id=<?= $dib->pid?>">Edit</a>|
							<a href="#">View More</a>|
							<a href="#">Delete</a>|
							<a href="#">Check in For Approval</a>
		  				</td>
		  			</tr>
		  			<?php
		  	}
		  	?>
		  	<?php
		  }
			   ?>
		
	</tbody>
</table>

<a href="schedule.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-menu-left">Go Back!</span></button></a>


 </body>
 </html>