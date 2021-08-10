<?php

session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');
include('connection.php');
$check=0;
if(isset($_POST['submit']))
{
  // for billing address
  $check=1;
  $bfirstname=$_POST['bfirstname'];
  $bmobile=$_POST['bmobile'];
  $bemail=$_POST['bemail'];
  $baddress=$_POST['baddress'];
  $bcity=$_POST['bcity'];
  $bstate=$_POST['bstate'];
  $bpin=$_POST['bpin'];

  //for shipping address
  $sfirstname=$_POST['sfirstname'];
  $smobile=$_POST['smobile'];
  $semail=$_POST['semail'];
  $saddress=$_POST['saddress'];
  $scity=$_POST['scity'];
  $sstate=$_POST['sstate'];
  $spin=$_POST['spin'];
}

if(isset($_SESSION['UNAME']))
{
	  $uname1=$_SESSION['UNAME'];
	  $q1="SELECT * from uregistration where username='$uname1'";
	  $result1=mysqli_query($con,$q1);
	  $row1=mysqli_fetch_array($result1);




	  $q2="SELECT * from pcart where username='$uname1'";
	  $result2=mysqli_query($con,$q2);

	  // $q3="INSERT into billing_address(username,full_name,mobile,email,address,city,state,pin) values('$uname1','$bfirstname',$bmobile,'$bemail','$baddress','$bcity','$bstate',$bpin)";
	  // $result3=mysqli_query($con,$q3);

	  // $q4="INSERT into shipping_address(username,full_name,mobile,email,address,city,state,pin) values('$uname1','$sfirstname',$smobile,'$semail','$saddress','$scity','$sstate',$spin)";
	  // $result4=mysqli_query($con,$q4);

}
// else
// {
// 	  echo '<script type="text/javascript">';
//       echo ' aler("You are not login.")'; 
//       echo '</script>';   
//       echo "<script> location.href='payment.php' </script>";
// }

?>

<!DOCTYPE html>
<html>
<head>
	<title>payment1_page</title>
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
  <br><br>
  <div class="container">
    <div class="card-deck justify-content-between">
    <!-- <div class="col-sm-12 card bg-light"> -->
      <?php
        if($check==1)
        {
        ?>
          <div class="col-sm-6 card bg-light">
            <h5 class="text-align">Billing Address:</h5>
            <td><?php echo $baddress;?></td><br>
            <td><?php echo $bcity;?></td><br>
            <td><?php echo $bstate;?></td><br>
            <td><?php echo $bpin;?></td><br>
            <br>
          </div>
          <div class="col-sm-6 card bg-light">
            <h5 class="text-align">Shipping Address:</h5>
            <td><?php echo $saddress;?></td><br>
            <td><?php echo $scity;?></td><br>
            <td><?php echo $sstate;?></td><br>
            <td><?php echo $spin;?></td><br>
            <br> 
          </div>
       <?php
       }
       else
       {
        ?>
        <div class="col-sm-12  ">
          <h6>Enter your Billing and Shipping address: <a href="payment.php">Click here to enter address</a></h6>
        </div>
        <?php
      }
      ?>
    </div>
    <hr>
  </div>
