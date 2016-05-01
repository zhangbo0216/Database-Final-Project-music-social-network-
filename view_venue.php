<!doctype html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="view_venue.css"/>
		<title>view venue</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<?php

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
   			
   			$username=$_POST["username"];
   			$venue_id=$_POST["venue_id"];
			$password=$_POST["password"];
			echo
   				"<form action='like_venue.php' method='post'>						
  				<button id='sign' type='submit' name='username' value=$username>Like</button> 
  				<input type='hidden' name='venue_id' value=$venue_id>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
			echo
   				"<form action='dislike_venue.php' method='post'>						
  				<button id='sign' type='submit' name='username' value=$username>Dislike</button> 
  				<input type='hidden' name='venue_id' value=$venue_id>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
   			$result = mysqli_query($success, "select * from venues where venue_id='$venue_id' ");
			
   			$row = mysqli_fetch_array($result);
			$vname= $row["venuename"];
			$addr=$row["address"];
			$desc=$row["description"];
			echo"
					<p><span id='info'>Venue Information</span></br>
						<span>Venue Name:</span> $vname</br>
						<span>Address:</span> $addr</br>
						<span>Description:</span> $desc</br>
					</p>
			";
			
										echo "
   				<form action='main.php' method='post'>
				<button id='back' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
		
		?>
	</body>
</html> 