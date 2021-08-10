<?php
session_start();

// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');

include('connection.php');

if(isset($_POST['btn']))
{
  $uname1=$_POST['username'];
  $upassword1=$_POST['upassword'];
  if(!isset($_SESSION['UNAME']))
{
  if($uname1 && $upassword1)
  {
    $p1="SELECT * from uregistration where username='$uname1' AND upassword='$upassword1'";
    $result1 = mysqli_query($con,$p1);
    $row=mysqli_fetch_array($result1);
    if(mysqli_num_rows($result1))
    {
        $_SESSION['UNAME']=$uname1;
        $_SESSION['UPASS']=$upassword1;
        echo '<script type="text/javascript">';
        echo ' alert("login successfully...")'; 
        echo '</script>';
        //echo 'Welcome!<b>'.$row['username']. "</b> you are in...";
        echo "<script > location.href='product.php' </script>";
    }
    else
    {
        echo '<script type="text/javascript">';
        echo ' alert("Wrong username or password...")'; 
        echo '</script>';
        //echo "You have intered wrong username or password";
        // echo "<script > location.href='login.php' </script>";
    }
  }
  else
  {
      echo '<script type="text/javascript">';
      echo ' alert("You have inserted wrong information...")'; 
      echo '</script>';
  }
}
elseif($_SESSION['UNAME']==$uname1 and $_SESSION['UPASS']==$upassword1)
{
  //echo "You have intered wrong username or password";
  echo '<script type="text/javascript">';
  echo ' alert("already loged in..")'; 
  echo '</script>';
  // echo "<script > location.href='product.php' </script>";
}
else{
  //echo '<b>'.$uname1."</b> you are already login";
  echo "<script > location.href='product.php' </script>";
}
}


if(isset($_REQUEST['logout']))
{
  session_unset();
  session_destroy();
  echo "<script > location.href='product.php' </script>";
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="./CSS/cart.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

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
  </nav><br><br>

  <script>
    $(document).ready(function(){
      $("#user_profile").click(function(){
        window.location.href = "user_profile.php";
     });
    });
  </script>

  <br>
  <h2 style="text-align: center;">Login Form</h2>
  <br>
  <div class="container" >
      <div class="col-sm-6 card-login mx-auto text-center " style="background-color:#e6f0ff;height: 350px">
          <div class="card-header mx-auto bg-dark">
              <!-- <span> <img src="https://amar.vote/assets/img/amarVotebd.png" class="w-50" alt="Logo"> </span><br/> -->
              <span class="logo_title mt-5 text-primary font-weight-bold px-3"> Login Dashboard </span>
          </div>
          <div class="card-body">
              <form action="login.php" method="post">
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text" ><i class="fas fa-user"></i></span>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      <input type="password" name="upassword" class="form-control" placeholder="Password">
                  </div>        
                  <div class="text-center">
                      <div class="form-group form-check float-left">
                          <input class="form-check-input " type="checkbox" name="remember"> Remember me   
                      </div>
                      <!-- /*/*<span style="padding-right: 310px"> </span>*/*/ -->
                      <div class="form-group float-right">
                          <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                      </div>
                  </div>        
              </form>
          </div>
      </div>
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
