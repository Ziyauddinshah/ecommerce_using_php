<?php
session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// mysqli_select_db($con,'ecommerce');

include('connection.php');

if(isset($_SESSION['UNAME']))
{
	$username=$_SESSION['UNAME'];
	$upassword=$_SESSION['UPASS'];
	if(isset($_POST['pid']))
	{
		$pid=$_POST['pid'];
		$p7="SELECT * from pcart where pid='$pid' and username='$username'";
		$result7=mysqli_query($con,$p7);
		$row7=mysqli_num_rows($result7);
		//$pidrow=$row7['pid'];	
		if(!$row7)
		{
			// $z=0;
			//query for product detail
			$p3="SELECT * from product where pid='$pid'";
			$result3=mysqli_query($con,$p3);
			$row3=mysqli_fetch_array($result3);
			$pname=$row3['pname'];
			$pprice=$row3['pprice'];
			$stock=$row3['stock'];
			$image=$row3['image'];
			$specification=$row3['specification'];
			
			// //query for inserting data into product cart
			$p2="INSERT INTO pcart(pid,pname,pprice,stock,image,specification,username) values($pid,'$pname',$pprice,$stock,'$image','$specification','$username')";
			$result2=mysqli_query($con,$p2);

			// //query for select data from uregistration
			$p1="SELECT * FROM uregistration where username='$username' and upassword='$upassword'";
			$result=mysqli_query($con,$p1);
			$row1=mysqli_fetch_array($result);
			//$row1['cart']++;
			$z=$row1['cart']+1;
			
			// //query for update user registration data
			$p="UPDATE uregistration SET cart ='$z' where username='$username' and upassword='$upassword' ";
			$result1=mysqli_query($con,$p);
			echo $z;
		}
		else
			echo "-1";
		// echo "Already added";
	}
	else
		echo "-2";
	// echo "Product id is not set";
}
else
{	
	echo "-3";
	// include("login.php");
	 // echo "<script> location.href='login.php' </script>";
}
mysqli_close($con);
?>