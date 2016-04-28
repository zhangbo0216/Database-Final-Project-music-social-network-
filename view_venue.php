<html>
	<body>
		<?php
			$username=$_POST["username"];
			$content=$_POST["content"];
			$database=$_POST["database"];
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
			echo $row["venuename"],$row["address"],$row["DESCRIPTION"];
		
		?>
	</body>
</html> 