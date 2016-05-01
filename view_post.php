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
			$password=$_POST["password"];
   			$title=$_POST["title"];
   			
			
			$result = mysqli_query($success,"select privacy from user_post 
   			where title='$title' ");
   			
   			$privacy=mysqli_fetch_array($result)["privacy"];

   			
   			
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
				$location=$row['location'];
				$map_url="https://maps.googleapis.com/maps/api/staticmap?
				center=$location&zoom=13&size=600x300&
				maptype=roadmap&markers=color:blue%7Clabel:S%7C$location";
				echo"
				<div>
					<p>
						<span>Titile: </span>$ti 
						 <span>Author: </span>$au 
						 <span>Post Time: </span>$ptime</br>
						<span>Content:</br> </span>$con</br>
						<video src='$video_url' width='560' height='415'></video></br>	
						<image id='img' src='$photo_url' width='560' height='415'></image></br>
						<image src='$map_url' width='560' height='415'></image>
						</p>
						</div>

					";

				//echo"";
				$author=$row["author"];
				$post_time=$row["post_time"];
				$result = mysqli_query($success,"select * from post_comments 
   				where to_username='$author' and post_time='$post_time' ");
				while($row = mysqli_fetch_array($result)){
				$funame=$row['from_username'];
				$ctime=$row['comment_time'];
				$con=$row['content'];
				echo "
					<p id='show_comm'>$funame:$con </br>$ctime</p>
				";}
				
				
				echo"
					<div class='comments'>
					<form action='new_comment.php' method='post'>
					<input class='comment' type='text' name='content' >
					<input class='comment' type='submit' value='new_comment'>
					<input type='hidden' name='post_time' value='$ptime'>
					<input type='hidden' name='author' value=$au>
					<input type='hidden' name='username' value=$username>
					<input type='hidden' name='password' value=$password>
					</form>
					<div>
				";
				
				echo "
				<div class='back'>
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
				</div>
   				";
   			}
		
		?>
	</body>
</html> 