<?php
session_start();

// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');

include('connection.php');

if(isset($_SESSION['UNAME']))
{
  // echo "Welcome to product page..";
  $uname1=$_SESSION['UNAME'];
  $q1="SELECT * from uregistration where username='$uname1'";
  $result1=mysqli_query($con,$q1);
  $row1=mysqli_fetch_array($result1);

  $q2="SELECT * from pcart where username='$uname1'";
  $result2=mysqli_query($con,$q2);
  // $row2=mysqli_fetch_array($result2);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>payment_page</title>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="./CSS/cart.css" />
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css">
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
                  echo $row1['cart']." item";
                else
                  echo "no item";
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
  <div class="col-sm-3 " style="text-align:center;">
  	<?php
  		if(isset($_SESSION['UNAME']))
  			echo "<h3>Welcome : <b>".$_SESSION['UNAME']."</b></h3>";
  		else
  			{
  				echo "You are not login ";
  				?>
  				<a class="nav-link text-dark  font-weight-bold px-3 " href="#" id="myBtn1">Click here</a>
  				<?php
  			}
  	?>
  </div>

  <script>
    $(document).ready(function(){
      $("#myBtn1").click(function(){
        $("#myModal").modal();
     });
    });
  </script>

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
            <form  action="login1.php" method="post" >
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
  <!-- <br>
  <div class="container">
      <div class="col-sm-4 ">
        <h5 class="text-align">Responsive address Form</h5>
      </div>
  </div> -->

<!-- <p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p> -->
  <div class="container">
    <form action="payment1.php" method="post">
        <div class="card-deck">
      	  <div class="col-sm-6 card " style="background-color:#e6f0ff;" id="billing">
              <h3>Billing Address</h3><br>
              <label for="fname"><i class="fa fa-user"></i> Full Name:</label>
              <input type="text" id="fname" name="bfirstname" placeholder="John M. Doe" required><br>
              <label for="mobile"><i class="fa fa-phone"></i> Mobile:</label>
              <input type="text" id="mobile" name="bmobile" placeholder="1234567890" required><br>
              <label for="email"><i class="fa fa-envelope"></i> Email:</label>
              <input type="text" id="email" name="bemail" placeholder="john@example.com" required><br>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address:</label>
              <input type="text" id="adr" name="baddress" placeholder="542 W. 15th Street" required><br>
              <label for="city"><i class="fa fa-institution"></i> City:</label>
              <input type="text" id="city" name="bcity" placeholder="New York" required><br>
              <div class="text-align">
              	<label for="state">State :</label>
  	            <input type="text" style="width: 100px;" id="state" name="bstate" placeholder="u. p.">
  	            <label for="pin" style="margin-left: 87px;">Pin no :</label>
  	        	  <input type="text" style="width: 100px;" id="pin" name="bpin" placeholder="352">
              </div>
          </div>
          <div class="col-sm-6 card " style="background-color:#e6f0ff;" id="shipping">
              <h3>Shipping Address</h3><br>
              <label for="fname"><i class="fa fa-user"></i> Full Name:</label>
              <input type="text" id="fname" name="sfirstname" placeholder="John M. Doe"><br>
              <label for="mobile"><i class="fa fa-phone"></i> Mobile:</label>
              <input type="text" id="mobile" name="smobile" placeholder="1234567890"><br>
              <label for="email"><i class="fa fa-envelope"></i> Email:</label>
              <input type="text" id="email" name="semail" placeholder="john@example.com"><br>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address:</label>
              <input type="text" id="adr" name="saddress" placeholder="542 W. 15th Street"><br>
              <label for="city"><i class="fa fa-institution"></i> City:</label>
              <input type="text" id="city" name="scity" placeholder="New York"><br>
              <div class="text-align">
              	<label for="state">State :</label>
  	            <input type="text" style="width: 100px;" id="state" name="sstate" placeholder="u. p.">
  	            <label for="pin" style="margin-left: 87px;">Pin no :</label>
  	        	<input type="text" style="width: 100px;" id="pin" name="spin" placeholder="352">
              </div>
              
              <label>
      		      <input type="checkbox" id="check" onclick="copyaddress(this.form)" name="sameadr"> Shipping address same as billing
      		    </label>
    		    <script type="text/javascript">
    		    		function copyaddress(form){
    		    			form.sfirstname.value = form.bfirstname.value;
    		    			form.smobile.value = form.bmobile.value;
    		    			form.semail.value = form.bemail.value;
    		    			form.saddress.value = form.baddress.value;
    		    			form.scity.value = form.bcity.value;
    		    			form.sstate.value = form.bstate.value;
    		    			form.spin.value = form.bpin.value;
    		    		}
    		    </script>
          </div>
          <!-- <div class="col-sm-2 card bg-light">
    		    <div class="container">
    		      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> 
    		      	<b><?php
    		      	     if(isset($row1))
    		      	     	echo $row1['cart'];
    		      	     else
    		      	     	echo "0 item";
    		       		?>	
    		       	</b></span>
    		       </h4> <br>
    		      <?php
    		       $k=0; 
    		       if(isset($_SESSION['UNAME']))
    		       {
    		        
    		      	while($row2=mysqli_fetch_array($result2)){

    		      		?>
    		      		<p><a href="#"><?php echo $row2['pname'];?></a>  <span class="price" style="margin-left: 15px;"><?php echo $row2['pprice'];?></span></p>
    		      		<?php
    		      		$k=$k+$row2['pprice'];
    		      	}
    		       }
    		       else
    		       {
    		       	?>
    		       	<p><a href="#">Product 2</a> <span class="price" style="margin-left: 30px;">$5</span></p>
    			      <p><a href="#">Product 3</a> <span class="price">$8</span></p>
    			      <p><a href="#">Product 4</a> <span class="price">$2</span></p>
    		      <?php
    		       }
    		      ?>

    		      <hr>
    		      <p>Total <span class="price" style="color:black;margin-left: 20px;"><b><?php echo $k;?></b></span></p>
    		    </div>
  		    </div> 
   -->
        </div>
      <br>
      <div class="text-center"> 
            <a href="user_profile.php" class="btn btn-primary">Back</a>  
            <!-- <a href="#" class="btn btn-info" >Continue </a> -->
            <!-- <button type="submit" value="Continue to checkout" class="btn btn-primary">Back</button> -->
            <input type="submit" value="Continue" name="submit" class="btn btn-primary">
        </div>  
    </form>
  </div><br>
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
