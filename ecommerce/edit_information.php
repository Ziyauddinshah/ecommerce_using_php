<?php 
// echo "hii";

session_start();
// $photo=$_POST['photo'];
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$udob=$_POST['udob'];
$gander=$_POST['gander'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$village=$_POST['village'];
$town=$_POST['town'];
$pinno=$_POST['pinno'];
$district=$_POST['district'];
$state=$_POST['state'];

// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// mysqli_select_db($con,'ecommerce');
include('connection.php');
// if(isset($_SESSION['UNAME']))
// {
// 	$username=$_SESSION['UNAME'];
// 	$q="UPDATE uregistration set name='$name',lastname='$lastname',photo='$photo',udob='$udob',gander='$gander',umob='$mobileno',uemail='$email',village='$village',town='$town',pinno=$pinno,district='$district',state='$state' where username='$username'";
// 	$qrun=mysqli_query($con,$q);
// 	if(isset($qrun))
// 		echo "Updated successfully";
// 	else
// 		echo "failed";
// }

mysqli_close($con);
?>