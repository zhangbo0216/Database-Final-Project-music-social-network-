<html>
	<body>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
			$content=$_POST["content"];
			$database=$_POST["database"];
			$user = 'root';
			$lpassword = 'root';
			$db = 'music_social';
			$host = 'localhost';
			$port = 3306;

			$link = mysqli_init();
			$success = mysqli_real_connect(
   			$link, 
   			$host, 
   			$user, 
   			$lpassword, 
   			$db,
   			$port);
   			if ($database==1)
   			{
				$result = mysqli_query($link,"select title
				from user_post
				where content like '%$content%' and privacy ='public'");
				while($row = mysqli_fetch_array($result))
				{
					$title=$row['title'];
					echo 
					"<form action='view_post.php' method='post'>						
  						<button type='submit' name='title' value=$title>$title</button> 
  						<input type='hidden' name='username' value=$username>  		
  						<input type='hidden' name='password' value=$password>				 						 
					</form>";			
					echo "<br/>";
				}
			}
			if ($database==2)
   			{
				$result = mysqli_query($link,"select newsname from news where content like '%$content%' ");
				while($row = mysqli_fetch_array($result))
				{
					$newsname=$row['newsname'];		
					echo "<form action='view_news.php' method='post'>						
  						<button type='submit' name='newsname' value=$newsname>$newsname</button> 
  						<input type='hidden' name='username' value=$username>  		
  						<input type='hidden' name='password' value=$password>				 						 
					</form>";	
					echo "<br/>";
				}
			}
			if ($database==3)
   			{
				$result = mysqli_query($link,"select username from fans
				where username like '%$content%' ");
				while($row = mysqli_fetch_array($result))
				{
					
					$uname=$row['username'];
					echo 
					"<form action='view_user.php' method='post'>						
  						<button type='submit' name='vuser' value=$uname>$uname</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";			
					echo "<br/>";
				}
			}
			if ($database==4)
   			{
				$result = mysqli_query($link,"select ARTIST_NAME from artist
				where ARTIST_NAME like '%$content%' ");
				while($row = mysqli_fetch_array($result))
				{
					$ARTIST_NAME=$row['ARTIST_NAME'];
					echo 
					"<form action='view_artist.php' method='post'>						
  						<button type='submit' name='ARTIST_NAME' value=$ARTIST_NAME>$ARTIST_NAME</button> 
  						<input type='hidden' name='username' value=$username>  		
  						<input type='hidden' name='password' value=$password>				 						 
					</form>";				
					echo "<br/>";
				}
			}
			if ($database==5)
   			{
				$result = mysqli_query($link,"select venue_id,venuename
				from venues
				where venuename like '%$content%' ");
				while($row = mysqli_fetch_array($result))
				{
					$venuename=$row['venuename'];
					$venue_id=$row['venue_id'];
					echo 
					"<form action='view_venue.php' method='post'>						
  						<button type='submit' name='venue_id' value=$venue_id>$venuename</button> 
  						<input type='hidden' name='username' value=$username>  	
  						<input type='hidden' name='password' value=$password>					 						 
					</form>";		
					echo "<br/>";
				}
			}
			if ($database==6)
   			{
				$result = mysqli_query($link,"select concert_id, CONCERT_NAME
				from concerts
				where CONCERT_NAME like '%$content%' ");
				while($row = mysqli_fetch_array($result))
				{
					$CONCERT_NAME=$row['CONCERT_NAME'];	
					$concert_id=$row['concert_id'];
					echo 
					"<form action='view_concert.php' method='post'>						
  						<button type='submit' name='concert_id' value=$concert_id>$CONCERT_NAME</button> 
  						<input type='hidden' name='username' value=$username>  
  						<input type='hidden' name='password' value=$password>						 						 
					</form>";				
					echo "<br/>";
				}
			}
		?>
	</body>
</html> 