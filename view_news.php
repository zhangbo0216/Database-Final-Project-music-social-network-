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
   			$newsname=$_POST["newsname"];
   			
			
   			$result = mysqli_query($success,"select * from news 
   			where newsname='$newsname' ");
   			$row = mysqli_fetch_array($result);
			echo $row["newsname"],$row["content"];
		
		?>
	</body>
</html> 