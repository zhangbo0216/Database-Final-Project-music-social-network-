<html>
	<body>
		<form action="insert_post.php" method="post">
			Title: <input type="text" name="title"><br>
			Content: <input type="text" name="content"><br>
			Photo: <input type="text" name="photo"><br>
			Video: <input type="text" name="video"><br>
			Privacy of Your Posting: 
			<select type="text" name="privacy">
  				<option value="public">Public</option>
  				<option value="friend">Friend Only</option>
  				<option value="self">Secret</option>
			</select><br>
			<input type='hidden' name='username' value="<?php echo $_POST['username'];?>" > 
			<input type='hidden' name='password' value="<?php echo $_POST['password'];?>" >
			<input type='hidden' name='location' value="<?php echo $_POST['location'];?>" >
			<input type="submit">
		</form>
	</body>
</html> 