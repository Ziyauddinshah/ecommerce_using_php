<?php 

// for infinity
// $host = 'sql110.epizy.com';
// $usname = 'epiz_26932823';
// $password = 'wcDha36QFioy';
// $db = 'epiz_26932823_ecommerce';
// $port = '3306';
// $con=mysqli_connect($host,$usname,$password,$db,$port);
// $m=mysqli_select_db($con,$db);


// for 000webhosting
// $host = 'localhost';
// $usname = 'id15086807_ziya';
// $password = 'Ziyauddin321#';
// $db = 'id15086807_ecommerce';
// $port = '3306';

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'ecommerce';
$port = '3308';

$con=mysqli_connect($host,$username,$password,$db,$port);
$m=mysqli_select_db($con,$db);



?>