<?php 

  $a=$_REQUEST["txtName"];
  $b=$_REQUEST["txtDname"];
  $c=$_FILES["flImage"];
  $img=$c["name"];
  $d=$_REQUEST["cmbType"];
  
  if($d=="Primary")
    $e=0;
  else   
    $e=$_REQUEST["cmbParent"];

  move_uploaded_file($c['tmp_name'],".\\collection\\$img");

  include("dbconnect.php");

   mysqli_query($connect,"insert into category_info(cat_name,cat_dname,image_path,cat_type,cat_parent_id,reg_date) values('$a','$b','$img','$d','$e',now())");

  header("location:categoryForm.php?resmsg=1");

?>