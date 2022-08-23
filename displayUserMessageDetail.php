<?php  @session_start();
if(isset($_SESSION["uname"]))
{

?>

<?php
include("header.php");
?>

<div id="content">
  <div id="adminArea">

    <div id="leftAdmin">
      <?php 
        include("userMenu.php");
      ?>
    </div><!--end of leftAdmin-->
    
	<div id="rightAdmin">
	<div id="table">

<div style="width:60%; margin:10px; padding:20px; border:1px solid black; ">
<?php

$id=$_REQUEST["nid"];

include("dbconnect.php");
$rsNews=mysqli_query($connect,"select * from message_info where msg_id='$id' order by sent_date desc");


$row=mysqli_fetch_array($rsNews);

	$id=$row["msg_id"];
	$hd=$row["msg_heading"];
	$sn=$row["sender_name"];
	$dt=$row["sent_date"];
	$dtl=$row["msg_details"];
	
	echo("Heading :".$hd);
	echo("<hr>");
	echo("Rec. Date :".$dt);
	echo("<hr>");
	echo("Sender Name :".$sn);
	echo("<hr>");
	echo("Details :".$dtl);
	echo("<hr>");

	


?>
</div>


    </div>
    </div><!--end of rightAdmin-->
  </div><!--end of adminarea-->
</div> <!---end of content---!>

<?php
include("footer.php");
?>

<?php 
}
else 
{
  header("location:loginForm.php");
}
?>