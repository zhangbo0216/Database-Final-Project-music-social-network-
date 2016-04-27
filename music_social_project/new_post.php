<html>
	<body>
		<form action="new_post.php" method="post">
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
			<input type='hidden' name='username' value="<?php echo $_POST['username'];?>" > 
			<input type="submit">
		</form>
		<?php
			$username=$_POST["username"];
			$title=$_POST["title"];
			$content=$_POST["content"];
			$photo=$_POST["photo"];
			$video=$_POST["video"];
			$location=$_POST["location"];
			$privacy=$_POST["privacy"];
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
   			$result=mysqli_query($link,"Insert into user_post (author, content, photo, video, title, location, post_time, privacy) values('$username', '$content', '$photo', '$video', '$title', '$location', CURRENT_TIMESTAMP,'$privacy')");

   		?>
	</body>
</html> 