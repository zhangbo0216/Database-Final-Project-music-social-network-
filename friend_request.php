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
   			$db,
   			$port);
   			$result=mysqli_query($success,"Insert into like_fans (fans1, fans2, friend_time) values
('$user1', '$user2', '0000-00-00 00:00:00');");
   			
   			echo " You have sent a friendship request to $user2";
   			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$user1>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>