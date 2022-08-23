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
	    echo("Offer has been saved");
	    }
	    echo("</div>");
      }
    ?>
   </div>
   <div id="myForm">
   <form method="post" enctype="multipart/form-data" action="insertOffer.php" >
     <label>Enter Offer Name</label>
      <input type="text" name="txtOfferName" />
     <label>Choose Offer Start Date</label>
      <input type="date" name="dtStart" />
	  <label>Choose Offer End Date</label>
      <input type="date" name="dtEnd" />
	  
     <label>Choose Category</label>
      <select name="cmbCategory">
      <option value="0">Choose Category Name</option>

      <?php
       include("dbconnect.php");
       $rs=mysqli_query($connect,"select * from category_info order by cat_name");
       while($row=mysqli_fetch_array($rs))
       {
	      $id=$row["cat_id"];
          echo("<option value='$id'>")	;
          echo($row["cat_name"]);
          echo("</option>")	;  
       }
      ?>

      </select>
     <label>Enter Offer Discount in %</label>
      <input type="text" name="txtDiscount" />
	  
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