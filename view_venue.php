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

   			$result = mysqli_query($success,"select * from venues
   			where venue_id='$venue_id' ");
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
		
		?>
	</body>
</html> 