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
   			if ($database==1)
   			{
				$result = mysqli_query($success,"select author, content, photo, video, title, location, post_time
				from user_post
				where content like '%$content%' and privacy ='public'");
				while($row = mysqli_fetch_array($result))
				{
					echo $row['title'];			
					echo "<br/>";
				}
			}
			
		?>
	</body>
</html> <html>
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

			$link = mysqli_init();
			$success = mysqli_real_connect(
   			$link, 
   			$host, 
   			$user, 
   			$lpassword, 
   			$db,
   			$port);
   			if ($database==1)
   			{
				$result = mysqli_query($link,"select author, content, photo, video, title, location, post_time
				from user_post
				where content like '%$content%' and privacy ='public'");
				while($row = mysqli_fetch_array($result))
				{
					echo $row['title'];			
					echo "<br/>";
				}
			}
			
		?>
	</body>
</html> 