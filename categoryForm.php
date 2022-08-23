<?php  @session_start();
if(isset($_SESSION["uname"]) && $_SESSION["utype"]=="admin")
{

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

    <div> &nbsp; </div>
    <div id="myForm">
    <form method="post" enctype="multipart/form-data" action="insertCategory.php">
    <?php 
      if(isset($_REQUEST["resmsg"]))
      {
        echo("<div id='resMessage'>");
        if($_REQUEST["resmsg"]==1)
        {
          echo("Your data has been saved");
        }
		echo("</div>");
      }

    ?>
    <label> Enter Catgory Name  </label>
     <input type="text" name="txtName">
    <label> Enter Catgory Display Name  </label>
     <input type="text" name="txtDname">
    <label> Choose Catgory Image  </label>
     <input type="file" name="flImage">
    <label> Choose Catgory Type  </label>
     <select name="cmbType">
      <option>Primary</option>
      <option>Secondary</option>
     </select>
    <label> Choose Parent Catgory  </label>
     <select name="cmbParent">
     <option value="0">Choose Parent Here</option>
     <?php 
       include("dbconnect.php");
       $rsCat=mysqli_query($connect,"select cat_id,cat_name from category_info order by cat_name");
       while($row=mysqli_fetch_array($rsCat))
       {
        $id=$row["cat_id"];
          echo("<option value='$id'>");
          echo($row["cat_name"]);
          echo("</option>");
       }
	  ?>
      </select>
      <div id="formBtnGroup">
        <input type="submit" value="Ok">
        <input type="reset" value="Cancel">
      </div>
    </form>
    </div><!--end of myForm-->
   <div> &nbsp; </div>
   </div><!--end of rightAdmin-->

</div> <!---end of content---!>

<?php
include("footer.php");

}
else 
{
  header("location:loginForm.php");
}
?>