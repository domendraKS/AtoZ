<div id="table">
<table border="1" width="60%" align="center">
<tr>
<th width="100">Sl. No.</th>
<th>Message Heading</th>
<th>Receive Date</th>
<th>Sender Name</th>
</tr>
<?php

include("dbconnect.php");
$usr=$_SESSION["uname"];
$rsNews=mysqli_query($connect,"select msg_id,msg_heading,sent_date,sender_name from message_info where receiver_name='$usr' order by sent_date desc");

$cnt=0;
while($row=mysqli_fetch_array($rsNews))
{
	$cnt++;
	$id=$row["msg_id"];
	$hd=$row["msg_heading"];
	$sn=$row["sender_name"];
	$dt=$row["sent_date"];
	echo("<tr>");
	echo("<td>");
	echo($cnt);
	echo("</td>");
	echo("<td>");
	if($_SESSION["utype"]=="admin")
	{
	    echo("<a href='displayAdminMessageDetail.php?nid=$id'>");
	    echo($hd);
	    echo("</a>");
	}
	else
	{
		 echo("<a href='displayUserMessageDetail.php?nid=$id'>");
	     echo($hd);
	     echo("</a>");
	}
	echo("</td>");
	echo("<td>");
	echo($dt);
	echo("</td>");
	echo("<td>");
	echo($sn);
	echo("</td>");
	echo("</tr>");
}

?>
</table>