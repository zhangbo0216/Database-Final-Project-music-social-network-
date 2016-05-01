<html>
	<head>
		<link type="text/css" rel="stylesheet" href="sign_up.css"/>
		<title>sign_up</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<div class="log_in">
		<form action="sign_up_succ.php" method="post">
		<table>
			<tr>
				<th>Username:</th> <td><input type="text" name="username"><br></td>
			</tr>
			<tr>
				<th>Password:</th><td> <input type="password" name="password"><br></td>
			</tr>
			<tr>
				<th>Email:</th><td> <input type="text" name="email"><br></td>
			</tr>
			<tr>
				<th>Description:</th><td> <input type="text" name="description"><br></td>
			</tr>
			<tr>
				<th>Address:</th><td> <input type="text" name="address"><br></td>
			</tr>
			<tr>
				<th>Privacy:</th> <td>
					<select type="text" name="privacy">
						<option value="public">Public</option>
						<option value="friend">Friend Only</option>
						<option value="self">Secret</option>
					</select><br></td>
			</table>
						
				<p><input id="sign" type="submit" value="Done"</p>
		</form>
		</div>
		
	</body>
</html>