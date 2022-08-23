<?php @session_start();

 $a=$_SESSION["uname"];
 $b=$_SESSION["item"];
 $c=$_SESSION["rate"];
 $d=$_REQUEST["txtQty"];

 include("dbconnect.php");
 mysqli_query($connect,"insert into cart_info(user_name,item_id,item_rate,item_qty) values('$a','$b','$c','$d')") or die("Query error");

 header("location:displayCartInfo.php");
?>