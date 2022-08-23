<?php  @session_start();
 
 $_SESSION["item"]= $_REQUEST["itm"];
 $_SESSION["rate"]=$_REQUEST["rt"];

 if(isset($_SESSION["uname"]))
 {
    header("location:itemQuntityFormForCart.php");
 }
 else 
 {
    header("location:newLoginForm.php");
 }

?>