<html>
	<head>
		<link type="text/css" rel="stylesheet" href="view_news.css"/>
		<title>view news</title>
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
   			$db
   			);
   			
   			$username=$_POST["username"];
   			$newsname=$_POST["newsname"];
   		
			
   			$result = mysqli_query($success,"select * from news 
   			where newsname='$newsname' ");
   			$row = mysqli_fetch_array($result);
			$con=$row["content"];
			echo "<p>$con</p>";
		
		?>
	</body>
</html> 