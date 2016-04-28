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
   			$newsname=$_POST["newsname"];
   			
			
   			$result = mysqli_query($link,"select * from news 
   			where newsname='$newsname' ");
   			$row = mysqli_fetch_array($result);
			echo $row["newsname"],$row["content"];
		
		?>
	</body>
</html> 