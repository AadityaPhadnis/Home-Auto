<?php
	$con=mysqli_connect("localhost","id5123334_aadi","123456");
	mysqli_select_db($con,"id5123334_home");

	$name = $_GET["id"];

	$qry = "SELECT * FROM user WHERE name =  '$name'";
	$rs = mysqli_query($con,$qry);
	if ($rs) 
	{
		$rw = mysqli_fetch_assoc($rs);
		echo "*". $rw['d1']. $rw['d2']. $rw['d3']. $rw['d4']."#";	
	}
	else
	{
		echo "Error!";

	}
?>