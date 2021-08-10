<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');
include('connection.php');
if(isset($_POST['submit']))
{
     $name=$_POST['name'];
     $lastname=$_POST['lastname'];
     $uemail=$_POST['uemail'];
     $umob=$_POST['umob'];
     $udob=$_POST['udob'];
     $upassword=$_POST['upassword'];
     $ucnfrmpswrd=$_POST['ucnfrmpswrd'];
     //set session
     $_SESSION['UNAME']=$name;
     $_SESSION['UPASS']=$upassword;

     // echo $username;
     if ($upassword==$ucnfrmpswrd) 
     {

          // echo $name;echo $lastname;echo $uemail;echo $umob;echo $udob;echo $upassword;
          $p="SELECT *from uregistration where username='$name'";
          $result = mysqli_query($con,$p);

          if(mysqli_num_rows($result)>0)
          {
               echo '<script type="text/javascript">';
               echo ' alert("Username already exist...")'; 
               echo '</script>';
               echo "User already exist try another username";
          }
          else
          {
               $q="INSERT INTO uregistration(name,lastname,username,uemail,umob,udob,upassword) 
               values('$name','$lastname','$name','$uemail','$umob','$udob','$upassword')";
               $q1=mysqli_query($con,$q);
               if($q1)
               echo "<h2>Registered successfully...</h2>";
               else echo "not Register";
          }
     }
     else{
          // echo "Oops1.</br>";
          // echo "Your password does not match confirm password again";
          echo '<script> alert("password does not match"); </script>';
     }

}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>register1</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .nav-item{
        padding-right: 15px;  
      }
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 0%; 
    border-bottom-left-radius: 10% 0%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
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

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p>
            <input type="submit" name="" onclick="goto()" value="Login"/><br/>
            <script type="text/javascript">
                 function goto(){
                    window.location.assign("login.php");
                 }
            </script>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Register and be Friend</h3>
                    <form action="register.php" method="post">
                        <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="First Name *" value="" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname" aria-pressed="false" autocomplete="off" placeholder="Last Name *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" name="udob" placeholder="Date Of Birth *" value="" />
                            </div>
                            <div class="form-group">
                                <select class="form-control">
                                    <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                    <option>What is your Birthdate?</option>
                                    <option>What is Your old Phone Number</option>
                                    <option>What is your Pet Name?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="answer" aria-pressed="false" autocomplete="off" placeholder="Enter Your Answer *" value="" />
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" aria-pressed="false" name="uemail" autocomplete="off" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="umob" aria-pressed="false" autocomplete="off" class="form-control" placeholder="Your Mobile *" value="" />
                            </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline"> 
                                        <input type="radio" name="gender" value="male" checked>
                                        <span> Male </span> 
                                    </label>
                                    <label class="radio inline"> 
                                        <input type="radio" name="gender" value="female">
                                        <span>Female </span> 
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="upassword" class="form-control" placeholder="Password *" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="off" onchange="validate()" value="" required />
                                <span id="message1"></span>
                            </div>
                            <script type="text/javascript">
                                function validate(){
                                    var res = "FALSE";
                                    var str = document.getElementById("password").value; 
                                        if (str.match(/[a-z]/g) && str.match( 
                                                /[A-Z]/g) && str.match( 
                                                /[0-9]/g) && str.match( 
                                                /[^a-zA-Z\d]/g) && str.length >= 8) 
                                            // res = "TRUE";
                                            document.getElementById("message1").innerHTML = "<span style='color:green;'>Password is Unique</span>";
                                        else 
                                        document.getElementById("message1").innerHTML = "<span style='color:red;'>Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>"; 
                                }
                            </script>
                            <div class="form-group">
                                <input type="password" id="confirm_password" name="ucnfrmpswrd" class="form-control"  placeholder="Confirm Password *" onchange="check()" value="" required />
                                <span id='message'></span>
                            </div>
                            <script type="text/javascript">
                                function check() {
                                    if(document.getElementById('password').value ===document.getElementById('confirm_password').value) {
                                        document.getElementById('message').innerHTML = "<span style='color:green;' >Password match</span>";

                                    } else {
                                        document.getElementById('message').innerHTML = "<span style='color:red;' >Password not match</span>";
                                    }
                                }
                            </script>
                            <input type="submit" class="btnRegister" name="submit" value="Register"/>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
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