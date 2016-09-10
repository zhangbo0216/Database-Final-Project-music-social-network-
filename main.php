<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="main.css"/>
		<title>main</title>
	</head>
	<body>
	<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>
	<form action='sign_in.html' method='post'>
				<input id="out" type="submit" value="Log Out"></button> 

				</form>
		<?php
			$username=$_POST["username"];
			$password=$_POST["password"];
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
   			$result = mysqli_query($success,"select * from fans where username='{$username}' and password='{$password}'");
   			
   			$c_password = mysqli_fetch_array($result);
   			if ($c_password['username']!=$username)
   				echo "<h2>You enter the Wrong username or password, please check again.</h2>";
   			else
   			{
   				echo "
					<h2>Welcome, $username</h2>
				<div class='contain'>
   				<div class='main'><form action='edit_profile.php' method='post'>
  					<button class='edit' type='submit' name='username' value=$username><p>My Profile</p></button>
					<input type='hidden' name='password' value=$password>
  				</form></div>
   				<div class='main'><form action='add_location.php' method='post'>
  					<button class='newpost' type='submit' name='username' value=$username><p>New Post</p></button>
					<input type='hidden' name='password' value=$password>
  				</form></div>
  				<div class='main'><form action='check_my_post.php' method='post'>
  					<button class='checkpost' type='submit' name='username' value=$username><p>Check My Post</p></button>
					<input type='hidden' name='password' value=$password>
  				</form></div>
				<div class='main'><form action='friends.php' method='post'>
  					<button class='friends' type='submit' name='username' value=$username><p>My Friends</p></button>
					<input type='hidden' name='password' value=$password>
  				</form></div>
				<div class='main'><form action='like.php' method='post'>
  					<button class='like' type='submit' name='username' value=$username><p>Favorate Things</p></button>
  					<input type='hidden' name='password' value=$password>
  				</form></div>
				<div class='searches'>
				<form action='search.php' method='post'>				
  					<div class='se_con' ><input type='text' name='content'></div>
  					<div class='se_con' ><select type='text' name='database'>
  						<option value=1>Post</option>
  						<option value=2>News</option>
  						<option value=3>User</option>
  						<option value=4>Artist</option>
  						<option value=5>Venue</option>
  						<option value=6>Concert</option>
  					</select><br></div>
  					<h2><button id='sign' type='submit' name='username' value=$username>Search</button></h2>
					<input type='hidden' name='password' value=$password>
  				</form></div>
				</div>
  				";
				$result = mysqli_query($success,"select author,title , post_time
					from user_post
					where datediff(curtime(), post_time)<7 and privacy <> 'self'
						and exists(select fans1 as friend
						from like_fans
						where friend_time <> '0000-00-00 00:00:00'  and fans2='$username' and fans1=author
						union
						select fans2 as friend
						from like_fans
						where friend_time <> '0000-00-00 00:00:00'  and fans1='$username' and fans2=author ) 
						order by  post_time desc
				");
				echo"<h3 id='fee'>New Feed:</h3>";
				while ($row=mysqli_fetch_array($result))
				{
					$author=$row["author"];
					$title=$row["title"];
					$post_time=$row["post_time"];
					
					echo "
					<div class='fee'>
					<form action='view_post.php' method='post'>
				
					<button id='feed' type='submit' name='username' value=$username>$author: <strong>$title</strong>, $post_time</button> 
					<input type='hidden' name='password' value=$password>
					<input type='hidden' name='title' value='$title'>
					</form>
					</div>";
					//echo"$author,$title,$post_time";
				}
				$result = mysqli_query($success,"select * from concerts join venues join like_venue  on 
					concerts.venue_id=venues.venue_id and like_venue.venue_id=venues.venue_id where fans='$username'
 ");
				echo"<h3 id='sug'>interesting things:</h3>";
				while ($row=mysqli_fetch_array($result))
				{
					$concert_id=$row["concert_id"];
					$concert_name=$row["CONCERT_NAME"];
					echo "
					<div>
					<form action='view_concert.php' method='post'>

					<button id='sugg' type='submit' name='username' value=$username>$concert_name</button> 
					<input type='hidden' name='password' value=$password>
					<input type='hidden' name='concert_id' value='$concert_id'>
					</form>
					</div>";
				}
				$result = mysqli_query($success,"select * from news join like_artist  on 
					like_artist.artist=news.artist  where fans='$username'
 ");
				//echo"<h3 id='sug'>interesting activities:</h3>";
				while ($row=mysqli_fetch_array($result))
				{
					//$concert_id=$row["newsname"];
					$newsname=$row["newsname"];
					$art=$row["artist"];
					echo "
					<div>
					<form action='view_news.php' method='post'>

					<button id='sugg' type='submit' name='newsname' value='$newsname'>$art: <strong>$newsname</strong></button> 
					<input type='hidden' name='username' value=$username> 
					<input type='hidden' name='password' value=$password>
					</form>
					</div>";
				}
				
   			}
		?>
	</body>
</html> 