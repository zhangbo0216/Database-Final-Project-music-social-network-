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
   			$result = mysqli_query($link, "select * from  like_venue where fans='$username'");
   			echo "The Venues you like";
   			while($row = mysqli_fetch_array($result))
   			{	

    				$venue_id=$_POST["venue_id"];
										    				
					echo 
					"<form action='view_user.php' method='post'>						
  						<button type='submit' name='venue_id' value=$uname>$venue_id</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";			
					echo "<br/>";
   			}
   			echo "The artists you like";
   			$result = mysqli_query($link, "select * from  like_artist where fans='$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				$ARTIST_NAME=$row['artist'];
					echo 
					"<form action='friend_accept.php' method='post'>						
  						<button type='submit' name='ARTIST_NAME' value=$ARTIST_NAME>Accept</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";
					echo "<br/>";
   			}
		?>
	</body>
</html> 