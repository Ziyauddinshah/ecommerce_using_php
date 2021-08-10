<?php
session_start();

// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');

include('connection.php');

$q2=0;$r=-1;
if(isset($_POST['submit']))
{
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	// echo $uname;
	$q="SELECT * from uregistration where username='$uname' and uemail='$email'";
	$q1=mysqli_query($con,$q);
	$q2=mysqli_fetch_array($q1);
	if($q2)
	{
		// $Password=$q2['upassword'];
		// $name=$q2['name'];
		// $to       = $email;
		// $subject  = 'Testing sendmail.exe'; 
		// $message  = 'Hi <b>'.$name.'</b> your <b>Password</b> is :<b>'.$Password.'</b>. And you just received an email using sendmail!';
		// $headers  = 'From: ziyauddin270499@gmail.com' . "\r\n" .
		//             'MIME-Version: 1.0' . "\r\n" .
		//             'Content-type: text/html; charset=utf-8';
		// if(mail($to, $subject, $message, $headers))
			$r=1;
	    // echo "<script > alert('sent sussefully..') </script>";
		    // echo "Email sent";
		// else
		// 	$r=2;
	    // echo "<script > alert('failed sussefully..') </script>";
	    // echo "Email sending failed";
	}
	else $r=0;
	// echo $q2['upassword'];

}
// else
// echo "string";

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>forgot_page</title>
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
	<div style="height: 100px;">	
	</div>
	<div class="container ">
		<div class="card-deck justify-content-center">
			<div class="col-sm-5 card " style="background-color:#e6f0ff;">
				<div class="card-header text-center">
					<text style="font-size: 30px;color: white;">Enter Bellow</text>
				</div>
				<div class="card-body">
					<form action="#" method="post">
						<text><i class="fa fa-user"></i> username:</text>
						<input type="text" required style="border:1px solid white;border-radius: .5rem;width: 100%" name="uname" placeholder=" username or name"><span class="uname"></span><br><br>
						<text><i class="fa fa-envelope"></i> Email:</text>
						<input type="text" required style="border:1px solid white;border-radius: .5rem;width: 100%" name="email" placeholder=" registered email"><span class="email"></span><br><br>
						<input type="submit" style="border:2px solid black;border-radius: .5rem" name="submit" value="Submit">
					</form>
				</div>
				<div class="card-footer">
					<span>
						<?php 
							if($r==1)
								echo "Password :<b style='color:green'>".$q2['upassword']."</b>";
							else if($r==0)
								echo "<text style='color:red'>failed..</text>";
						?>
					</span>
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