<?php

 include("header.php");

?>

<div id="content">

  <div id="myForm">
    <form method="get" action="insertRegInfo.php">
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
	  <label> Enter your name </label>
       <input type="text" name="txtName">
      <label> Enter your email id  </label>
       <input type="text" name="txtEmail">
      <label> Enter your mobile number </label>
       <input type="text" name="txtMobile">
      <label> Enter your address  </label>
       <textarea name="txtAddress" rows="5"></textarea>
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