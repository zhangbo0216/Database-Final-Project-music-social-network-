<html>
	<head>
		<link type="text/css" rel="stylesheet" href="new_post.css"/>
		<title>new_post</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<div class="log_in">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<h2>what are you thinking today?</h2>
			<table>
			<tr>
				<th>Title:</th><td><input type="text" name="title"><br></td>
			</tr>
			<tr>
				<th>Content:</th><td> <input type="text" name="content"><br></td>
			</tr>
			<tr>
				<th>Photo:</th><td> <input type="text" name="photo"><br></td>
			</tr>
			<tr>
				<th>Video:</th><td> <input type="text" name="video"><br></td>
			</tr>
			<tr>
				<th>Location:</th><td> <input type="text" name="location"><br></td>
			</tr>
			<tr>
				<th>Privacy: </th>
				<td><select type="text" name="privacy">
					<option value="public">Public</option>
					<option value="friend">Friend Only</option>
					<option value="self">Secret</option>
				</select><br></td>
			</tr>
			<tr>
				<td><input type='hidden' name='username' value="<?php echo $_POST['username'];?>" ></td>
			</tr>
			</table>
			<p><input id="sign" type="submit" value="post"></p>
		</form>
		</div>
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