<?php
	session_start();
	require_once("connection.php");

	if(isset($_POST['login']))
	{
		$query = "SELECT * FROM user";
		$result = mysqli_query($connection,$query);
		if ($result->num_rows>0) 
		{
			while($row = mysqli_fetch_assoc($result))
			{
			if($_POST['email'] == $row['email'] && $_POST['password'] == $row['password'])
			{
				$_SESSION['users'] = $row;

			$update_query = "UPDATE user SET is_online = '1'
						 WHERE user_id = '".$row['user_id']."'";
			$res = mysqli_query($connection,$update_query);

			if($res)
			{
					header("location:chat_messages.php");
			}
			else
			{
				header("location:index.php?msg=Invalid Email/Password&color=red");
			}

		}
		}
	}
}
		else 
		{
		header("location:index.php?msg=Please login first&color=red");
		}
?>