<?php
						
			$username=$_POST["username"];
   			$venue_id=$_POST["venue_id"];
			$password=$_POST["password"];
			
			
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
   			$result=mysqli_query($link,"delete from like_venue where (fans = '$username' and venue_id = '$venue_id');");
   			
   			
   			
   			echo "Congratudlation! You dislike the venue";
   			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>