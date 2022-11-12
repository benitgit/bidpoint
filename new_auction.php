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
        <!--end of the bidpoint menu-->
<!--<div class="vd_status-widget vd_bg-green widget">-->
   <!--this is green and the yellow bars on the admin_home.php-->
    <div id="upload-form">
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="table">
        <thead><h1>CREATE NEW AUCTION</h1></thead>
            <tr>
                <td>
                    <label>Enter Product Name</label>
                    <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" autocomplete="off" required>
                </td>
                <td>
                    <label class="col-sm-3 control-label">Enter Product Type</label>
                        
                    <select name="ptype" class="form-control">
                        
                        <option selected>Computer & Mobile Phones</option>
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
                    <input type="date" name="pdate" class="form-control" placeholder="yy/mm/dd" autocomplete="off" required>
                                       
                </td>
                <td>
                    <label>Min BID</label>
                    <input type="text" name="minbid" class="form-control" placeholder="Enter Minimum Bid" autocomplete="off" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Product Description</label>
                    <textarea name="pdescription" class="form-control" placeholder="Enter the product decription" autocomplete="off" required></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="image" required/>
                    <input type="file" name="image2" required/>
                    <input type="file" name="image3" required/>
                    <input type="file" name="image4" required/>
                </td>

            </tr>
                               
                </table>
                <div style="margin-left:300px;">
                <button class="btn btn-primary" type="submit" name="submit">
                    Save info
                </button>
                <button class="btn btn-default" type="cancel">
                    Cancel
                </button>
                </div>
    </form>
        
    </div>
    
<?php 
ob_start();
include_once('connect.php');
if (isset($_POST['submit'])) {
    # code...
    $pname = $_POST['pname'];
    $pdate = $_POST['pdate'];
    $minbid = $_POST['minbid'];
    $ptype = $_POST['ptype'];
    $pdesc = $_POST['pdescription'];
    //the start
    // ================================================================
// include ImageManipulator class
require_once('imageManipulator.php');

if ($_FILES['image']['error'] > 0) {
    echo "Error: " . $_FILES['image']['error'] . "<br />";
} else {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['image']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newName1 = date("Y-m-d").'/'.$_FILES['image']['name'];
        $manipulator = new ImageManipulator($_FILES['image']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName1);

    }
    // array of valid extensions
    $validExtensions2 = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension2 = strrchr($_FILES['image2']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension2, $validExtensions2)) {
        $newName2 = date("Y-m-d").'/'.$_FILES['image2']['name'];
        $manipulator = new ImageManipulator($_FILES['image2']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName2);

    }
    // array of valid extensions
    $validExtensions3 = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension3 = strrchr($_FILES['image3']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension3, $validExtensions3)) {
        $newName3 = date("Y-m-d").'/'.$_FILES['image3']['name'];
        $manipulator = new ImageManipulator($_FILES['image3']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName3);

    }

    // array of valid extensions
    //the end
    $validExtensions4 = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension4 = strrchr($_FILES['image4']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension4, $validExtensions4)) {
        $newName4 = date("Y-m-d").'/'.$_FILES['image4']['name'];
        $manipulator = new ImageManipulator($_FILES['image4']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 1000; 
        $y1 = $centreY - 1000; 
 
        $x2 = $centreX + 1000; 
        $y2 = $centreY + 1000; 
 
        // center cropping
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('uploads/'.$newName4);

    }else {
        echo 'You must upload an image...';
    }
}
$q = mysql_query("INSERT INTO product(pname,pdate,minbid,ptype,pdesc,pic1,pic2,pic3,pic4) VALUES 
        ('$pname','$pdate','$minbid','$ptype','$pdesc','$newName1','$newName2','$newName3','$newName4')");
    if ($q) {
        echo "<script>alert('auction active');</script>";   
    }
    else
    {
        echo "<script>alert('OPERATION UNSUCCESSFULL!!!!!!');</script>";   
    }
}
 ?>
</body>
</html>