<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="edit_profile.css"/>
		<title>edit_profile</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<div class="log_in">
		<form action="edit_profile.php" method="post">
			<h2>What do you want to edit:</h2>
			<div class="edit_pro">
			<input id="context" type="text" name="content">
			<select type="text" name="attribute">
  				<option value="password">password</option>
  				<option value="DESCRIPTION">description</option>
  				<option value="address">address</option>
  				<option value="email">email</option>
  				<option value="privacy">privacy</option>
  				
			</select><br>
			</div>
			<input type='hidden' name='username' value="<?php echo $_POST['username'];?>" > 
			<div class="edit_button"><input id="sign" type="submit" value="edit"></div>
		</form>
		</div>
		<?php
			$username=$_POST['username'];
			$password=$_POST["password"];
			$content=$_POST['content'];
			$attribute=$_POST['attribute'];
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
   			$result=mysqli_query($success, "update fans set $attribute = '$content' where username = '$username'");
			$result=mysqli_query($success, "select * from fans where username = '$username'");
			
			$row = mysqli_fetch_array($result);
			$uname=	$row['username'];
			$em=$row['email'];
			$rtime=	$row['register_time'];
			$desc=	$row['DESCRIPTION'];
			$addr=	$row['address'];
			$priv=	$row['privacy'];
			echo "
					<p><span>User Information</span></br>
						Username: $uname</br>
						Email: $em</br>
						Rigister Time: $rtime</br>
						Description: $desc</br>
						Address: $addr</br>
						Privacy: $priv</br>
					</p>
				";
			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";

   		?>
	</body>
</html> 