<?php
session_start();

$uname1=$_POST['username'];
$upassword1=$_POST['upassword'];

// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');

include('connection.php');

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

if(isset($_REQUEST['logout']))
{
	session_unset();
	session_destroy();
	echo "<script > location.href='product.php' </script>";
}
mysqli_close($con);
?>
