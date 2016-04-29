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
   			$title=$_POST["title"];
   			
			
			$result = mysqli_query($link,"select privacy from user_post 
   			where title='$title' ");
   			
   			$privacy=mysqli_fetch_array($result)["privacy"];

   			
   			if (strcmp($privacy,"public")==0)
   			{
   				$result = mysqli_query($link,"select * from user_post 
   				where title='$title' ");
   				$row = mysqli_fetch_array($result);
				echo $row["title"],$row["author"],$row["content"],$row["post_time"];
				$video_url=$row['video'];
				$photo_url=$row['photo'];
				echo"<video src='$video_url' width='560' height='315'></video>";
				echo"<image src='$photo_url' width='560' height='315'></image>";
				
				$author=$row["author"];
				$post_time=$row["post_time"];
				$result = mysqli_query($link,"select * from post_comments 
   				where to_username='$author' and post_time='$post_time' ");
				$row = mysqli_fetch_array($result);
				echo $row['from_username'],$row['comment_time'],$row['content'];
   			}
   			
   			
		
		?>
	</body>
</html> 