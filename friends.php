<html>
	<head>
		<link type="text/css" rel="stylesheet" href="friends.css"/>
		<title>my friends</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1>
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
			echo "<h2>MY Friend:</h2>";
   			$result = mysqli_query($success, "select fans1 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans2 = '$username' union select fans2 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans1 = '$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				$uname=$row['friend'];
					echo 
					"<form action='view_user.php' method='post'>						
  						<button id='sign' type='submit' name='vuser' value=$uname>$uname</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";			
					echo "<br/>";
   			}
   			echo "<h2>Friend Request:</h2>";
   			$result = mysqli_query($success, "select fans1 as friend from like_fans where friend_time = '0000-00-00 00:00:00' and fans2='$username'");
   			while($row = mysqli_fetch_array($result))
   			{	

    				$uname=$row['friend'];
    				echo "<h3>$uname</h3>";
					echo 
					"
					<div class='fad'>
					<form action='friend_accept.php' method='post'>						
  						<button id='sign' type='submit' name='user1' value=$uname>Accept</button> 
  						<input type='hidden' name='user2' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>
					<form action='friend_decline.php' method='post'>						
  						<button id='sign' type='submit' name='user1' value=$uname>Decline</button> 
  						<input type='hidden' name='user2' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>
					</div>";
					echo "<br/>";
   			}
			   				echo "
							<form action='main.php' method='post'>
				<button id='back' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>";
		?>
	</body>
</html> 