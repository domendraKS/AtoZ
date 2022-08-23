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
	    echo("Data has been saved");
	    }
	    echo("</div>");
      }
    ?>
   </div>
   <div id="myForm">
   <form method="post" enctype="multipart/form-data" action="insertItem.php" >
     <label>Enter Item Name</label>
      <input type="text" name="txtItemName" />
     <label>Enter Item Detail</label>
      <input type="text" name="txtDetail" />
     <label>Choose Item Image</label>
      <input type="file" name="flImage" />
     <label>Choose Parent Category</label>
      <select name="cmbParent">
      <option>Choose parent name</option>

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
     <label>Enter Item Rate</label>
      <input type="text" name="txtRate" />
     <label>Enter Item Discount in %</label>
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

}
else 
{
  header("location:loginForm.php");
}
?>