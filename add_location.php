<?php
	$username=$_POST["username"];
	$password=$_POST["password"];
	echo
   		"<form action='map.php' method='post'>						
  		<button type='submit' name='username' value=$username>Post With Location</button>  
  		<input type='hidden' name='password' value=$password>						 						 
		</form>";
	echo
   		"<form action='new_post.php' method='post'>						
  		<button type='submit' name='username' value=$username>Post Without Location</button>  
  		<input type='hidden' name='password' value=$password>						 						 
		</form>";
	
?>