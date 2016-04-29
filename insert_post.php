<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
			$title=$_POST["title"];
			$content=$_POST["content"];
			$photo=$_POST["photo"];
			$video=$_POST["video"];
			$location=$_POST["location"];
			$privacy=$_POST["privacy"];
			echo $username,$password,$location;
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
   			$result=mysqli_query($link,"Insert into user_post (author, content, photo, video, title, location, post_time, privacy) values('$username', '$content', '$photo', '$video', '$title', '$location', CURRENT_TIMESTAMP,'$privacy')");
?>