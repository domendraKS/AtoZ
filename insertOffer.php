<?php

 $cats="";

 function getChildCategory($prnt)
 {
    $GLOBALS["cats"]=$GLOBALS["cats"].$prnt."-";
	include("dbconnect.php");
    $rsCart=mysqli_query($connect,"select cat_id from category_info where cat_parent_id='$prnt'") or die("Query error!");
    
	if(mysqli_num_rows($rsCart)==0)
	{
		return;
	}		
	else
	{
		while($row=mysqli_fetch_array($rsCart))
		{
			getChildCategory($row["cat_id"]);
		}
	}
 }

 $a=$_REQUEST["txtOfferName"];
 $b=$_REQUEST["dtStart"];
 $c=$_REQUEST["dtEnd"];
 $d=$_REQUEST["cmbCategory"];
 $e=$_REQUEST["txtDiscount"];
 
  getChildCategory($d);
//echo($cats."<br>");
 
 $tempdt=strtotime("1 day",strtotime($c));
 $newdate=date('y-m-d',$tempdt);
 
 $str=substr($cats,0,strlen($cats)-1);

 
 include("dbconnect.php");
 
 mysqli_query($connect,"insert into offer_info (offer_name,offer_start_dt,offer_end_dt,cat_type,offer_discount,reg_date)
  values('$a','$b','$newdate','$str','$e',now())") or die("Query Error!");
  
  header("location:offerForm.php?status=1");

?>