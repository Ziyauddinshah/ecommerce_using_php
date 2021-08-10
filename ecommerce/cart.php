<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// mysqli_select_db($con,'ecommerce');
include('connection.php');
$z=0;

if(isset($_SESSION['UNAME']))
{
	$username=$_SESSION['UNAME'];
	$upassword=$_SESSION['UPASS'];
	// echo 'Welcome!<b>'.$username. "</b> you are in...";
	// if(isset($_GET['pid']))
	// {
	// 	$pid=$_GET['pid'];
	// 	$p1="SELECT * from product where pid='$pid'";
	// 	$result1=mysqli_query($con,$p1);
	// 	$row1=mysqli_fetch_array($result1);
	// 	$pname=$row1['pname'];
	// 	$pprice=$row1['pprice'];
	// 	$stock=$row1['stock'];
	// 	$image=$row1['image'];
	// 	$specification=$row1['specification'];

	// 	$p2="INSERT into pcart(pid,pname,pprice,stock,image,specification,username) values($pid,'$pname',$pprice,$stock,'$image','$specification','$username')";
	// 	$result2=mysqli_query($con,$p2);

	// 	$p3="SELECT * FROM uregistration where username='$username' and upassword='$upassword'";
	// 	$result3=mysqli_query($con,$p3);
	// 	$row3=mysqli_fetch_array($result3);
	// 	//$row3['cart']++;
	// 	$z=$row3['cart']+1;

	// 	$p4="UPDATE uregistration SET cart ='$z' where username='$username'";
	// 	$result4=mysqli_query($con,$p4);
	// }
	// else
	// {
		$p5="SELECT * FROM uregistration where username='$username' and upassword='$upassword'";
		$result5=mysqli_query($con,$p5);
		$row5=mysqli_fetch_array($result5);
		$z=$row5['cart'];

		$p6="SELECT *from pcart where username='$username'";
		$result6 = mysqli_query($con,$p6);
		//$row=mysqli_num_rows($result6);
		//echo $row;
	// }
}
else
{
	echo "<script > alert('You are not loged in ') </script>";	
}

if(isset($_GET['logout']))
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
	  <title>cart</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <!-- <link rel="stylesheet" type="text/css" href="./CSS/cart.css" /> -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	  <style >
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
	            <i class="fa fa-shopping-cart" id="item">
	            <?php
	                if($z)
	                  echo $z." Item";
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
	          <span class="psw">Forgot <a href="forgot_page.php">password?</a></span>
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
	<div class="container">
		<div class="col-md-12 card" style="background-color: #00cc88;">
			<ul class="breadcrumb" style="background-color: #00cc88;" >
				<li><a href="product.php"  class="fa fa-chevron-left"> View Product </a></li>
				<li > Cart</li>		
			</ul>
		</div><br>
		<div class="card-deck">
			<div class="col-md-9 card bg-white" id="cart" style="background-color: white;" >
				<div class="box">
				<!--	<form action="cart.php" method="post" enctype="multipart-form-data">-->
						<h1>Shopping Cart</h1>
						<p class="text-muted"> welcome <?php 
						if(isset($username))
						echo "<b>".$username."</b>"."!";
						else echo "<h4>Login first:<a href='login.php'>click here</a></h4>"; ?> <?php echo "<h3 id='h3'>".$z."</h3>"; ?> product are in your cart </p>
						<div class="table-responsive"><!--table responsive start-->				
							<table class="table">
								<thead>
									<th colspan="2">Product</th>
									<th>Stock</th>
									<th>Price</th>
									<th colspan="1"> Sub total </th>
									<th >Delete</th>		
								</thead>
								<tbody>
								<?php
								    $k=0;
								    if(isset($result6))
								    {
										while($row6=mysqli_fetch_array($result6))
										{
										 ?>
									<!-- <form action="cart.php?pid1=<?php echo $row6['pid'];?>" method="post">	 -->
										<tr>
											<td><img src="./Image/<?php echo $row6['image']; ?>" width="auto" height="150px"></td>
											<td> <b><?php echo $row6['pname']; ?></b> </td>
											<td><?php echo $row6['stock']; ?></td>
											<td>INR <?php echo $row6['pprice']; ?></td>
											<td>INR <?php echo $row6['pprice']; ?></td>	
											<td><button type="submit" data-value="<?php echo $row6['pprice']; ?>" id="dltbtn" class="btn btn-info fa fa-trash" data-id="<?php echo $row6['pid'];?>"  ></button></td>
										</tr>
									<!-- </form> -->
										<?php
										$k=$k+$row6['pprice'];

										}
									}
									else echo "<b>You are not login! Login first</b><br><br>";
								?>
								<script type="text/javascript">
									$(document).ready(function(){
										$(document).on("click","#dltbtn",function(){
											if(confirm("Do u really want to delete this?"))
											{
												var x=$(this).data("id");
												var y=$(this).data("value");
												// alert(y);
												var element=this;
												$.ajax({
													url:"deletecart.php",
													type:"POST",
													data:{pid1:x},
													success:function(data){
														if(data)
														{
															var z1=data;
															$(element).closest("tr").fadeOut(10);
															$("#h3").html(z1);
															$("#item").html(" "+z1+" Item");	
														}
														else{
															alert("can not delete this");
														}	
													}
												});
											}
										});
									});
								</script>
								</tbody>
								<tfoot>
									<th colspan="5">total </th>
									<th colspan="2">INR <span id="check"><?php echo $k; ?></span></th>
								</tfoot>
							</table>
						</div><!--table responsive end-->
						<div class="box-footer"><!--box-footer start-->
							<div class="pull-left card" style="background-color:#ff80df;">
								<a href="product.php" class="btn btn-default">
									<i class="fa fa-chevron-left"></i>Continue Shopping
								</a>	
							</div>
							<div class="pull-right " >
								<a href="payment1.php" class="btn btn-primary">
									Checkout <i class="fa fa-chevron-right"></i>	
								</a>
							</div>		
						</div><br><!--box-footer end-->
				<!--	</form>-->
				</div><hr>
			</div>
			<div class="col-md-3 card " style="background-color:#e6f0ff;">
				<div class="box" id="order-summary">
					<div class="box-header">
						<h4>Order Summary</h4>	
					</div>
					<p class="text-muted">
						Shopping cart Summary
					</p>
					<div class="table-responsive">
						<table class="table">
							<tr>
								<td> Order Price</td>
								<th>INR <span id="orderprice"><?php echo $k; ?></span> </th>
							</tr>
							<tr>
								<td> GST</td>
								<td>INR <spna id="gst"><?php $k=$k+$k/20; echo '5%'; ?></spna></td>
							</tr>
							<tr>
								<td> Shipping charge</td>
								<td>INR 0</td>
							</tr>
							<tr class="total">
								<td> Total Cost</td>
								<th>INR <span id="totalcast"><?php echo $k; ?></span></th>
							</tr>
						</table>	
					</div>
				</div>	
			</div>
		</div>
	</div><br>	
	<div class="footer">
    <h2>This is footer</h2>
    <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  </div>
<!--
<h4>Go to Panel:<a href="controlpnl.php">click here</a></h4>-->
</body>
</html>