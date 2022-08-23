<?php
 $a=$_REQUEST["txtHeading"];
 $b=$_REQUEST["txtDetail"];

 include("dbconnect.php");

 mysqli_query($connect,"insert into news_info(news_heading,news_details,reg_date,del_status) values('$a','$b',now(),0)") or die("Query error");

 header("location:newsForm.php?status=1");

?>