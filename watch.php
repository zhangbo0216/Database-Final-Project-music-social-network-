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
		if(isset($_GET['video_id']))
		{
			$id=$_GET['video_id'];
			$query=mysqli_query($success, "SELECT * FROM post_video WHERE video_id='$id'");
			while($row=mysqli_fetch_assoc($query))
			{
				$name=$row['video_name'];
				$url=$row['video_addr'];
			}
			echo "you are watching".$name."<br/>";
			echo"<video src='$url' width='560' height='315'></video>"; //<image></image> for images
		}
		else
		{
			echo "error!";
		}
	?>	
	</body>
</html>