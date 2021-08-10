
<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');
include('connection.php');
if(isset($_POST['submit']))
{
     $username=$_POST['username'];
     $lastname=$_POST['lastname'];
     $uemail=$_POST['uemail'];
     $umob=$_POST['umob'];
     $udob=$_POST['udob'];
     $upassword=$_POST['upassword'];
     $ucnfrmpswrd=$_POST['ucnfrmpswrd'];
     //set session
     $_SESSION['UNAME']=$username;
     $_SESSION['UPASS']=$upassword;

     // echo $username;
     if ($upassword==$ucnfrmpswrd) 
     {
          $p="SELECT *from uregistration where username='$username'";
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
               values('$username','$lastname','$username','$uemail',$umob,'$udob',$upassword)";
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
    <title>Resister</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- <link rel="stylesheet" type="text/css" href="./CSS/cart.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="./CSS/view.css"/> -->
</head>
<bod>
     <div>
          <h1>Register page</h1>
     </div>
     <div class="container">
          <div class="card-deck justify-content-center">
               <div class="col-sm-10 card">
                   <form action="#" method="post" >
                         <table class="table text-center">
                              <thead>Heading</thead>
                              <tbody>
                                   <tr>
                                   <td>Name:</td>
                                   <th><input type="text" name="username" placeholder="Enter your name..." required></th>
                                   </tr>
                                   <tr>
                                        <td>Lastname:</td>
                                        <th><input type="text" name="lastname" placeholder="Enter your lastname..." ></th>
                                   </tr>
                                   <tr>
                                        <td>Email:</td>
                                        <th><input type="text" name="uemail" placeholder="Enter your email..." ></th>
                                   </tr>
                                   <tr>
                                        <td>Mobile No:</td>
                                        <th><input type="text" name="umob" placeholder="Enter your mobile no..." ></th>
                                   </tr>
                                   <tr>
                                        <td>Date of Birth:</td>
                                        <th><input type="text" name="udob" placeholder="Enter your Date of birth..." ></th>
                                   </tr>
                                   <tr>
                                        <td>Password:</td>
                                        <th><input type="password" name="upassword" placeholder="Enter your password..." required></th>
                                   </tr>
                                   <tr>
                                        <td>Confirm Password:</td>
                                        <th><input type="password" name="ucnfrmpswrd" placeholder="Enter your confirm password..." required></th>
                                   </tr>
                              </tbody>
                              
                              <tfoot>
                                   <th><input type="submit" name="submit" value="Register"></th>
                              </tfoot>
                              
                         </table>
                    </form> 
               </div>
          </div>    
     </div>
     
    <h4>Already User:<a href="login.php">Login</a></h4>
</body>
</html>