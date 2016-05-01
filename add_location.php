<!doctype html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="add_location.css"/>
		<title>post selection</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
<?php
	$username=$_POST["username"];
	$password=$_POST["password"];
	echo
   		"<form action='map.php' method='post'>						
  		<button id='sign' type='submit' name='username' value=$username>Post With Location</button>  
  		<input type='hidden' name='password' value=$password>						 						 
		</form>";
	echo
   		"<form action='new_post.php' method='post'>						
  		<button id='sign' type='submit' name='username' value=$username>Post Without Location</button>  
  		<input type='hidden' name='password' value=$password>						 						 
		</form>";
?>

</body>
</html>