<?php 

$a=$_REQUEST["txtName"];
$b=$_REQUEST["txtEmail"];
$c=$_REQUEST["txtMobile"];
$d= $_REQUEST["txtAddress"];
$e= $_REQUEST["txtUser"];
$f=$_REQUEST["txtPass"];
include("dbconnect.php");

$sql="insert into cust_information(cust_name,cust_email,cust_mobile,cust_address,user_name,user_pass,user_type,
reg_date) values('$a','$b','$c','$d','$e','$f','user',now())";
mysqli_query($connect,"$sql") or die("Query Error");

  header("location:userRegistrationForm.php?resmsg=1");
?>