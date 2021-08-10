<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');

include('connection.php');
if(isset($_SESSION['UNAME']))
{
  $username_profile=$_SESSION['UNAME'];
  $profileq="SELECT * from uregistration where username='$username_profile'";
  $profileqrun=mysqli_query($con,$profileq);
  $row1=mysqli_fetch_array($profileqrun);
}

//logout
if(isset($_GET['logout']))
{
  session_unset();
  session_destroy();
  echo "<script > alert('loged out sussefully..') </script>";
}

mysqli_close($con);
?>

<h2>Welcome to user proile</h2>
<!DOCTYPE html>
<html le="eng">
<head>
	<title>personal_info</title>
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
        transform: scale(1.06); 
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
            <i class="fa fa-shopping-cart">
            <?php
                if(isset($row1))
                  echo $row1['cart']." Item";
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

  <script>
    $(document).ready(function(){
      $("#user_profile").click(function(){
        window.location.href = "user_profile.php";
     });
    });
  </script>

 <!--Popup form start-->
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
                  <p for="username"><b>Username:</b></p>
                  <p><input type="text" style="width:100%;" placeholder="Enter Username" name="username" required></p>
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

<h2>Welcome to personal information page</h2>
<div class="col-sm-12 card" style="background-color: blue;">
  
</div>
<br>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-lg-4 mb-3">
            <div class="card mb-3 ">
                <div class="card-body" style="height: 250px">
                    <h5 class="card-title">Welcome User</h5><hr>
                    <img class="mySlides" src="./Image/<?php echo $row1['photo'];?>" style="text-align:center ;border-radius: 50% ;height: 120px;width:150px"><b>  Hii <?php echo $row1['username'];?></b>
                </div>
            </div>
            <div class="card mb-3 " style="height: 375px;">
                <div class="card-body" >
                  <ul>
                    <h3>Content</h3><br>
                    <li><a href="edit_info.php">Edit Information</a></li>
                    <li><a href="personal_info.php">Personal Information</a></li>
                    <li><a href="my_order.php">My Order</a></li>
                    <li><a href="payment.php">Payment </a></li>
                    <li><a href="wishlist.php">Wishlist</a></li>
                  </ul>
                </div>
            </div>
        </div> 
        <div class="col-sm-6 col-lg-8 mb-3">
            <div class="card mb-3 ">
                <div class="card-body" >
                  <div style="text-align: center;">
                      <img class="mySlides" src="./Image/<?php echo $row1['photo'];?>" style="border-radius: 50% ;height:200px;width:50%">
                  </div><br>
                    <div>Name: <h4 ><?php echo $row1['name'];?></h4></div><hr>
                    <div>Last name: <h4 ><?php echo $row1['lastname'];?></h4></div><hr><br>
                    <div>Date of Birth: <h4 ><?php echo $row1['udob'];?></h4></div><hr><br>
                    <div>Gander: <h4><?php echo $row1['gander'];?></h4></div><hr><br>
                    <div>Mobile No: <h4><?php echo $row1['umob'];?></h4></div><hr><br>
                    <div>Email Address: <h4><?php echo $row1['uemail'];?></h4></div><hr><br>
                    <div><b>Address:</b>
                      <div>Village/Area: <label><h5><?php echo $row1['village'];?></h5></label></div>
                      <div>Town: <label><h5><?php echo $row1['town'];?></h5></label></div>
                      <div>Pin No: <label><h5><?php echo $row1['pinno'];?></h5></label></div>
                      <div>District: <label><h5><?php echo $row1['district'];?></h5></label></div>
                      <div>State: <label><h5><?php echo $row1['state'];?></h5></label></div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <h2>This is footer</h2>
  </div>
</body>
</html>