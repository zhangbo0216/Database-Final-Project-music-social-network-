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
   			$ARTIST_NAME=$_POST["ARTIST_NAME"];
   			$password=$_POST["password"];
   			
   			
			echo
   				"<form action='like_artist.php' method='post'>						
  				<button type='submit' name='username' value=$username>Like</button> 
  				<input type='hidden' name='ARTIST_NAME' value=$ARTIST_NAME>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
			echo
   				"<form action='dislike_artist.php' method='post'>						
  				<button type='submit' name='username' value=$username>Dislike</button> 
  				<input type='hidden' name='ARTIST_NAME' value=$ARTIST_NAME>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
			
   			$result = mysqli_query($link,"select * from artist 
   			where ARTIST_NAME='$ARTIST_NAME' ");
   			$row = mysqli_fetch_array($result);
			echo $row["ARTIST_NAME"],$row["GENRE"],$row["DESCRIPTION"];
		
		?>
	</body>
</html> 