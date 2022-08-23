<?php  @session_start();
  
  $a=$_REQUEST["txtUser"];
  $b=$_REQUEST["txtPass"];

include("dbconnect.php");

$rsUser=mysqli_query($connect,"select * from cust_information where user_name='$a'");

if(mysqli_num_rows($rsUser)==0)
{
    header("location:loginForm.php?resmsg=1");
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
            header("location:adminChoice.php");
          }
          else 
          {
            $_SESSION["utype"]="user";
             header("location:userChoice.php");
          }
	}
    else 
    {
        header("location:loginForm.php?resmsg=2");
    }
}

?>