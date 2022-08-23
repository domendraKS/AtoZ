<?php  @session_start();
if(isset($_SESSION["uname"])&& $_SESSION["utype"]=="user")
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
	  <div id="myForm">
    <form method="get" action="updateProfile.php">
	  <?php 
        if(isset($_REQUEST["resmsg"]))
        {
          echo("<div id='resMessage'>");
          if($_REQUEST["resmsg"]==1)
          {
            echo("Your data has been Updated");
          }
          echo("</div>");
        }
	   ?>
	   
	   <?php
	   
	   include("dbconnect.php");
	   $usr=$_SESSION["uname"];
	   $rsUser=mysqli_query($connect,"select * from cust_information where user_name='$usr'");
	   
	   $row=mysqli_fetch_array($rsUser);
	   
	   $a=$row["cust_name"];
	   $b=$row["cust_email"];
	   $c=$row["cust_mobile"];
	   $d=$row["user_pass"];
	   
	   ?>
	  <label> Enter your name </label>
       <input type="text" name="txtName" value="<?=$a?>"/>
      <label> Enter your email id  </label>
       <input type="text" name="txtEmail" value="<?=$b?>"/>
      <label> Enter your mobile number </label>
       <input type="text" name="txtMobile" value="<?=$c?>">
      <label> Enter your user name </label>
       <input type="text" name="txtUser" readonly="readonly" value="<?=$usr?>">
      <label> Enter your password  </label>
       <input type="password" name="txtPass" value="<?=$d?>">
      <div id="formBtnGroup">
       <input type="submit" value="Ok">
       <input type="reset" value="Cancel">
      </div>
	</form>
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