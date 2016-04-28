<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>video upload and playback</title>
	</head>
	<body>
		<a href="video.php">videos</a>
		<form action="index.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file"/>
			<input type="submit" name="submit" value="upload"/>
		</form>
		<?php
			//$username=$_POST["username"];
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
			if(isset($_POST['submit']))
			{
					$name= $_FILES['file']['name'];
					$temp= $_FILES['file']['tmp_name'];
					
					move_uploaded_file($temp, "upload_video/".$name);
					$url="http://127.0.0.1/Database-Final-Project-music-social-network-/upload_video/$name";
					mysqli_query($success,"INSERT INTO post_video VALUE('', '$name', '$url')");
			}
			
			if(isset($_POST['submit']))
			{
				echo "<br/>".$name."has been uploaded";
			}
		?>
	</body>
</html>