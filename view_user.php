<html>
	<head>
		<link type="text/css" rel="stylesheet" href="view_user.css"/>
		<title>view user</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<h2>User Posts:</h2>
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
   			$vuser=$_POST["vuser"];
   			$result = mysqli_query($success,"select title from user_post 
   			where author='$vuser' and privacy ='public'");
   			
   			while($row = mysqli_fetch_array($result))
			{
				$ti=$row["title"];
				echo "<div class='tit'>
						$ti</br>
						</div>";
			}
			
			$result = mysqli_query($success,"select privacy from fans 
   			where username='$vuser' ");
   			
   			$privacy=mysqli_fetch_array($result)["privacy"];

   			
   			if (strcmp($privacy,"public")==0)
   			{
   				$result = mysqli_query($success,"select * from fans 
   				where username='$vuser' ");
   				$row = mysqli_fetch_array($result);
				$uname=$row["username"];
				$em=$row["email"];
				$rtime=$row["register_time"];
				$desc=$row["DESCRIPTION"];
				$addr=$row["address"];
				echo "
						<p><span>User Information</span></br>
						Username: $uname</br>
						Email: $em</br>
						Rigister Time: $rtime</br>
						Description: $desc</br>
						Address: $addr</br>
					</p>
				";
   			}
		
		?>
	</body>
</html> 