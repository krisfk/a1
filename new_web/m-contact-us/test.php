<!doctype html>
<html>
  <head>
    <style>
      #map {
        width: 400px;
        height: 400px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

    <!-- Google Maps JS API -->
	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBcDNaL1X-ElylUXw8mb07ygWv7MXUYjJY"></script>
    <!-- GMaps Library -->
    <script src="gmaps.js"></script>
    <script>
      /* Map Object */
		// data-lat="22.279866" data-lon="114.184255"
		//22.279880, 114.184367
      var map = new GMaps({
        el: '#map',
        lat: 22.279866,
        lng: 114.184255
      });
		
		map.drawRoute({
				//22.2803747,114.1828534
				//22.279922,114.1820828
			//22.2798747,114.1841906
			//22.280554, 114.186001
			  origin: [22.279880, 114.184255],
			  destination: [22.280554, 114.186001],
			  travelMode: 'walking',
			  strokeColor: '#00F',
			  strokeOpacity: 0.6,
			 
			  strokeWeight: 6,
			  path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW

			});
		
		

		
    </script>
  </body>
</html>