<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// mysqli_select_db($con,'ecommerce');

include('connection.php');
if(isset($_GET['pid']))
{
	$pro_id=$_GET['pid'];
	$q1="SELECT * from product where pid='$pro_id' ";
	$result1=mysqli_query($con,$q1);
	$count=mysqli_num_rows($result1);
	$row1=mysqli_fetch_array($result1);
	$name=$row1['pname'];
	$price=$row1['pprice'];
	$specification=$row1['specification'];
	$stock=$row1['stock'];
  $image=$row1['image'];
}
else
{
  echo "Item not set..";
}

$item=0;$uname=0;
if(isset($_SESSION['UNAME']))
{
  $username=$_SESSION['UNAME'];
  $q2="SELECT * from uregistration where username='$username' ";
  $result2=mysqli_query($con,$q2);
  $count=mysqli_fetch_array($result2);
}
//echo $uname;
if(isset($_POST['logout']))
{
  session_unset();
  session_destroy();
  echo "<script > alert('loged out sussefully..') </script>";
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="./CSS/cart.css" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <style >
      .zoom:hover {
        transform: scale(1.08); 
      }
      .zoom {
        transition: transform .2s;
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
            <i class="fa fa-shopping-cart">
            <?php
                if(isset($count))
                  echo $count['cart']." Item";
                else
                  echo "no Item";
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
	<div class="header">
		
	</div>
	<div class="container mt-3"> 
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="height: 550px;">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login Heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" >
          <form  action="product.php" method="post" >
              <div class="table">
                  <p for="uname"><b>Username:</b></p>
                  <p><input type="text" style="width:100%;" placeholder="Enter Username" name="uname" required></p>
                  <p for="psw"><b>Password:</b></p>
                  <p><input type="password" style="width:100%;" placeholder="Enter Password" name="upassword" required></p><br>
                  <button class="b1" style="width:100%;" type="submit" id="myBtn1" onclick="action();">Login</button><br><br>
                  <label><input type="checkbox" checked="checked" name="remember"> Remember me </label>
                  <span style="display:inline-block; width: 200px;"></span>
                  <label> New User?<a href="register.php">Register</a></label>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <span style="display:inline-block; width: 260px;"></span>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </div>
    </div>
  </div>  
</div>
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
 });
});
</script>
  <!--Popup form end-->
<br>
<!-- <div class="col-sm-12 card" style="text-align: center;background-color: #bbb;">
    <h1>Welcome to Automobile Management</h1>
    <p>This is Product Detail Page</p> 
</div><br> -->
	<div class="container">
	  <div class="card-deck">
	    <div class="col-md-4 " style="height: 400px ;border-style:none;">
	    	<div class="card-body" style="margin-top: -20px;">
	    		<img class="zoom" style="border-radius: 1%;" src="./Image/<?php echo $image;?>" width="80%" height="400px">
	    	</div>
	    </div> 
	    <div class="col-md-8 " style="border-style: none;background-color:#e6f0ff;">
	    	<div class="card-body" >
		    	<div >
		    		<label><h5>Product Name:</h5></label>
		    		<label><p><?php echo $name;?></p></label><br>
		    		<label><h5>Price of Product:</h5></label>
		    		<label><p><i class="fa fa-inr"></i><?php echo " ",$price;?></p></label><br>
		    		<label><h5>Offer:</h5></label>
		    		<label><p><i class="fa fa-inr"> <del>8609</del> </i></p></label><br>
		    		<label><h5>Specification:</h5></label>
		    		<label><p><?php echo $specification;?></p></label><br>
		    		<label><h5>Stock:</h5></label>
		    		<label><p><?php echo $stock;?></p></label><br>
		    	</div>	<hr>
	    		<div class="text-center"> 
	                <!--<a href="pdetail.php?pid=<php echo $pro_id;?>" class="btn btn-primary">Shop More</a>-->
                  <a href="ddetail.php?pid=<?php echo $pro_id;?>" class="btn btn-primary">Dealer </a>
	                <a href="product.php" class="btn btn-primary">Shop More</a>
	                <a href="#" id="cart<?php echo $pro_id;?>" data-id="<?php echo $pro_id;?>" class="btn btn-primary abc"><i class="fa fa-shopping-cart"></i>Add to Cart </a>
	           </div> 
	    	</div>
        <script type="text/javascript">
        $(document).ready(function(){
          $(document).on("click",".abc",function(){
            var addcartid = $(this).data("id");
            $.ajax({
              url:"addcart.php",
              type:"post",
              data:{pid:addcartid},
              success:function(data){
                if(data>3)
                {
                  var z2=data;
                  $("#cart"+addcartid).html("Added to Cart").css("background-color","green");
                  $("#navcartitem").html(z2+" Item");
                }
                // alert('Added Successfully');
                else if(data==3)
                {
                  alert("login first");
                  location.href='login.php' ;
                }
                else if(data==2)
                {
                  alert("Product id is not set");
                  // alert(data);
                }
                else if(data==1)
                {
                  alert("Already added");
                }
                else
                  alert("Not added");
              }
            });
          });
        });
      </script>
	    </div>  
	  </div>
	</div><br><br>
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