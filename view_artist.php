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
   			
			//echo $ARTIST_NAME;
   			$result = mysqli_query($link,"select * from artist 
   			where ARTIST_NAME='$ARTIST_NAME' ");
   			$row = mysqli_fetch_array($result);
			echo $row["ARTIST_NAME"],$row["GENRE"],$row["DESCRIPTION"];
		
		?>
	</body>
</html> 