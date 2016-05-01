<html>
	<head>
		<link type="text/css" rel="stylesheet" href="new_post.css"/>
		<title>new_post</title>
	</head>
	<body>
		<div class="header"><h1>M&Z's Music Fun Social Network</h1></div>

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
			
			
			$uname=$_POST["username"];
			$password=$_POST["password"];
			$title=$_POST["title"];
			$content=$_POST["content"];
			
			
					
			
			
			
			
			//$photo=$_POST["photo"];
			//$video=$_POST["video"];
			if (isset($_POST["location"]))
			$location=$_POST["location"];
			else $location=null;
			$privacy=$_POST["privacy"];
			//echo $username,$password,$location;
			$location=substr($location,1,-1);
			//echo $uname,$password,$location,gettype('$location'),$title;	
			echo "<h3>You just posted something new!!!</h3>";
			echo "
   				<form action='main.php' method='post'>
				<button type='submit' name='username' value=$uname>back</button> 
				<input type='hidden' name='password' value=$password>
				</form>
   				";
				//$sql=mysqli_query($success,"INSERT INTO `music_social`.`user_post` ('author', 'title') VALUES ('$_POST[username]', 'aa')");
				if(isset($_POST['submit'])){
					$name= $_FILES['pfile']['name'];
					$temp= $_FILES['pfile']['tmp_name'];
					
					move_uploaded_file($temp, "upload_photo/".$name);
					$photo="http://127.0.0.1/Database-Final-Project-music-social-network-/upload_photo/$name";
					
			
			
			
		
					$name= $_FILES['vfile']['name'];
					$temp= $_FILES['vfile']['tmp_name'];
					
					move_uploaded_file($temp, "upload_video/".$name);
					$video="http://127.0.0.1/Database-Final-Project-music-social-network-/upload_video/$name";
					
			
				$result=mysqli_query($success,"INSERT INTO user_post (author, content, photo, video, title, location, post_time, privacy) VALUES ('$uname', '$content', '$photo', '$video', '$title', '$location', CURRENT_TIMESTAMP, '$privacy')");}
			//echo $username, $content,$photo, $video, $title, $location, $privacy;
		?>
		</body>
		</html>