<!doctype html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="friends.css"/>
		<title>friend request</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1>

<?php
			if (isset($_POST["username"])){
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

			//$link = mysqli_init();
			$success = mysqli_connect(
   			//$link, 
   			$host, 
   			$user, 
   			"", 
   			$db
   			);
   			$result = mysqli_query($success,"insert into fans (username, email, password, register_time, description, address, privacy) values ('$username', '$email', '$password', CURRENT_TIMESTAMP, '$description', '$address', '$privacy')");
			}
			echo "<h2>success</h2>";
			echo "
   				<form action='sign_in.html' method='post'>
				<button id='sign' type='submit' name='username' value=$username>Continue</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
   		?>
		
		</body>
<html>