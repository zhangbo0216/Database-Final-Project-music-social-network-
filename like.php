<html>
		<head>
		<link type="text/css" rel="stylesheet" href="like.css"/>
		<title>edit_profile</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<?php
			$username=$_POST["username"];
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
   			$db);
   			$result = mysqli_query($success, "select * from  like_venue join venues on like_venue.venue_id=venues.venue_id where fans='$username'");
   			echo "<h2>The Venues you like</h2>";
   			while($row = mysqli_fetch_array($result))
   			{	

    				$venue_id=$row["venue_id"];
					$venue_name=$row["venuename"];					    				
					echo 
					"<form action='view_venue.php' method='post'>						
  						<button id='sign'type='submit' name='venue_id' value=$venue_id>$venue_name</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";			
					echo "<br/>";
   			}
   			echo "<h2>The artists you like</h2>";
   			$result = mysqli_query($success, "select * from  like_artist where fans='$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				$ARTIST_NAME=$row['artist'];
					echo 
					"<form action='view_artist.php' method='post'>						
  						<button id='sign' type='submit' name='ARTIST_NAME' value='$ARTIST_NAME'>$ARTIST_NAME</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";
					echo "<br/>";
   			}
			
							echo "
   				<form action='main.php' method='post'>
				<button id='back' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
		?>
	</body>
</html> 