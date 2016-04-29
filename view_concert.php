<html>
		<head>
		<link type="text/css" rel="stylesheet" href="view_concert.css"/>
		<title>view concert</title>
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
   			$concert_id=$_POST["concert_id"];
   			
   			$result = mysqli_query($success,"select * from concerts join venues join line_up on concerts.venue_id=venues.venue_id and concerts.concert_id=line_up.concert_id 
   			where concerts.concert_id='$concert_id' ");
   			$row = mysqli_fetch_array($result);
			$cname=$row["CONCERT_NAME"];
			$desc=$row["DESCRIPTION"];
			$stime=$row["starttime"];
			$etime=$row["endtime"];
			$vid=$row["venue_id"];
			$loc=$row["venuename"];
			$art=$row["BAND"];
			echo "
					<p><span id='info'>Concert Information</span></br>
						<span>Concert Name:</span> $cname</br>
						<span>Line-up Artists:</span> $art</br>
						<span>Start Time:</span> $stime</br>
						<span>End Time:</span> $etime</br>
						<span>Venue ID:</span> $vid</br>
						<span>Venue Name:</span> $loc</br>
						<span>Description:</span> $desc</br>
					</p>
			";
		
		?>
	</body>
</html> 