<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');
include('connection.php');
if(isset($_SESSION['UNAME']))
{
  echo 'Welcome!<b>'.$_SESSION['UNAME']. "</b> you are in...";
  $uname1=$_SESSION['UNAME'];
  $q1="SELECT * from uregistration where username='$uname1'";
  $result1=mysqli_query($con,$q1);
}
elseif(!isset($_SESSION['UNAME']))
{ 
  if(isset($_POST['username']) and isset($_POST['upassword']))
  {
    $uname1=$_POST['username'];
    $uname2=$_POST['username'];
    $upassword1=$_POST['upassword'];
    $q2="SELECT *from uregistration where username='$uname1' AND upassword='$upassword1'";
    $result2 = mysqli_query($con,$q2);
    $row=mysqli_fetch_array($result2);
    if(mysqli_num_rows($result2))
    {  
        $_SESSION['UNAME']=$uname1;
        $_SESSION['UPASS']=$upassword1; 
        echo '<script type="text/javascript">';
        echo ' alert("login successfully...")'; 
        echo '</script>';
        echo 'Welcome!<b>'.$row['username']. "</b> you are in...";

        $q3="SELECT * from uregistration where username='$uname2'";
        $result3=mysqli_query($con,$q3);
    }
    else
    {
        echo '<script type="text/javascript">';
        echo ' alert("Wrong username or password...")'; 
        echo '</script>';
        echo "You have intered wrong username or password";
    }
  } 
  else
  {
      echo '<script type="text/javascript">';
      echo ' aler("You have inserted wrong information...")'; 
      echo '</script>';   
      //echo "<script> location.href='product.php' </script>";
  }
}

//searching
$count=0;$q=NULL;
if(isset($_POST['search']))
{
  $search=$_POST['search'];
  $search=preg_replace("#[^0-9a-z]#i", "", $search);
  $q1="SELECT * from product where pname like '%$search%' or pprice like '%$search%' or specification like '%$search%'";
  $q=mysqli_query($con,$q1);
  $count=mysqli_num_rows($q);
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
<!DOCTYPE html>
<html le="eng">
<head>
  <title> Product1 </title>
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

  <!--Popup form start-->
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
                  <button class="b1" style="width:100%;" type="submit">Login</button><br><br>
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
    <p>This is Product Page</p> 
</div><br><br> -->

<div>
  <div class="w2-content w2-section" style="height:220px;padding-top:10px;">
    <img class="mySlides" src="./Image/infinix.jpg" style="height: 200px;width:100%">
    <img class="mySlides" src="./Image/oppo.jpg" style="height: 200px;width:100%">
    <img class="mySlides" src="./Image/micromax.jpg" style="height: 200px;width:100%">
  </div>
  <script>
  var myIndex = 0;
  carousel();
  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
  }
  </script>
</div>
<br><br>

<div class="container-fluid">
  <?php if($count==0) echo "<h3> Oops.. no search found </h3> <br>" ?>
  <?php 
  if($q)
  {
   while($row=mysqli_fetch_array($q))
   {
    $pro_id=$row['pid'];
    ?>
   <div class="row">
      <div class="col-sm-4 "  > 
        <img class="zoom rounded mx-auto d-block"  src="<?php echo 'Image/'.$row['image']; ?>" style="border-radius: 1%" height="450px" width="70%" />
      </div>
      <div class="col-sm-4 " style="background-color:#e6f0ff;" ><!-- style="background-color:lavenderblush;"-->
             <p>Name of Product:</p>
             <h4><p><?php echo $row['pname']; echo " ", $pro_id;?></p></h4>
             <p>Price of Product:</p>
             <h4><p><?php echo $row['pprice']; ?></p></h4>
             <p>Stock of Product:</p>
             <h4><p><?php echo $row['stock']; ?></p></h4><hr>
           <div class="text-center"> 
                <a href="pdetail.php?pid=<?php echo $pro_id;?>" class="btn btn-primary">View Details </a>  
                <a href="cartwork.php?pid=<?php echo $pro_id;?>" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i>Add to Cart </a>
           </div> 
      </div>
      <div class="col-sm-4 " style="background-color:#e6f0ff;"><!--  style="background-color:pink;" -->
          <div>
              <b><p>Specification: </p></b>
              <P><?php echo $row['specification']; ?></P>
              <p>spcfctn3  </p>
          </div><hr>
          <div>
              <b><p>Dealer Details..</p></b>
              <p>Dealer Name: </p>
              <p>Address: </p>
          </div>
          <div class="text-center"> 
              <a href="ddetail.php?pid=<?php echo $pro_id;?>" class="btn btn-info">Dealer </a>  
              <a href="productrate.php?pid=<?php echo $pro_id;?>" class="btn btn-info" >Rate product </a>
          </div> 
      </div>
    </div><hr>
    <?php
   }
 }
  ?>
  </div>
  <h4>Go to Panel:<a href="controlpnl.php">click here</a></h4>
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