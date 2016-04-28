<html>
	<head>
		<link type="text/css" rel="stylesheet" href="check_my_post.css"/>
		<title>check_my_post</title>
	</head>
	<body>
		<?php

			$username=$_POST['username'];
			$password=$_POST['password'];
			$user = 'root';
			$lpassword = '';
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
   			$result=mysqli_query($success,"select * from user_post where author='$username'");
   			

   
   			while($row = mysqli_fetch_array($result))
   			{	

    				echo $row['title'];
					
					echo "<br/>";
   			}
   		
   		?>
	</body>
</html> 