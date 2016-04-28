<html>
	<body>
		<?php
			$username=$_POST["username"];
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
					</form>";			
					echo "<br/>";
				}
			}
			if ($database==2)
   			{
				$result = mysqli_query($link,"select newsname from news where content like '%$content%' ");
				while($row = mysqli_fetch_array($result))
				{
					echo $row['newsname'];			
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
					echo $row['ARTIST_NAME'];			
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
					echo $row['venuename'];			
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
					echo $row['CONCERT_NAME'];			
					echo "<br/>";
				}
			}
		?>
	</body>
</html> 