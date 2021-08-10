<?php
session_start();

$con=mysqli_connect('localhost','root','','brm_db',"3308");

mysqli_select_db($con,'brm_db');
echo "hii";
?>

<!DOCTYPE html>
<html>
 <head>
    <title> Data Manage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link rel="stylesheet" type="text/css" href="./CSS/cart.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>
 <nav class="navbar navbar-expand-md navbar-light bg-info fixed-top" >
    <a id="logo" class="navbar-brand" href="libhome.php" style="margin-bottom: -6px;margin-top: -7px"><img src="./Image/logo.jpg" width="60px" height="40px"></a>
    <button type="button" id="nav1" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="nav">
      <ul class="navbar-nav" >
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold px-3" href="libhome.php">HOME</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold px-3" href="libinsertForm.php">INSERT</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold px-3" href="libdeleteForm.php">DELETE</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold px-3" href="libupdateForm.php">UPDATE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light font-weight-bold px-3" href="libviewForm.php">VIEW</a>
        </li> 
        <li class="nav-item dropdown" data-toggle="dropdown" data-hover="dropdown">
            <a  class="nav-link text-light font-weight-bold px-3 dropdown-toggle" href="#">MORE</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">About Us</a>
              <a class="dropdown-item" href="#">Developer</a>
              <a class="dropdown-item" href="#">Link 3</a>
              <a class="dropdown-item" href="#">Link 3</a>
              <a class="dropdown-item" href="#">Link 3</a>
            </div>
        </li>
        <script type="text/javascript">
                  $('ul li').hover(function() {
                  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                }, function() {
                  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                });
        </script>
      </ul>
      <ul class="navbar-nav" >
        <li class="nav-item " id="pull">  
            <a class="nav-link text-light  font-weight-bold px-3 login " href="#" id="<?php if(!isset($_SESSION['UNAME'])) echo 'myBtn'; else echo 'user_profile';?>"> 
              <?php 
              if(isset($_SESSION['UNAME'])) 
                echo "HELLO!".$_SESSION['UNAME']; 
              else 
                echo "LOGIN"; 
              ?>
            </a>
        </li>
        <li class="nav-item ">  
            <a class="nav-link text-light font-weight-bold px-3" href='libhome.php?logout=true' >
                <?php if(isset($_SESSION['UNAME'])) echo "LOGOUT"; ?>
            </a>
        </li>
      </ul>
    </div>
</nav><br><br><br>

 <h1>Database Management</h1>
 <br>
<div class="container ">
  <form action="#" method="post">
    <div class="card-deck justify-content-between">
      <div class="col-sm-6 card " >
          <div class="card-header font-lg font-weight-bold text-center">
            <h4>Book Information</h4>
          </div>
          <div class="card-body">
                <label for="cname">Title Name :</label>
                <input type="text" id="cname" name="cardname" aria-pressed="false" autocomplete="off" style="width: 200px;" ><br><br>
                <label for="cname"> <i class="fa fa-user"></i>Author Name :</label>
                <input type="text" id="cname" name="cardname" aria-pressed="false" autocomplete="off" style="width: 200px;" ><br><br>
              <div class="text-align">
                <label for="expmonth">Issue Date :</label>
                <input type="date" style="width: 210px;" id="expmonth" name="expmonth" aria-pressed="false" autocomplete="off" ><br>
                <label for="submitdate">Submit Date :</label>
                <input type="date" style="width: 200px;" id="expmonth" name="expmonth" aria-pressed="false" autocomplete="off" >
              </div>
          </div>
          <div class="card-footer">
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <!-- </div> -->
          <!-- jhkhj -->
      </div>
      <div class="col-sm-6 card " >
          <div class="card-header font-lg font-weight-bold text-center">
            <h4>Student Information</h4>
          </div>
          <div class="card-body">
                <label for="cname"> <i class="fa fa-credit-card"></i>ID Card No :</label>
                <input type="text" id="cname" name="cardname" aria-pressed="false" autocomplete="off" style="width: 200px;" ><br><br>
              <div class="text-align">              
                <label for="cname"> <i class="fa fa-user"></i>Name of Student :</label>
                <input type="text" id="cname" name="cardname" autocomplete="off" style="width: 130px;margin-right: 10px;" >
                <label for="ccnum">Roll No :</label>
                <input type="text" id="ccnum" name="cardnumber" autocomplete="off"  style="width: 145px;" >
              </div>
              <div class="text-align">
                <label for="cname">Course :</label>
                <input type="text" id="cname" name="cardname" autocomplete="off"  style="width: 150px;margin-right: 50px;" >
                <label for="cname">Branch :</label>
                <input type="text" id="cname" name="cardname" autocomplete="off"  style="width: 165px;"  >              
              </div>
            </div>
            <div class="card-footer">
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
      </div>
    </div>
  </form>
</div>

 <!-- <form action="carsmanage.php" method="post">
     
  </form> -->
  <h4> See Product <a href="product.php" >click here</a></h4>

 </body>
</html>