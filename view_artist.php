<html>
	<head>
		<link type="text/css" rel="stylesheet" href="view_artist.css"/>
		<title>view artist</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
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
   			$ARTIST_NAME=$_POST["ARTIST_NAME"];
			$password=$_POST["password"];
   			echo
   				"<form action='like_artist.php' method='post'>						
  				<button id='sign' type='submit' name='username' value=$username>Like</button> 
  				<input type='hidden' name='ARTIST_NAME' value=$ARTIST_NAME>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
				
			echo
   				"<form action='dislike_artist.php' method='post'>						
  				<button id='sign' type='submit' name='username' value=$username>Dislike</button> 
  				<input type='hidden' name='ARTIST_NAME' value=$ARTIST_NAME>  
  				<input type='hidden' name='password' value=$password>						 						 
				</form>";
			//echo $ARTIST_NAME;
   			$result = mysqli_query($success,"select * from artist 
   			where ARTIST_NAME='$ARTIST_NAME' ");
   			$row = mysqli_fetch_array($result);
			$aname=$row["ARTIST_NAME"];
			$ge=$row["GENRE"];
			$desc=$row["DESCRIPTION"];
			echo "
					<p><span id='info'>Artist Information</span></br>
						<span>Artist Name:</span> $aname</br>
						<span>Genre:</span> $ge</br>
						<span>Description:</span> $desc</br>
					</p>
			";
							echo "
   				<form action='main.php' method='post'>
				<button id='back' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
		
		?>
	</body>
</html> 