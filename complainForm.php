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
	<div>&nbsp;
    <?php
      if(isset($_REQUEST["status"]))
      {
        echo("<div id='resMessage'>");
	    if($_REQUEST["status"]==1)
	    {
	    echo("Complain has been saved");
	    }
	    echo("</div>");
      }
    ?>
   </div>
	
	 <div id="myForm">
   <form method="post" enctype="multipart/form-data" action="insertComplain.php" >
   <?php
    $rec="admin";
   ?>
     <label>Complain To</label>
      <input type="text" name="txtReceiver" readonly="readonly" value="<?php echo("$rec");?>"/>
	 <label>Complain Heading</label>
      <input type="text" name="txtHeading" />
     <label>Complain Details</label>
      <textarea name="txtDetail" ></textarea>
      
     <div id="formBtnGroup">
       <input type="submit" value="Ok">
       <input type="reset" value="Cancel">
     </div>
    </form>


    </div><!--end of myForm-->
	
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