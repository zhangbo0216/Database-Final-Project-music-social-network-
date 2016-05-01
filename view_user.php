<html>
	<head>
		<link type="text/css" rel="stylesheet" href="view_user.css"/>
		<title>view user</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
		<h2>User Posts:</h2>
		<?php

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
   			
   			$username=$_POST["username"];
			$password=$_POST["password"];
   			$vuser=$_POST["vuser"];
    		$result = mysqli_query($success, "select fans1 as friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans2 = '$username' and fans1='$vuser' union select fans2 as 
   			friend from like_fans where friend_time <> '0000-00-00 00:00:00' and fans1 = '$username' and fans2='$vuser'");
   			
   			$row = mysqli_fetch_array($result);
   			
   			$friend=false;
   			echo $friend;
   			if (strcmp($row["friend"],$vuser)==0) 
   				$friend=true;
			if ($friend)
   			{
   				echo
   					"<form action='unfriend.php' method='post'>						
  					<button id='bu' type='submit' name='user1' value=$username>Unfriend</button> 
  					<input type='hidden' name='user2' value=$vuser>  
  					<input type='hidden' name='password' value=$password>						 						 
					</form>";
   				$result = mysqli_query($success,"select title from user_post 
   				where author='$vuser' and (privacy ='public' or privacy='friend')");
   			
   			while($row = mysqli_fetch_array($result))
			{
				$ti=$row["title"];
				echo "<div class='tit'>
						<form action='view_post.php' method='post'>
					<button id='ti' type='submit' name='username' value=$username>$ti</button> 
					<input type='hidden' name='password' value=$password>
					<input type='hidden' name='title' value='$ti'>
					</form>
						</br>
						</div>";
			}
			
			$result = mysqli_query($success,"select privacy from fans 
   			where username='$vuser' ");
   			
   			$privacy=mysqli_fetch_array($result)["privacy"];

   			
   			if (strcmp($privacy,"public")==0 or strcmp($privacy,"friend")==0)
   			{
   				$result = mysqli_query($success,"select * from fans 
   				where username='$vuser' ");
   				$row = mysqli_fetch_array($result);
				$uname=$row["username"];
				$em=$row["email"];
				$rtime=$row["register_time"];
				$desc=$row["DESCRIPTION"];
				$addr=$row["address"];
				echo "
						<p><span>User Information</span></br>
						Username: $uname</br>
						Email: $em</br>
						Rigister Time: $rtime</br>
						Description: $desc</br>
						Address: $addr</br>
					</p>
				";
				echo "
   				<form action='main.php' method='post'>
				<button id='back' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
   			}
		}
		else
   			{
   				//$result = mysqli_query($link,"select * from fans 
   				
   				echo
   					"<form action='friend_request.php' method='post'>						
  					<button id='bu' type='submit' name='user1' value=$username>Add Friend</button> 
  					<input type='hidden' name='user2' value=$vuser>  
  					<input type='hidden' name='password' value=$password>						 						 
					</form>";
   				
   				$result = mysqli_query($success,"select title from user_post 
   				where author='$vuser' and privacy ='public'");
   			
   				while($row = mysqli_fetch_array($result))
				{

					$ti=$row["title"];
					echo "
					<div class='tit'>
					<form action='view_post.php' method='post'>
					<button id='ti' type='submit' name='username' value=$username>$ti</button> 
					<input type='hidden' name='password' value=$password>
					<input type='hidden' name='title' value='$ti'>
					</form>
						</br>
						</div>";
				}
			
				$result = mysqli_query($success,"select privacy from fans 
   				where username='$vuser' ");
   				//$row = mysqli_fetch_array($result);
				//echo $row["username"],$row["email"],$row["register_time"],$row["DESCRIPTION"],$row["address"];
   			//}
		
   			
   				$privacy=mysqli_fetch_array($result)["privacy"];

   			
   				if (strcmp($privacy,"public")==0)
   				{
   					$result = mysqli_query($success,"select * from fans 
   					where username='$vuser' ");
   					$row = mysqli_fetch_array($result);
					$uname=$row["username"];
					$em=$row["email"];
					$rtime=$row["register_time"];
					$desc=$row["DESCRIPTION"];
					$addr=$row["address"];
					echo "
						<p><span>User Information</span></br>
						Username: $uname</br>
						Email: $em</br>
						Rigister Time: $rtime</br>
						Description: $desc</br>
						Address: $addr</br>
					</p>
				";
				echo "
   				<form action='main.php' method='post'>
				<button id='back' type='submit' name='username' value=$username>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
   				}
			}
		?>
	</body>
</html> 