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
	
	<?php
	
	 include("dbconnect.php");
	 
	 $usr=$_SESSION["uname"];
	 $rsOrder=mysqli_query($connect,"select * from order_master where user_name='$usr' ");
	 
	 echo("<div id='myList'>");
	 echo("<table border='1'>");
	 echo("<tr>");
	 echo("<th>Sl. No.</th>");
	 echo("<th>Customer Name</th>");
	 echo("<th>Order Date</th>");
	 echo("<th>Total Amount</th>");
	 echo("<th>Current Status</th>");
	 echo("<th>Status</th>");
	 echo("</tr>");
	 $cnt=0;
	 while($row=mysqli_fetch_array($rsOrder))
	 {
		 $cnt++;
		 $id=$row["order_id"];
		 echo("<tr>");
		 echo("<td>");
		 echo($cnt);
		 echo("</td>");
		 echo("<td>");
		 echo($row["user_name"]);
		 echo("</td>");
		 echo("<td>");
		 echo($row["order_date"]);
		 echo("</td>");
		 echo("<td>");
		 echo($row["total_amount"]);
		 echo("</td>");
		 echo("<td>");
		 echo($row["order_status"]);
		 echo("</td>");
		 echo("<td>");
		 echo("<a href='displayOrderDetailsForHistoryUser.php?id=$id'>Details</a>");
		 echo("</td>");
		 echo("</tr>");
	 }
	 echo("</table>");
	 echo("</div>");
	 
	
	?>

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