<!-- <br> -->
<!-- <hr> -->
  <div class="container">
    <form action="payment2.php" method="post">
      <div class="card-deck">
        	<div class="col-sm-8 card" ><!-- style="border-style:none;"-->
              <h3>Payment Options</h3>
              <ul>
                <li><button class="btn btn-primary" style="width: 110px;" type="button" data-toggle="collapse" data-target="#debitcard" aria-expanded="false" aria-controls="collapseExample">Debit Card</button></li><br>
                <div class="collapse" id="debitcard">
                  <div class="col-sm-10 card" >
                    <label for="fname">Accepted Cards</label>
                      <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div><br>
                      <label for="cname"> <i class="fa fa-user"></i>Name on Card :</label>
                      <input type="text" id="cname" name="cardname" aria-pressed="false" autocomplete="off" placeholder="John More Doe" ><br>
                      <label for="ccnum"><i class="fa fa-credit-card"></i>Debit card number :</label>
                      <input type="text" id="ccnum" name="cardnumber" aria-pressed="false" autocomplete="off" placeholder="1111-2222-3333-4444" ><br>
                      <div class="text-align">
                        <label for="expmonth">Exp Month :</label>
                        <input type="Month" style="width: 170px;" id="expmonth" name="expmonth" aria-pressed="false" autocomplete="off" placeholder="September" >
                        <label for="expyear" >Exp Year :</label>
                        <input type="number" min="1900" max="2099" step="1" style="width: 80px;" id="expyear" name="expyear" aria-pressed="false" autocomplete="off" placeholder="2018" >
                      
                        <label for="cvv" >CVV :</label>
                        <input type="text" style="width: 60px;" id="cvv" name="cvv" aria-pressed="false" autocomplete="off" placeholder="352">
                      </div><br>
                  </div><br>
                  </div> 

                  <li><button class="btn btn-primary" style="width: 120px;" type="button" data-toggle="collapse" data-target="#netbanking" aria-expanded="false" aria-controls="collapseExample">Net Banking</button></li><br>
                  <div class="collapse" id="netbanking">
                    <div class="col-sm-8 card">
                      <label for="fname"><i class="fa fa-user"></i> User Name:</label>
                      <input type="text" id="fname" name="firstname" aria-pressed="false" autocomplete="off" placeholder="John M. Doe" ><br>
                      <label for="mobile"><i class="fa fa-phone"></i> Password:</label>
                      <input type="text" id="mobile" name="password" aria-pressed="false" autocomplete="off" placeholder="1234567890"><br>
                    </div>  
                    <br>
                  </div>
                  <li><button class="btn btn-primary" style="width:70px;" type="button" data-toggle="collapse" data-target="#upi" aria-expanded="false" aria-controls="collapseExample">UPI</button></li><br>
                  <div class="collapse" id="upi">
                    <div class="col-sm-8 card bg-success">

                      <label for="fname"><i class="fa fa-bank"></i> Bank Name:</label>
                      <!-- <input type="text" class="form-control" aria-label="Text input with dropdown button" id="bankname" name="bankname" aria-pressed="false"  autocomplete="off" placeholder="John M. Doe"> -->
                        <select class="form-control" id="sel1" name="bankname" autocomplete="off" aria-pressed="false" >
                          <option value="selected disabled" >Please select</option>
                          <option>SBI</option>
                          <option>HDFC</option>
                          <option>ICICI</option>
                          <option>BOB</option>
                        </select>
                        <br>
                      <label for="upi"><i class="fa fa-number"></i> UPI ID:</label>
                      <input type="text" id="upiid" name="upiid" aria-pressed="false" autocomplete="off" placeholder="1234567890">
                      <br>
                    </div>        
                  </div>
              </ul>

              <script type="text/javascript">
                $(document).ready(function(){
                  $('#debitcard').on('show.bs.collapse', function () {
                $('#netbanking').collapse('hide');
                $('#upi').collapse('hide');
              });
              $('#netbanking').on('show.bs.collapse', function () {
                $('#debitcard').collapse('hide');
                $('#upi').collapse('hide');
              });
              $('#upi').on('show.bs.collapse', function () {
                $('#debitcard').collapse('hide');
                $('#netbanking').collapse('hide');
              });
                });
              </script>
          </div> 

          <div class="col-sm-4 " style="background-color:#e6f0ff;">
              <table class="table">
                  <thead>
                    <th>Product name</th>
                    <th>Price</th>
                  </thead>
                  <?php
                   $k=0; 
                   if(isset($_SESSION['UNAME']))
                   { 
                    while($row2=mysqli_fetch_array($result2)){
                      ?>               
                        <tbody>
                          <tr>
                            <td><a href="#"><?php echo $row2['pname'];?></a> </td>
                            <td><?php echo $row2['pprice'];?></td>
                          </tr>
                        </tbody>
                      <?php
                      $k=$k+$row2['pprice'];
                    }
                   }
                   else
                   {
                    ?>
                    <tbody>
                      <tr>
                        <td><a href="#">Product 1</a> <span class="price" >$5</span></td>
                        <td><a href="#">Product 2</a> <span class="price" >$10</span></td>
                        <td><a href="#">Product 3</a> <span class="price" >$15</span></td>
                      </tr>
                    </tbody>
                  <?php
                   }
                  ?>
                 <tfoot>
                   <th>Total </th>
                   <th><?php echo $k;?> </th>
                 </tfoot>
              </table>
          </div>

      </div><br>
      <div class="text-center"> 
          <a href="payment.php" class="btn btn-primary">Back</a>  
          <!-- <a href="#" class="btn btn-info" >Continue </a> -->
          <!-- <button type="submit" value="Continue to checkout" class="btn btn-primary">Back</button> -->
          <button type="submit" value="Continue to checkout" class="btn btn-primary">Continue</button>
      </div>
      <br>
    </form> 
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