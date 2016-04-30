<html>
	<body>
		<?php
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
   			
   			$username=$_POST["username"];
   			$venue_id=$_POST["venue_id"];
			$password=$_POST["password"];
			
			echo
   				"<form action='like_venue.php' method='post'>						
  				<button type='submit' name='username' value=$username>Like</button> 
  				<input type='hidden' name='venue_id' value=$venue_id>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
			echo
   				"<form action='dislike_venue.php' method='post'>						
  				<button type='submit' name='username' value=$username>Dislike</button> 
  				<input type='hidden' name='venue_id' value=$venue_id>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
			
   			$result = mysqli_query($link,"select * from venues
   			where venue_id='$venue_id' ");
   			$row = mysqli_fetch_array($result);
			echo $row["venuename"],$row["address"],$row["DESCRIPTION"];
		
		?>
	</body>
</html> 