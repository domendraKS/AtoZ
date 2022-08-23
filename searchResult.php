<?php
include("header.php");
?>

<div id="content">

 <div id="categoryArea">
 <?php 
   if(isset($_REQUEST["cid"]))
   {
     $prid=$_REQUEST["cid"];
   }
   else 
   {
     $prid=0;
   }
   
   $search=$_REQUEST["txtSearch"];
   
   include("dbconnect.php");
   $rsCat=mysqli_query($connect,"select * from category_info where cat_name like '%$search%' order by cat_dname");
   while($row=mysqli_fetch_array($rsCat))
   {
    echo("<div class='category'>");
      $id=$row["cat_id"];
      echo("<a href='index.php?cid=$id'>");
      echo($row["cat_dname"]);
      $img=$row["image_path"];
      echo("<img src='.//collection//$img'>");
      echo("</a>");
      echo("</div>");
   }
 ?>
</div><!--end of categoryArea-->
<hr>
<div id="itemArea"> 

<?php 
   if(isset($_REQUEST["cid"]))
   {
     $prid=$_REQUEST["cid"];
   }
   else 
   {
     $prid=0;
   }
   
   $rsItem=mysqli_query($connect,"select * from item_info where item_name like'%$search%' order by item_name");
   while($row=mysqli_fetch_array($rsItem))
   {
    echo("<div class='item'>");
      $id=$row["item_id"];
      
      echo($row["item_name"]);
      $img=$row["image_path"];
      echo("<img src='.//collection//$img'>");
      echo("Detail:".$row["item_detail"]."<br>");

      echo("Rate: <s>".$row["item_rate"]."</s><br>");
	  
	  $spdis=0;
	  $rsOffer=mysqli_query($connect,"select * from offer_info where now()>=offer_start_dt and now()<=offer_end_dt");
	  
	  while($rowOffer=mysqli_fetch_array($rsOffer))
	  {
		  $cats=$rowOffer["cat_type"];
		  $catarr=explode("-",$cats);
		  if(in_array($prid,$catarr))
		  {
			  $spdis=$spdis+$rowOffer["offer_discount"];
		  }
	  }
	  $row["item_discount"]=$row["item_discount"]+$spdis;
	  echo($row["item_discount"]."% off<br>");
	  
      $dis=$row["item_rate"] - $row["item_rate"]*$row["item_discount"]/100 ;
	  
      echo("Dis. Rate: ".$dis."<br>");

      echo("<div class='buyNow'>");
      echo("<a href='checkAlreadyLoginForCart.php?itm=$id&rt=$dis'>Buy Now</a>");
      echo("</a>");

      echo("</div>");
	  echo("</div>");
   }
 ?>




</div><!--end of itemArea-->

</div> <!---end of content---!>

<?php
include("footer.php");
?>