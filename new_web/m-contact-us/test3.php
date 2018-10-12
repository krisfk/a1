<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {
		  
		  
        var myLatLng = {lat: 22.319259, lng: 114.187031};

		var logo = 'https://www.meg.com.hk/contact-us/img/a1-icon.jpg';
		  
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: myLatLng
        });

		  var destination_marker = new google.maps.Marker( {
				position: myLatLng,
				label: "",
				map: map
			} );
		destination_marker.setIcon( logo );
		  
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcDNaL1X-ElylUXw8mb07ygWv7MXUYjJY&callback=initMap">
    </script>
  </body>
</html>