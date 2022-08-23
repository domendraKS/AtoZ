<?php  @session_start();
if(isset($_SESSION["uname"]) && $_SESSION["utype"]=="admin")
{

?>

<?php
include("header.php");
?>

<div id="content">
  <div id="adminArea">

    <div id="leftAdmin">
      <?php 
        include("adminMenu.php");
      ?>
    </div><!--end of leftAdmin-->
    
	<div id="rightAdmin">
	
	<?php
	 
	 require_once("library.php");
	 displayTable("select * from cust_information");
	 
	?>

    </div><!--end of rightAdmin-->
  </div><!--end of adminarea-->
</div> <!---end of content---!>

<?php
include("footer.php");

}
else 
{
  header("location:loginForm.php");
}
?>