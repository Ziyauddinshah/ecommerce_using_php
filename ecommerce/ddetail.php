<?php

session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');
// echo '<script type="text/javascript">';
// echo ' alert("Welcome to dealer page..")'; 
// echo '</script>';
include('connection.php');

$admin=0;
if(isset($_SESSION['UNAME']) and isset($_SESSION['UPASS']))
{
  $adminname=$_SESSION['UNAME'];
  $adminpassword=$_SESSION['UPASS'];
  if($adminname=="Ziya" and $adminpassword=="Ziya321#")
    $admin=1;
}

if(isset($_SESSION['UNAME']))
{
	$username=$_SESSION['UNAME'];
	$q1="SELECT * from uregistration where username='$username'";
	$qrun=mysqli_query($con,$q1);
  $row1=mysqli_fetch_array($qrun);
	// echo "welcome <b>".$username."</b>! at dealer page..";
  if(isset($_GET['pid']))
  {
    $pid=$_GET['pid'];
    $pq1="SELECT pname from product where pid='$pid'";
    $pq1run=mysqli_query($con,$pq1);
    $pq1result=mysqli_fetch_array($pq1run);
    $pname=$pq1result['pname'];
    $dq1="SELECT * from dregistration where pname='$pname'";
    $dq1run=mysqli_query($con,$dq1);
    $count=mysqli_num_rows($dq1run);
    $row=mysqli_fetch_array($dq1run);
    //echo $count;
  }
}
else
  $row=0;



mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>dealer detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="./CSS/cart.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style >
  	.zoom:hover {
  transform: scale(1.1); 
    }
    .zoom {
      transition: transform .3s;
      margin: 0 auto;
    }
    .nav-item{
        padding-right: 15px;  
    }
     
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color:#4d94ff;">
    <a id="logo" class="navbar-brand" href="product.php" style="margin-bottom: -6px;margin-top: -7px"><img src="./Image/logo.jpg" width="60px" height="40px"></a>
    <button type="button" id="nav1" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="nav">
      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold px-3" href="product.php">HOME</a>
        </li> 
        <li class="nav-item dropdown" data-toggle="dropdown" data-hover="dropdown">
            <a  class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">CATEGORIES</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" onclick="cars()" href="#">Cars</a>
              <a class="dropdown-item" onclick="bikes()" href="#">Bikes</a>
              <a class="dropdown-item" onclick="truck()" href="#">Truck</a>
            </div>
        </li> 
        <li class="nav-item " id="pull">  
          <a class="nav-link text-light  font-weight-bold px-3 login" href="#" id="<?php if(!isset($_SESSION['UNAME'])) echo 'myBtn'; else echo 'user_profile';?>"> 
            <?php 
            if(isset($_SESSION['UNAME'])) 
              echo "HELLO!".$_SESSION['UNAME']; 
            else 
              echo "LOGIN"; 
            ?>
          </a>
        </li>
        <li class="nav-item " style="font-family: arial;margin-top: +8px;"> 
          <a href="cart.php" class="text-white fa-lg" >
            <i class="fa fa-shopping-cart" id="navcartitem">
            <?php
                if(isset($row1))
                  echo $row1['cart']." Item";
                else
                  echo "0 Item";
            ?>
            </i>
          </a>
        </li>
        <li class="nav-item dropdown" data-toggle="dropdown" data-hover="dropdown">
            <a  class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MORE</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" onclick="about()" href="#">About Us</a>
              <a class="dropdown-item" onclick="developer()" href="#">Developer</a>
              <a class="dropdown-item" onclick="link1()" href="#">Link 1</a>
              <a class="dropdown-item" onclick="link2()" href="#">Link 2</a>
              <a class="dropdown-item" onclick="link3()" href="#">Link 3</a>
            </div>
        </li>

        <script type="text/javascript">
                  $('ul li').hover(function() {
                  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                }, function() {
                  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                });
        </script>
        <script type="text/javascript">
          function cars(){
            window.location.assign("cars.php");
          }
          function bikes(){
            window.location.assign("#");
          }
          function truck(){
            window.location.assign("#");
          }
          function about(){
            window.location.assign("#");
          }
          function developer(){
            window.location.assign("#");
          }
          function link1(){
            window.location.assign("#");
          }
          function link2(){
            window.location.assign("#");
          }
          function link3(){
            window.location.assign("#");
          }
        </script>
        <li class="nav-item ">  
          <a class="nav-link text-light font-weight-bold px-3" href='product.php?logout=true' >
              <?php if(isset($_SESSION['UNAME'])) echo "LOGOUT"; ?>
          </a>
        </li>
      </ul>
      <form class="form-inline ml-3" action="product1.php" method="post" style="margin-bottom: -.5px;">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search" >
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
  </nav><br><br><br>
  <script>
    $(document).ready(function(){
      $("#user_profile").click(function(){
        window.location.href = "user_profile.php";
     });
      $("#myBtn").click(function(){
        window.location.href = "login.php";
     });
    });
  </script>


  <div class="col-sm-4">
    <h3>This is Dealer Page</h3> 
  </div><br>
	<div class="container">
    <!-- <div class="card-deck justify-content-between"> -->
	  <?php 
	   while($row)
	   {
	   	?>

	   <div class="card-deck justify-content-between" >
	      <div class="col-sm-4 card" style="border-color: white;">	
	       	<img class="zoom" style="border-radius: 1%;" src="<?php echo 'Image/'.$row['dimage']; ?>" height="380px" width="100%" />
	      </div>
	      <div class="col-sm-8 " style="background-color:lavenderblush;">
	    	   <label>Dealer Name:</label>
	    	   <h4><p><?php echo $row['dname']; ?></p></h4>
	    	   <label>Dealer Mob:</label>
	    	   <label><h4><?php echo $row['dmob']; ?></h4></label><br>
	    	   <label>Dealer Email:</label>
	    	   <label><h4><?php echo $row['demail']; ?></h4></label><br>
	    	   <label>Dealer Address:</label>
	    	   <h4><p><?php echo $row['daddress']; ?></p></h4>
	      </div>
	    </div><hr>
	    <?php
	    }  
	    ?>
    <!-- </div> -->
	</div>
  <!-- <h4> See Dealers <a href="dealer.php" >click here</a></h4> -->
  <div>
  <?php
    if($admin==1) 
      echo "<h4> See Dealers <a href='dealer.php' >click here</a></h4>";
    else echo " ";
    ?>
  </div>
  <div class="footer">
    <h2>This is footer</h2>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </div>
</body>
</html>