<?php
include("header.php");
?>

<div id="content">
  <div id="myForm">
    <form method="get" id="height" action="checkLogin.php">
    <?php 
      if(isset($_REQUEST["resmsg"]))
      {
        echo("<div id='resMessage'>");
        if($_REQUEST["resmsg"]==1)
        {
          echo("Wrong User Name");
        }
        else if($_REQUEST["resmsg"]==2)
        {
          echo("Wrong password");
        }
        echo("</div>");
      }
	?>
	<label> Enter your user name </label>
     <input type="text" name="txtUser">
    <label> Enter your password  </label>
     <input type="password" name="txtPass">
     <div id="formBtnGroup">
       <input type="submit" value="Ok">
       <input type="reset" value="Cancel">
     </div>
    </form>
</div> 
</div> <!---end of content---!>

<?php
include("footer.php");
?>