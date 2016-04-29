<?php		
			$user1=$_POST["user1"];		
			$user2=$_POST["user2"];
			
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
   			$result=mysqli_query($link,"update like_fans set friend_time = CURRENT_TIMESTAMP where fans1 = '$user1' and fans2 = '$user2';");
   			
   			echo "Congratudlation! You accept friend request from $user2";
   			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$user1>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>