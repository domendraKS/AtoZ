<?php

$connect=mysqli_connect("127.0.0.1","root","") or die("Connection Error!");
mysqli_select_db($connect,"a_to_z_shopping") or die ("Database Error!");

?>