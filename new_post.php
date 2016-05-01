<html>
	<head>
		<link type="text/css" rel="stylesheet" href="new_post.css"/>
		<title>new_post</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<div class="log_in">
			<form action="insert_post.php" method="post" enctype="multipart/form-data">
				<h2>what are you thinking today?</h2>
			<table>
			<tr>
				<th>Title:</th><td><input type="text" name="title"><br></td>
			</tr>
			<tr>
				<th>Content:</th><td><textarea id="context" cols="30" rows="3" name="content"></textarea><br></td>
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
				<td><input type='hidden' name='username' value="<?php echo $_POST['username'];?>" >
					<input type='hidden' name='password' value="<?php echo $_POST['password'];?>" >
					<input type='hidden' name='location' value="<?php 
						if (isset($_POST['location'])) echo $_POST['location'];
						else echo null;
					?>" ></td>
			</tr>
			<tr>
			<th>Video:</th><td> <input type="file" name="vfile"/></td></tr>
			<tr><th>Photo:</th><td> <input type="file" name="pfile"/></td></tr>
			</table>
			<p><input  type="submit" name="submit" value="post"/></p>
		</form>
		</div>
		
	</body>
</html> 