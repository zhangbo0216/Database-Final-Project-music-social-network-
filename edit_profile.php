<html>
	<body>
		<form action="edit_profile.php" method="post">
			What do you want to edit: 
			<input type="text" name="content">
			<select type="text" name="attribute">
  				<option value="password">password</option>
  				<option value="DESCRIPTION">description</option>
  				<option value="address">address</option>
  				<option value="email">email</option>
  				<option value="privacy">privacy</option>
  				
			</select><br>
			<input type='hidden' name='username' value="<?php echo $_POST['username'];?>" > 
			<input type="submit">
		</form>
		<?php
			$username=$_POST["username"];
			$content=$_POST["content"];
			$attribute=$_POST["attribute"];
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
   			$result=mysqli_query($link,"update fans set $attribute = '$content' where username = '$username'");
			
			
   		?>
	</body>
</html> 