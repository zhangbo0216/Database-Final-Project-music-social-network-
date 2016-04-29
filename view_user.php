<html>
	<body>
		<?php
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
   			
   			
   			
   			
   			$username=$_POST["username"];
   			$vuser=$_POST["vuser"];
   			$password=$_POST["password"];
   			
   			$result = mysqli_query($link, "select fans1 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans2 = '$username' and fans1='$vuser' union select fans2 as 
   			friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans1 = '$username' and fans2='$vuser'");
   			
   			$row = mysqli_fetch_array($result);
   			
   			$friend=false;
   			echo $friend;
   			if (strcmp($row["friend"],$vuser)==0) 
   				$friend=true;
   			
   			
   			if ($friend)
   			{
   				echo
   					"<form action='unfriend.php' method='post'>						
  					<button type='submit' name='user1' value=$username>unfriend</button> 
  					<input type='hidden' name='user2' value=$vuser>  
  					<input type='hidden' name='password' value=$password>						 						 
					</form>";
   				$result = mysqli_query($link,"select title from user_post 
   				where author='$vuser' and (privacy ='public' or privacy='friend')");
   			
   				while($row = mysqli_fetch_array($result))
				{

					echo $row["title"];
				}
			
				$result = mysqli_query($link,"select privacy from fans 
   				where username='$vuser' ");
   			
   				$privacy=mysqli_fetch_array($result)["privacy"];

   			
   				if (strcmp($privacy,"public")==0 or strcmp($privacy,"friend")==0)
   				{
   					$result = mysqli_query($link,"select * from fans 
   					where username='$vuser' ");
   					$row = mysqli_fetch_array($result);
					echo $row["username"],$row["email"],$row["register_time"],$row["DESCRIPTION"],$row["address"];
   				}
   			}
   			
   			else
   			{
   				
   				echo
   					"<form action='friend_request.php' method='post'>						
  					<button type='submit' name='user1' value=$username>Add Friend</button> 
  					<input type='hidden' name='user2' value=$vuser>  
  					<input type='hidden' name='password' value=$password>						 						 
					</form>";
   				
   				$result = mysqli_query($link,"select title from user_post 
   				where author='$vuser' and privacy ='public'");
   			
   				while($row = mysqli_fetch_array($result))
				{

					echo $row["title"];
				}
			
				$result = mysqli_query($link,"select privacy from fans 
   				where username='$vuser' ");
   			
   				$privacy=mysqli_fetch_array($result)["privacy"];

   			
   				if (strcmp($privacy,"public")==0)
   				{
   					$result = mysqli_query($link,"select * from fans 
   					where username='$vuser' ");
   					$row = mysqli_fetch_array($result);
					echo $row["username"],$row["email"],$row["register_time"],$row["DESCRIPTION"],$row["address"];
   				}
			}
		?>
	</body>
</html> 