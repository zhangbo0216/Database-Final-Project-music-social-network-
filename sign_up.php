<html>
	<body>
		<form action="sign_up.php" method="post">
			Username: <input type="text" name="username"><br>
			Password: <input type="text" name="password"><br>
			Email: <input type="text" name="email"><br>
			Description: <input type="text" name="description"><br>
			Address: <input type="text" name="address"><br>
			Privacy of Your Information: 
			<select type="text" name="privacy">
  				<option value="public">Public</option>
  				<option value="friend">Friend Only</option>
  				<option value="self">Secret</option>
			</select><br>
			<input type="submit">
		</form>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
			$email=$_POST["email"];
			$description=$_POST["description"];
			$address=$_POST["address"];
			$privacy=$_POST["privacy"];
			
			ini_set('display_errors','on');
			error_reporting(E_ALL);	
			
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
   			$result = mysqli_query($link,"insert into fans (username, email, password, register_time, description, address, privacy) values ('$username', '$email', '$password', CURRENT_TIMESTAMP, '$description', '$address', '$privacy')");

   		?>
	</body>
</html>