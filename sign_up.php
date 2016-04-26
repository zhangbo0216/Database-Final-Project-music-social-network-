<html>
	<head>
		<link type="text/css" rel="stylesheet" href="sign_up.css"/>
		<title>sign_up</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<div class="log_in">
		<form action="sign_up.php" method="post">
		<table>
			<tr>
				<th>Username:</th> <td><input type="text" name="username"><br></td>
			</tr>
			<tr>
				<th>Password:</th><td> <input type="text" name="password"><br></td>
			</tr>
			<tr>
				<th>Email:</th><td> <input type="text" name="email"><br></td>
			</tr>
			<tr>
				<th>Description:</th><td> <input type="text" name="description"><br></td>
			</tr>
			<tr>
				<th>Address:</th><td> <input type="text" name="address"><br></td>
			</tr>
			<tr>
				<th>Privacy:</th> <td>
					<select type="text" name="privacy">
						<option value="public">Public</option>
						<option value="friend">Friend Only</option>
						<option value="self">Secret</option>
					</select><br></td>
			</table>
						
				<p><input id="sign" type="submit" value="Done"</p>
		</form>
		</div>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
			$email=$_POST["email"];
			$description=$_POST["description"];
			$address=$_POST["address"];
			$privacy=$_POST["privacy"];
			
			ini_set('display_errors','on');
			error_reporting(E_ALL);	
			
			$user = 'root';
			$lpassword = 'root';
			$db = 'music_social';
			$host = 'localhost';
			$port = 3306;

			$link = mysqli_init();
			$success = mysqli_connect(
   			//$link, 
   			$host, 
   			$user, 
   			"", 
   			$db
   			);
   			$result = mysqli_query($link,"insert into fans (username, email, password, register_time, description, address, privacy) values ('$username', '$email', '$password', CURRENT_TIMESTAMP, '$description', '$address', '$privacy')");

   		?>
	</body>
</html>