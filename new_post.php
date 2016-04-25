<html>
	<body>
	
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			Title: <input type="text" name="title"><br>
			Content: <input type="text" name="content"><br>
			Photo: <input type="text" name="photo"><br>
			Video: <input type="text" name="video"><br>
			Location: <input type="text" name="location"><br>
			Privacy of Your Posting: 
			<select type="text" name="privacy">
  				<option value="public">Public</option>
  				<option value="friend">Friend Only</option>
  				<option value="self">Secret</option>
			</select><br>
			<input type="submit">
		</form>
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") 
			{
				$username=$_POST['username'];
				$title=$_POST['title'];
				$content=$_POST['content'];
				$photo=$_POST['photo'];
				$video=$_POST['video'];
				$location=$_POST['location'];
				$privacy=$_POST['privacy'];
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
				"", 
				$db
				);
				$result=mysqli_query($success,"Insert into user_post (author, content, photo, video, title, location, post_time, privacy) values('$username', '$content', '$photo', '$video', '$title', '$location', CURRENT_TIMESTAMP,'$privacy')");
			}
   		?>
	</body>
</html> 