<html>
		<head>
		<link type="text/css" rel="stylesheet" href="view_post.css"/>
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
				$video_url=$row['video'];
				$photo_url=$row['photo'];
				$ti=$row["title"];
				$au=$row["author"];
				$con=$row["content"];
				$ptime=$row["post_time"];
				echo"
				<div>
					<p>
						<span>Titile: </span>$ti 
						 <span>Author: </span>$au 
						 <span>Post Time: </span>$ptime</br>
						<span>Content: </span>$con</br>
						<video src='$video_url' width='560' height='415'></video></br>	
						<image id='img' src='$photo_url' width='560' height='415'></image>
						</p>
						</div>

					";
					
				
				$author=$row["author"];
				$post_time=$row["post_time"];
				$result = mysqli_query($success,"select * from post_comments 
   				where to_username='$author' and post_time='$post_time' ");
				$row = mysqli_fetch_array($result);
				$funame=$row['from_username'];
				$ctime=$r;ow['comment_time'];
				$con=$row['content'];
				echo "
					
				";
   			}
		
		?>
	</body>
</html> 