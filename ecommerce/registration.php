<?php
session_start();
$username=$_POST['username'];
$sirname=$_POST['sirname'];
$uemail=$_POST['uemail'];
$umob=$_POST['umob'];
$udob=$_POST['udob'];
$upassword=$_POST['upassword'];
$ucnfrmpswrd=$_POST['ucnfrmpswrd'];

//set session
$_SESSION['UNAME']=$username;
$_SESSION['UPASS']=$upassword;

// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');

include('connection.php');
	if(isset($m))
	{
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
				$q="INSERT INTO uregistration(sirname,username,uemail,umob,udob,upassword) 
				values('$sirname','$username','$uemail',$umob,'$udob',$upassword)";
				mysqli_query($con,$q);
				echo "<h2>Registered successfully...</h2>";
			}
		}
		else{
			echo "Oops.</br>";
			echo "Your password does not match confirm password again";
		}
	}
?>
<h4>Go to login: <a href="login.php">click here</a></h4>
<?php
mysqli_close($con);
?>