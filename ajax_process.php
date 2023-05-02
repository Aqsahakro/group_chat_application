<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#show_all{
			background-color: white;
			font-family: cursive;
			margin: 10px;
			margin-top: 5px;
			height: 50px;
			padding: 10px;

		}
		#one{
		float: left;
    	width: 30px;
   		height: 30px;
		padding: 10px;
		}
		#status{
			float: left;
		}
		label{
			float: right;
			font-family: cursive;
			font-weight: bold;
			margin-right: 30px;

		}
		
	</style>
</head>
<body>



<?php
	session_start();
	require("connection.php");
	$user_info = $_SESSION['users'];

	if (isset($_GET['action']) && $_GET['action'] == "show_msg" ) {

	$query = "SELECT message FROM chat_message 
			  WHERE user_id = '".$user_info['user_id']."'";

	 	$result = mysqli_query($connection,$query);
	 	if ($result->num_rows>0) {
	 		 while ($row = mysqli_fetch_assoc($result)) { ?>
	 		 <div id="show_all" >  
	 		 <img id="one" src="<?php echo $user_info['user_profile'];?>" >
	 		 <?php
	 		 echo $row['message']."<br>"; 

	 		 ?>
	 		 </div>
	 		 <?php

			}
		}
	}
	elseif(isset($_POST['action']) && $_POST['action'] == "send_message" )
	{
		extract($_POST);
		$insert_query = "INSERT INTO chat_message(user_id,message)
		 				 VALUES ('".$user_info['user_id']."','".$_POST['message']."')";
		 $result = mysqli_query($connection,$insert_query);
		if($result)
		{ 
			 echo "message sent";
			 
		}
		else
		{
			echo  "Message not sent";
		}


	 	}
	 elseif(isset($_GET['action']) && $_GET['action'] == "show_users" )
	{

		$query = "SELECT first_name,last_name,is_online FROM user";


		$result = mysqli_query($connection,$query);
	 	if ($result->num_rows>0) {
	 		 while ($row = mysqli_fetch_assoc($result)) { ?>
	 		 <div id="show_all" > <?php echo $row['first_name']." ".$row['last_name']; 
	 		 ?>
	 		 <?php
	 		 
	 		  if($row['is_online'] == 1)
	 		  {
	 		  		echo "<label style='color:green;'>online<label>";
	 		  		// echo "<h3 style='color:green;'>online</h3>";
	 		  }
	 		  else
	 		  {
	 		  		echo "<label style='color:green;'>online<label>";

	 		  }
	 		  ?>
	 		 </div>
	 		 <?php

			}
		}
	}





?>
</body>
</html>

