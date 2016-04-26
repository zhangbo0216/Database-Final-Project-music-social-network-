<html>
	<body>
		<?php
			
			$username=$_POST["username"];
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
   			$result=mysqli_query($link,"select * from user_post where author='$username'");
   			

   
   			while($row = mysqli_fetch_array($result))
   			{	

    				echo $row['title'];
					
					echo "<br/>";
   			}
   		
   

　　			
				
   		

   		?>
	</body>
</html> 