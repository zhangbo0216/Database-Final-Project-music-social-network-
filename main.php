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

			$link = mysqli_init();
			$success = mysqli_real_connect(
   			$link, 
   			$host, 
   			$user, 
   			$lpassword, 
   			$db,
   			$port);
   			$result = mysqli_query($link,"select * from fans where username='$username' and password='$password'");
   			
   			$c_password = mysqli_fetch_array($result);
   			if ($c_password['username']!=$username)
   				echo "You enter the Wrong username or password, please check again.";
   			else
   			{
   				echo "
   				<form action='edit_profile.php' method='post'>
  					<button type='submit' name='username' value=$username>Edit My Profile</button>
  					<input type='hidden' name='password' value=$password>  	
  				</form>
   				<form action='add_location.php' method='post'>
  					<button type='submit' name='username' value=$username>New Post</button>
  					<input type='hidden' name='password' value=$password>
  				</form>
  				<form action='check_my_post.php' method='post'>
  					<button type='submit' name='username' value=$username>Check My Post</button>
  					<input type='hidden' name='password' value=$password>
  				</form>
  				<form action='friends.php' method='post'>
  					<button type='submit' name='username' value=$username>My Friends</button>
  					<input type='hidden' name='password' value=$password>
  				</form>
  				<form action='like.php' method='post'>
  					<button type='submit' name='username' value=$username>My Friends</button>
  					<input type='hidden' name='password' value=$password>
  				</form>
  				<form action='search.php' method='post'>				
  					<input type='text' name='content'>
  					<select type='text' name='database'>
  						<option value=1>Post</option>
  						<option value=2>News</option>
  						<option value=3>User</option>
  						<option value=4>Artist</option>
  						<option value=5>Venue</option>
  						<option value=6>Concert</option>
  					</select><br>
  					<button type='submit' name='username' value=$username>Search</button>
  					<input type='hidden' name='password' value=$password>
  				</form>
  				";
   			}
		?>
	</body>
</html> 