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
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>video upload and playback</title>
	</head>
	<body>
	<?php
		$query= mysqli_query($success,"SELECT * FROM user_post");
		while($row=mysqli_fetch_assoc($query))
		{
			//$id=$row['video_id'];
			//$name=$row['video_name'];
			
			$url=$row['video'];
			echo $url;
			echo"<video src='$url' width='560' height='315'></video>"; 
			//echo "<a href='watch.php?video_id=$id'> $name </a><br/>";
		}
	?>	
	</body>
</html>