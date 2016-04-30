<?php
						
			$username=$_POST["username"];
   			$ARTIST_NAME=$_POST["ARTIST_NAME"];
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
   			$result=mysqli_query($link,"delete from like_artist where (fans = '$username' and artist = '$$ARTIST_NAME');");
   			
   			echo "Congratudlation! You dislike $ARTIST_NAME";
   			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>