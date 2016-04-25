<html>
	<body>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
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
   			$result = mysqli_query($success,"select * from fans where username='{$username}' and password='{$password}'");
   			
   			$c_password = mysqli_fetch_array($result);
   			if ($c_password['username']!=$username)
   				echo "You enter the Wrong username or password, please check again.";
   			else
   			{
   				echo "
   				<form action='edit_profile.php' method='post'>
  					<button type='submit' name='username' value=$username>Edit My Profile</button>
  				</form>
   				<form action='new_post.php' method='post'>
  					<button type='submit' name='username' value=$username>New Post</button>
  				</form>
  				<form action='check_my_post.php' method='post'>
  					<button type='submit' name='username' value=$username>Check My Post</button>
  				</form>
  				
  				";
   			}
		?>
	</body>
</html> 