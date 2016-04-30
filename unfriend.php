<!doctype html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="friends.css"/>
		<title>unfriend</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1>

<?php
			
			
			$user1=$_POST["user1"];		
			$user2=$_POST["user2"];
			$password=$_POST["password"];
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
   			$result=mysqli_query($success,"delete from like_fans where (fans1 = '$user1' and fans2 = '$user2') or (fans1 = '$user2' and fans2 = '$user1')");
   			
   			echo " <h2>You and $user2 are not friends now</h2>";
   			echo "
   				<form action='main.php' method='post'>
				<button id='sign' type='submit' name='username' value=$user1>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>

</body>
<html>