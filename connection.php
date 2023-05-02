<?php 
	mysqli_report(MYSQLI_REPORT_OFF);

$connection = mysqli_connect("localhost","root","","group_chat_application");

if(mysqli_connect_errno())   
	{
		echo "Error No: ".mysqli_connect_errno();
		echo "<br />";
		echo "Error Msg: ".mysqli_connect_error();
		echo "<br />";
		die("Database Connection Failed !...");	

	}
?>