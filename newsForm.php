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
  <div>&nbsp;
    <?php
      if(isset($_REQUEST["status"]))
      {
        echo("<div id='resMessage'>");
	    if($_REQUEST["status"]==1)
	    {
	    echo("News has been saved");
	    }
	    echo("</div>");
      }
    ?>
   </div>
   <div id="myForm">
   <form method="post" enctype="multipart/form-data" action="insertNews.php" >
     <label>Enter News Heading</label>
      <input type="text" name="txtHeading" />
     <label>Enter News Detail</label>
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