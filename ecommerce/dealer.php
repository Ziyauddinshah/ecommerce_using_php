<?php

session_start();
// $con=mysqli_connect('localhost','root','','ecommerce',"3308");
// $m=mysqli_select_db($con,'ecommerce');
include('connection.php');

if(isset($_POST['dname']))
{
  $dname=$_POST['dname'];
  $dimage=$_POST['dimage'];
  $dmobile=$_POST['dmob'];
  $demail=$_POST['demail'];
  $daddress=$_POST['text'];
  $pname=$_POST['pname'];
  $dq="INSERT into dregistration(dimage,dname,dmob,demail,daddress,pname) values('$dimage','$dname',$dmobile,'$demail','$daddress','$pname')";
  $dqrun=mysqli_query($con,$dq);
  if(isset($dqrun))
  echo "inserted";
  else
  echo "Not inserted";
}
else
echo "no data";


mysqli_close($con);
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Data Manage</title>
 </head>
 <body>
 <h1>Dealer Management</h1>
 <form action="" method="post">
 <table>
  <tr>
   <th>Dealer Name:</th>
   <td><input type="text" name="dname" required /></td>
  </tr></br>
   <tr>
   <th>Dealer Image:</th>
   <td><input type="file" name="dimage" required /></td>
  </tr></br>
  <tr>
  <th>Mobile:</th>
   <td><input type="number" name="dmob"  /></td>
  </tr></br>
  <tr>
    <th> Email: </th>
    <td><input type="text" name="demail"></td>
  </tr></br>
  <tr>
    <th> Address: </th>
    <td> <textarea name="text" cols="40" rows="10" > </textarea> </td>
  </tr></br>
  <tr>
   <th>Product Name:</th>
   <td><input type="text" name="pname" required /></td>
  </tr></br>
  <tr>
    <th><label><input type="submit" value="Upload"/></label/><th>
  </tr>
  </table>
  <h4> See All dealer <a href="ddetail.php" >click here</a></h4>
 </body>
</html>