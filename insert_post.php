<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
			$title=$_POST["title"];
			$content=$_POST["content"];
			$photo=$_POST["photo"];
			$video=$_POST["video"];
			$location=$_POST["location"];
			$privacy=$_POST["privacy"];
			$location=substr($location,1,-1);
			echo $username,$password,$location,gettype($location),$title;
		
			
			echo "You just posted something new!!!";
			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
			
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