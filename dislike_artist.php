<html>
	<head>
		<link type="text/css" rel="stylesheet" href="friend_request.css"/>
		<title>view artist</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
<?php
						
			$username=$_POST["username"];
   			$ARTIST_NAME=$_POST["ARTIST_NAME"];
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
   			$db);
   			$result=mysqli_query($success,"delete from like_artist where (fans = '$username' and artist = '$ARTIST_NAME');");
   			echo $ARTIST_NAME;
   			echo "<h2>You dislike $ARTIST_NAME now</h2>";
   			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>
</body>
</html>