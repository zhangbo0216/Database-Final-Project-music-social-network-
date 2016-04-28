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
   			$concert_id=$_POST["concert_id"];
   			
   			$result = mysqli_query($success,"select * from concerts
   			where concert_id='$concert_id' ");
   			$row = mysqli_fetch_array($result);
			echo $row["CONCERT_NAME"],$row["DESCRIPTION"];
		
		?>
	</body>
</html> 