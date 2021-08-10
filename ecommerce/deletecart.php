<?php

session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// mysqli_select_db($con,'ecommerce');

include('connection.php');

if(isset($_SESSION['UNAME']))
{
	$username=$_SESSION['UNAME'];
	if(isset($_POST['pid1']))
	{
		$cart=0;
		$pid1=$_POST['pid1'];
		$dq="DELETE from pcart where pid='$pid1' and username='$username'";
		$dqrun=mysqli_query($con,$dq);
		$uq="SELECT * from uregistration where username='$username'";
		$uqrun=mysqli_query($con,$uq);
		$row=mysqli_fetch_array($uqrun);
		$cart=$row['cart'];
		$cart--;
		if($cart>=0)
		{			
			$updateq="UPDATE uregistration SET cart='$cart' where username='$username'";
			$updateqrun=mysqli_query($con,$updateq);
			echo $cart;
		}
		else
			echo $cart;
	}
	else
		echo "no item";
}

mysqli_close($con);
?>