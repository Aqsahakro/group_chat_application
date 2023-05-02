<!DOCTYPE html>
<html>
<head>
	<title>GROUP CHAT APPLICATION</title>
	<style type="text/css">
		fieldset{
			padding: 10px;
			font-family: cursive;
			width: 50px;
		}
	</style>
</head>
<body>
	<form action="login_process.php" method="POST">
		<center>
		<h1>Group Chat Application</h1>
		<p>
		 <?php
					if (isset($_REQUEST['msg'])) {
						
						echo "<tr><td colspan='2' style='color:red;'>".$_REQUEST['msg']."</td></tr>";
					}
				?>
		</p>
		<fieldset>
			<legend>Login Here..!!</legend>
			<table>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" required></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" required></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="login" value="Login" ></td>
				</tr>
			</table>
		</fieldset>
		</center>
	</form>

</body>
</html>