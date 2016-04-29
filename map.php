
<html>
  <head>
    <title>Accessing arguments in UI events</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
		html, body {
        	height: 100%;
        	margin: 0;
        	padding: 0;
      	}
      	#map {
        	height: 100%;
      	}
	</style>
  	</head>
  	<body>
    <div id="map"></div>
    <p id="p1">
		<?php
			echo $_POST['username'];
		?>
    </p>
    <p id="p2">
		<?php
			echo $_POST['password'];
		?>
    </p>
    <script>
    	var username='<?php echo $_POST["username"]; ?>';
		var password='<?php echo $_POST["password"]; ?>';
		function initMap() {
  			var map = new google.maps.Map(document.getElementById('map'), {
    		zoom: 4,
    		center: {lat: -25.363882, lng: 131.044922 }
  			});

  			map.addListener('click', function(e) {
    			placeMarkerAndPanTo(e.latLng, map);
    			var username=document.getElementById("p1").innerHTML;
    			var password=document.getElementById("p2").innerHTML;
    			document.body.innerHTML += '<form id="dynForm" action="new_post.php" method="post"><input type="hidden" name="location" value="'
				+e.latLng+'"><input type="hidden" name="username" value="'
				+username+'"><input type="hidden" name="password" value="'
				+password+'"></form>';
				document.getElementById("dynForm").submit();
				
		});
		}

		function placeMarkerAndPanTo(latLng, map) {
  			var marker = new google.maps.Marker({
    			position: latLng,
    			map: map
  			});
  			map.panTo(latLng);
		}
		

	

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcGzXwpMAN1ZIBmtAUUj33vpynKa3GloI&signed_in=true&callback=initMap" async defer></script>
  </body>
</html>