<html>
	<head>
		<link type="text/css" rel="stylesheet" href="check_my_post.css"/>
		<title>check_my_post</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1>
		<h2>Results Are Shown Below:</h2>
	</div>
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

    				$title=$row['title'];
					echo 
					"<div>
					<form action='view_post.php' method='post'>						
  						<button id='sign' type='submit' name='title' value='$title'>$title</button> 
  						<input type='hidden' name='username' value=$username>
						<input type='hidden' name='password' value=$password>						
					</form></div>";
									
					echo "<br/>";
   			}
				echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
   		
   		?>
	</body>
</html> 