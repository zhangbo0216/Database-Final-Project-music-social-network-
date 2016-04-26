<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="main.css"/>
		<title>main</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
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
				<div class='contain'>
   				<div><form action='edit_profile.php' method='post'>
  					<button class='edit' type='submit' name='username' value=$username><p>Edit My Profile</p></button>
  				</form></div>
   				<div><form action='new_post.php' method='post'>
  					<button class='newpost' type='submit' name='username' value=$username><p>New Post</p></button>
  				</form></div>
  				<div><form action='check_my_post.php' method='post'>
  					<button class='checkpost' type='submit' name='username' value=$username><p>Check My Post</p></button>
  				</form></div>
				<div><form action='friend.php' method='post'>
  					<button class='friends' type='submit' name='username' value=$username><p>My Friends</p></button>
  				</form></div>
  				<div><form action='search.php' method='post'>
  					<button class='search' type='submit' name='username' value=$username><p>Search</p></button></div>
  				</form></div>
				</div>
  				";
   			}
		?>
	</body>
</html> 