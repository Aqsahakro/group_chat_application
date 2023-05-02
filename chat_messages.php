<?php
	session_start();
	if (!isset($_SESSION['users'])) {
	
	header("location:index.php?msg=Please Login First!...");	
}
	// require_once("connection.php");

	$user_info = $_SESSION['users'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $user_info['first_name']." ".$user_info['last_name']; ?>
	</title>
	<style type="text/css">
		@import url("styling.css");
	</style>
	<script type="text/javascript">
		setInterval(
			function ()
			{ 
			  showMessage();
			  show_all_users();
			},
			5000
			);
		// showMessage();
		// show_all_users();
		/*... show Messages ..*/
		function showMessage(){
			var obj;
			if (window.ActiveXObject) {
				obj = new ActiveXObject('Microsoft.XMLHTTP');
			}else{
				obj = new XMLHttpRequest();
			}

			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200) {
				document.getElementById('messages').innerHTML = obj.responseText;

				}
			}

			obj.open("GET","ajax_process.php?action=show_msg");
			obj.send();
		}
		/*... send Messages ..*/
		function sendMessage(){
			var message = document.getElementById("input").value;
			var obj;
			if (window.ActiveXObject) {
				obj = new ActiveXObject('Microsoft.XMLHTTP');
			}else{
				obj = new XMLHttpRequest();
			}

			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200) {
				document.getElementById('messages').innerHTML = obj.responseText;
					 showMessage();

				}
			}

			obj.open("POST","ajax_process.php");
			obj.setRequestHeader("content-type","application/x-www-form-urlencoded");
			obj.send("action=send_message&message="+message);
		}
		/*... show all users ..*/
		function show_all_users(){
			var obj;
			if (window.ActiveXObject) {
				obj = new ActiveXObject('Microsoft.XMLHTTP');
			}else{
				obj = new XMLHttpRequest();
			}

			obj.onreadystatechange = function(){

				if (obj.readyState == 4 && obj.status == 200) {
				document.getElementById('online_users').innerHTML = obj.responseText;

				}
			}

			obj.open("GET","ajax_process.php?action=show_users");
			obj.send();
		}

	</script>
</head>
<body>
	<center>
	<div id="header">
		<h1>Group Chat Application</h1>
	</div>
	</center>
	<div id="user_header">
		<a href="logout.php"> <button id="btn1">Logout</button> </a>
		<span>
			<img src="<?php echo $user_info['user_profile'];?>" > 
			<h3 id="user_info">
			<?php
			echo $user_info['first_name']." ".$user_info['last_name'];
			?>
			</h3>
		</span>
		</div>


		<div class="row">
			<div id="messages">
					<span>
					</span>	
				</div>
				

				<div id="online_users">
					<span>
					</span>	
					
				</div>
				<div id="input_text">
					<span>
					<input type="text" name="text" placeholder="Type Here" id="input">
					<button id="sendbtn" onclick="sendMessage()">Send</button>
				</div>
			</div>
</body>
</html>