<html>
	<body>
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
   			$db);
   			
   			$username=$_POST["username"];
   			$title=$_POST["title"];
   			
			
			$result = mysqli_query($success,"select privacy from user_post 
   			where title='$title' ");
   			
   			$privacy=mysqli_fetch_array($result)["privacy"];

   			
   			if (strcmp($privacy,"public")==0)
   			{
   				$result = mysqli_query($success,"select * from user_post 
   				where title='$title' ");
   				$row = mysqli_fetch_array($result);
				echo $row["title"],$row["author"],$row["content"];
   			}
		
		?>
	</body>
</html> 