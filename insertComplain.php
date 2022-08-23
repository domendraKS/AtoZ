<?php @session_start();

 $rec=$_REQUEST["txtReceiver"];
 $a=$_REQUEST["txtHeading"];
 $b=$_REQUEST["txtDetail"];
 $usr=$_SESSION["uname"];

 include("dbconnect.php");

 mysqli_query($connect,"insert into message_info(msg_heading,msg_details,sender_name,receiver_name,sent_date) values('$a','$b','$usr','$rec',now())") or die("Query error");
 
 if($_SESSION["utype"]=="user")
 header("location:complainForm.php?status=1");
else
header("location:displayAdminInbox.php");

?>