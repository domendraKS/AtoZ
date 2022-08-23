<?php 

$a=$_REQUEST["txtName"];
$b=$_REQUEST["txtEmail"];
$c=$_REQUEST["txtMobile"];
$d=$_REQUEST["txtUser"];
$e=$_REQUEST["txtPass"];
include("dbconnect.php");

$sql=mysqli_query($connect,"update cust_information set cust_name='$a',cust_email='$b',cust_mobile='$c',user_pass='$e' where user_name='$d'") or die("Query Error");

  header("location:editProfil.php?resmsg=1");
?>