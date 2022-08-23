<?php @session_start();

 $x=$_REQUEST["amnt"];
 $usr=$_SESSION["uname"];
 
 include("dbconnect.php");
 
 mysqli_query($connect,"insert into order_master(user_name,order_date,total_amount,order_status,last_update_date)
 values ('$usr',now(),'$x','Transit',now())") or die("Querry Error!");
 
 $rsMaster=mysqli_query($connect,"select max(order_id) from order_master");
 $row=mysqli_fetch_array($rsMaster);
 
 $refid=$row[0];
 
 $rsCart=mysqli_query($connect,"select * from cart_info where user_name='$usr'");
 while($row=mysqli_fetch_array($rsCart))
 {
	 $itid=$row["item_id"];
	 $qty=$row["item_qty"];
	 $rate=$row["item_rate"];
	 mysqli_query($connect,"insert into order_detail(item_id,item_rate,item_quantity,order_ref_id)
	 values ('$itid','$rate','$qty','$refid')");
 }

 mysqli_query($connect,"delete from cart_info where user_name='$usr'");

 header("location:displayOrderInfo.php?orid=$refid");
 
?>