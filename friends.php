<html>
	<body>
		<?php
			$username=$_POST["username"];
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
   			$result = mysqli_query($success, "select fans1 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans2 = '$username' union select fans2 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans1 = '$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				echo $row['friend'];
					
					echo "<br/>";
   			}
   			echo "request:";
   			$result = mysqli_query($success, "select fans1 as friend from like_fans where friend_time == '0000-00-00 00:00:00' and fans2='$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				echo $row['title'];
					
					echo "<br/>";
   			}
		?>
	</body>
</html> <html>
	<body>
		<?php
			$username=$_POST["username"];
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

    				echo $row['friend'];
					
					echo "<br/>";
   			}
   			echo "request:";
   			$result = mysqli_query($link, "select fans1 as friend from like_fans where friend_time == '0000-00-00 00:00:00' and fans2='$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				echo $row['title'];
					
					echo "<br/>";
   			}
		?>
	</body>
</html> 