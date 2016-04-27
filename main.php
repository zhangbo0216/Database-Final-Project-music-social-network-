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
   				<div class='main'><form action='edit_profile.php' method='post'>
  					<button class='edit' type='submit' name='username' value=$username><p>Edit My Profile</p></button>
  				</form></div>
   				<div class='main'><form action='new_post.php' method='post'>
  					<button class='newpost' type='submit' name='username' value=$username><p>New Post</p></button>
  				</form></div>
  				<div class='main'><form action='check_my_post.php' method='post'>
  					<button class='checkpost' type='submit' name='username' value=$username><p>Check My Post</p></button>
  				</form></div>
				<div class='main'><form action='friends.php' method='post'>
  					<button class='friends' type='submit' name='username' value=$username><p>My Friends</p></button>
  				</form></div>
				<div class='searches'>
				<form action='search.php' method='post'>				
  					<div class='se_con' ><input type='text' name='content'></div>
  					<div class='se_con' ><select type='text' name='database'>
  						<option value=1>Post</option>
  						<option value=2>News</option>
  						<option value=3>User</option>
  						<option value=4>Artist</option>
  						<option value=5>Venue</option>
  						<option value=6>Concert</option>
  					</select><br></div>
  					<h2><button id='sign' type='submit' name='username' value=$username>Search</button></h2>
  				</form></div>
				</div>
  				";
   			}
		?>
	</body>
</html> 