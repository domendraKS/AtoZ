<?php
include("header.php");
?>

<div id="content">

<div id="table">
<table border="1" width="60%" align="center">
<tr>
<th width="100">Sl. No.</th>
<th>News Details</th>
</tr>
<?php

$x=$_REQUEST["nid"];
include("dbconnect.php");
$rsNews=mysqli_query($connect,"select news_details from news_info where news_id=$x");

$cnt=0;
while($row=mysqli_fetch_array($rsNews))
{
	$cnt++;
	$hd=$row["news_details"];
	echo("<tr>");
	echo("<td>");
	echo($cnt);
	echo("</td>");
	echo("<td>");
	echo($hd);
	echo("</td>");
	echo("</tr>");
}

?>
</table>

</div>
</div> <!---end of content---!>

<?php
include("footer.php");
?>