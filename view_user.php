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
		
		?>
	</body>
</html> 