<?php

 @session_start(); 

?>
<html>
  <head>
    <title>A to Z Shopping</title>
	<link href=".\style\style.css" type="text/css" rel="stylesheet">
  </head>
  
  <body>
    <div id="main">
      <div id="header">
         <div id="leftLogo"><a href="index.php"><img src=".\image\LOGO1.jpg"></a></div>
         <div id="title"><h1>A to Z Shopping</h1><br><h3>Trusted company for all products</h3>
		 <?php 
                if(isset($_SESSION["uname"]))
                {
                echo("<div id='welcome'>");
				$usr=$_SESSION["uname"];
                  echo("Welcome ".$_SESSION["uname"]." --");
                  echo("<a href='logout.php'>Logout</a>");
				  
				  if($_SESSION["utype"]=="user")
				  {
					  echo("&nbsp;&nbsp; <a href='displayCartInfo.php'> <img src='.\image\LOGO2.jpg' width='20' height='20' align='top'");
					  
					  include("dbconnect.php");
					  $rsCart=mysqli_query($connect,"select count(*) from cart_info where user_name='$usr' ") or die("Querry Error!");
					  $row=mysqli_fetch_array($rsCart);
					  $cnt=$row[0];
					  
					  echo("</a>");
					  echo("($cnt)");
				  }
                echo("</div>");
                }
         ?>
		 </div>
         <div id="rightLogo"><a href="index.php"><img src=".\image\LOGO2.jpg"></a></div>
		 
		 
		 
	  </div> <!---end of header--->
	  <div id="searcBar">
		 
		 <form method="get" action="searchResult.php">
		  Enter Search Criteria <input type="text" name="txtSearch">
		  <input type="submit" value="OK">
		 </form>
		 
		 </div>
