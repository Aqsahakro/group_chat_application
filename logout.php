<?php
	session_start();
	require("connection.php");

	session_destroy();
	header("location:index.php?msg=logged out&color=red");

?>