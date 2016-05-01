<!doctype html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="friends.css"/>
		<title>friend request</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1>
<?php
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
   			
   			$username=$_POST["username"];
   			$author=$_POST["author"];
			$post_time=$_POST["post_time"];
			$password=$_POST["password"];
			$content=$_POST["content"];
			
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
   			$db,
   			$port);
			//echo $content,$username, $password, $author, $post_time;
   			$result=mysqli_query($success,"Insert into post_comments(from_username,content,comment_time,to_username,post_time) values ('$username', '$content', CURRENT_TIMESTAMP,'$author','$post_time')");
   	
   			echo " <h2>comment scuccessful</h2>";
   			echo "
   				<form action='main.php' method='post'>
				<button id='sign' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				"
?>
	</body>
</html>