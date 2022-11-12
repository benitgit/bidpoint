<?php 
ob_start();
session_start();
include 'connect.php';
include_once 'dateCountDown.php';

//this are the codes for my bidpoint real functions
if(!isset($_SESSION['user']))
{
	header("Location:login.php");
}
	$res=mysql_query("SELECT * FROM users WHERE u_id=".$_SESSION['user']) or die(mysql_error());
  $userow=mysql_fetch_object($res);
 
if (isset($_GET['pro'])) 
{
		# code...
		$id=$_GET['pro'];
		$q=mysql_query("SELECT * FROM product WHERE pid='$id'");
		$row=mysql_fetch_object($q);
		
    $user=($userow->u_id);

	}
  //this is for payment

//the first if is when submit button is pressed 
if (isset($_POST['submit'])) 
{
    /*$bid=1;*/
    $account_number=$_POST['account_number'];
    $amount=$_POST['amount'];
    $bidmoney=mysql_query("INSERT INTO bids(pro_id,use_id,bid_amount) VALUES ('$id','$user','$amount')");
    //this is the codes to add the record of a bid in 
    $quer=mysql_query("SELECT * FROM account WHERE account_number='$account_number'");
    $rol=mysql_fetch_object($quer);
    /*$user_id=($rol->user_identification);
    $queri=mysql_query("SELECT * FROM users WHERE u_id='$user_id'");
    $r=mysql_fetch_object($queri);*/

    $cashin=($rol->amount);
    if ($amount<$cashin) 
    {
         $cashout=$cashin-$amount;
        /*echo "Bid is done".$cashout;*/
        
    }        
    else
    {
        echo "<script>alert('not enough money in your account');</script>";
    }

    

}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Welcome To BIDPOINT</title>
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
        
       BidPoint Ground	
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
      <a class="navbar-brand" href="home.php">Bidpoint</a>
    </div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home.php"><i class="fa fa-home"></i> Home </a></li>
        <li class="active"><a href="#"><i class="fa fa-gavel"></i> Bidpoint</a></li>
        <li><a href="#"><i class="fa fa-envelope"></i> messages</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
            
            <li><a href="logout.php?logout"><i class="fa fa-sign-out"></i>  SignOut</a></li>
            
          </ul>
        </li>
      </ul>

      <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                <?=$row->pname?>
                    
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="uploads/<?=$row->pic1?>" >
            </div>

            <div class="col-md-4">
                <h3>Product Description</h3>
                <p><?=$row->pdesc?></p>
                <h3>Product Details</h3>
                <ul>
                    <li><strong>Name: </strong><?=$row->pname?></li>
                    <li><strong>Minimum Bid: </strong><?=$row->minbid?></li>
                    <li><strong>Auction Date: </strong><?=$row->pdate?></li>
                    
                </ul>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Other Pictures</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" style="width:500px; height:200px;" src="uploads/<?=$row->pic2?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" style="width:200px; height:200px;" src="uploads/<?=$row->pic3?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" style="width:200px; height:200px;" src="uploads/<?=$row->pic4?>">
                </a>
            </div>

          <div class="col-sm-3 col-xs-6">
          <?php 
        /*$list=mysql_query("SELECT * FROM product");
        $get=mysql_fetch_object($list);*/
        $day=getdays(date("Y-m-d"),$row->pdate); 
          if ($day==0) 
            {
              ?>
           <button href="#" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#myModal" style="width:150px; height:40px; background:#337ab7; border-radius:5px; color:whitesmoke; font-family:helvetica; font-size: 1.3em; opacity:0.9;">Bid</button>

           <button href="#" class="btn btn-success" data-toggle="modal" data-target="#mymodal" style="width:150px; height:40px; border-radius:5px; color:whitesmoke; font-family:helvetica; font-size: 1.3em; opacity:0.9; margin-top:12px;" name="view">View Bids
           <span class="badge">
                <?php 
                $num=mysql_query("SELECT count(pro_id) as bid FROM bids WHERE bid_id>0"); 
                $numb=mysql_fetch_array($num); 
                echo $numb['bid'];
                ?>
             
           </span>
           </button>
          <?php
            }
          ?>
           <?php
           if($day>0)
           {
            ?>
              <button href="#" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#myModal" style="width:150px; height:40px; background:#337ab7; border-radius:5px; color:whitesmoke; font-family:helvetica; font-size: 1.3em; opacity:0.9;" disabled="disabled">Bid</button>
              <?php
           }
           if($day<0)
           {?>
              <button href="#" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#myModal" style="width:150px; height:40px; background:#337ab7; border-radius:5px; color:whitesmoke; font-family:helvetica; font-size: 1.3em; opacity:0.9;" disabled="disabled">!Not Available</button>
           <?php
         }

          
         ?>
              
          </div>  

        </div>
        <!-- /.row -->

        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment Information</h4>
      </div>
      <div class="modal-body">
        <!--<p>Some text in the modal.</p>-->
        
             <form method="POST">
          <div class="form-group">
            <label class="control-label">Account Code.</label>
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
           <input type="text" class="form-control" name="account_number">
            </div>          
          </div>
          <div class="form-group">
            <label  class="control-label">Bid Cash.</label>
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-euro"></i></span>
            <input type="text" class="form-control" name="amount">
          </div>
          </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button type="cancel" class="btn btn-default">Cancel</button>
        </form>
      </div>
      <div class="modal-footer">
      <!-- <button class="btn btn-success" type="submit">Verify</button> -->
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
    </div>

  </div>
</div>



<div id="mymodal" class="modal fade bs-example-modal-lg" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment Information</h4>
      </div>
      <div class="modal-body">
        <!--<p>Some text in the modal.</p>-->
        
            <table class="table">
              <thead>
               <!--  <th>Product Name</th> -->
                <th>Bidder</th>
                <th>Amount Proposal</th>
              </thead>
              <tbody>
                 <?php 
                  $join=mysql_query("SELECT users.fname,bids.bid_amount FROM users, bids WHERE users.u_id=bids.use_id ORDER BY bids.bid_amount");
                  while($joined=mysql_fetch_object($join))
                  {?>
                    <tr>
                    <td><?=$joined->fname?></td>
                    <td><?=$joined->bid_amount."rwf"?></td>
                    </tr>
                    <?php
                  }
                  ?>         
                 
              </tbody>
            </table>
        
             
      </div>
      <div class="modal-footer">
      <!-- <button class="btn btn-success" type="submit">Verify</button> -->
        
       <center><strong>COUNTDOWN</strong></center>
      </div>
    
    </div>

  </div>
</div>



        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><strong>Copyright &copy; Bidpoint 2016</strong></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
 </body>
 </html>