<html>
	<body>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
			$user = 'root';
			$lpassword = 'root';
			$db = 'music_social';
			$host = 'localhost';
			$port = 3306;

			$link = mysqli_init();
			$success = mysqli_real_connect(
   			$link, 
   			$host, 
   			$user, 
   			$lpassword, 
   			$db,
   			$port);
   			$result = mysqli_query($link, "select fans1 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans2 = '$username' union select fans2 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans1 = '$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				$uname=$row['friend'];
					echo 
					"<form action='view_user.php' method='post'>						
  						<button type='submit' name='vuser' value=$uname>$uname</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";			
					echo "<br/>";
   			}
   			echo "request:";
   			$result = mysqli_query($link, "select fans1 as friend from like_fans where friend_time = '0000-00-00 00:00:00' and fans2='$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				$uname=$row['friend'];
    				echo $uname;
					echo 
					"<form action='friend_accept.php' method='post'>						
  						<button type='submit' name='user1' value=$uname>Accept</button> 
  						<input type='hidden' name='user2' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";
					echo "<br/>";
   			}
		?>
	</body>
</html> 