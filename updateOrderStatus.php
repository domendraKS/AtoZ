<?php @session_start();

$a=$_REQUEST["txtOrderId"];
$b=$_REQUEST["cmbOrderStatus"];

include("dbconnect.php");
mysqli_query($connect,"update order_master set order_status='$b',last_update_date=now() where order_id='$a' ");

if($_SESSION["uname"=="admin"])
{
    header("location:displayOrderMasterForAdmin.php");
}
else
{
	header("location:displayOrderMasterForCancelUser.php");
}

?>