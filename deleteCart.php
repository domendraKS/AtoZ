<?php
 
 $a=$_REQUEST["cid"];
 
 include("dbconnect.php");
 mysqli_query($connect,"delete from cart_info where cart_id='$a'");
 
 header("location:displayCartInfo.php");

?>