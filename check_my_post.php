<html>
	<body>
		<?php
<<<<<<< HEAD
			$username=$_POST['username'];
			$password=$_POST['password'];
=======
			
			$username=$_POST["username"];
>>>>>>> refs/remotes/origin/master
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
<<<<<<< HEAD
   			"", 
   			$db
   			);
   			$result
=======
   			$lpassword, 
   			$db,
   			$port);
   			$result=mysqli_query($link,"select * from user_post where author='$username'");
   			

   
   			while($row = mysqli_fetch_array($result))
   			{	

    				echo $row['title'];
					
					echo "<br/>";
   			}
   		
   

　　			
				
   		

>>>>>>> refs/remotes/origin/master
   		?>
	</body>
</html> 