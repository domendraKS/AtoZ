<?php  @session_start();
    
 $a=$_REQUEST["txtUser"];
 $b=$_REQUEST["txtPass"];

include("dbconnect.php");

$rsUser=mysqli_query($connect,"select * from cust_information where user_name='$a'");

if(mysqli_num_rows($rsUser)==0)
{
    header("location:newLoginForm.php?resmsg=1");
}
else 
{
    $row=mysqli_fetch_array($rsUser);
    if($row["user_pass"]==$b)
    {
      $_SESSION["uname"]=$a;

          if($row["user_type"]=="admin")
          {
            $_SESSION["utype"]="admin";
          }
          else 
          {
            $_SESSION["utype"]="user";

          }

          header("location:itemQuntityFormForCart.php");
    }
    else 
    {
        header("location:newLoginForm.php?resmsg=2");
    }
}

?>