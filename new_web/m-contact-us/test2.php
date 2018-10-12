<!doctype html>
<html>
<head>
	<meta charset="utf-8">

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
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBcDNaL1X-ElylUXw8mb07ygWv7MXUYjJY"></script>
	<!-- GMaps Library -->


	<script type="text/javascript">
		function init() {
			var map = new google.maps.Map( document.getElementById( 'map' ), {
					zoom: 1,
					center: {
						lat: 0,
						lng: 0
					}
				} ),
				directionsService = new google.maps.DirectionsService,
				directionsDisplay = new google.maps.DirectionsRenderer( {
					map: map,


					polylineOptions: {

						strokeColor: '#f00',
						strokeOpacity: 1,
						strokeWeight: 2,
						icons: [ {
							icon: {
								path: google.maps.SymbolPath.FORWARD_OPEN_ARROW,
								scale: 3,
								//  strokeColor: "#F00",	
								fillColor: "#F00",
								fillOpacity: 1
							},
							repeat: '50px'
						} ]
					}
				} );


			directionsService.route( {
				origin: {
					lat: 22.279877,
					lng: 114.184368
				},
				
				destination: {
					lat: 22.280002,
					lng: 114.184256
				},
				travelMode: google.maps.TravelMode.WALKING
			}, function ( response, status ) {
				if ( status === google.maps.DirectionsStatus.OK ) {
					directionsDisplay.setDirections( response );
				} else {
					window.alert( 'Directions request failed due to ' + status );
				}
			} );

			directionsDisplay.setMap( map );
			directionsDisplay.setOptions( {
				suppressMarkers: true
			} );

			var origin_marker = new google.maps.Marker( {
				position: {
					lat: 22.279877,
					lng: 114.184368
				},
				label: "",
				map: map
			} );
			
			origin_marker.setIcon('https://www.meg.com.hk/contact-us/img/mtr-exit-icon.jpg');

			//https://www.meg.com.hk/images/logo_2.png

			var destination_marker = new google.maps.Marker( {
				position: {
					lat: 22.280002,
					lng: 114.184256
				},
				label: "",
				map: map
			} );
			destination_marker.setIcon('https://www.meg.com.hk/contact-us/img/meg-icon.jpg');


			var myStyles = [ {
				featureType: "poi",
				elementType: "labels",
				stylers: [ {
					visibility: "off"
				} ]
			} ];

			var styles = {
				default: null,
				hide: [ {
					featureType: 'poi',
					stylers: [ {
						visibility: 'off'
					} ]
				}, {
					featureType: 'transit',
					elementType: 'labels.icon',
					stylers: [ {
						visibility: 'off'
					} ]
				} ]
			};


			map.setOptions( {
				styles: styles[ 'hide' ]
			} );
			

			var origin_marker_content = "港鐵銅鑼灣站F1出口 (步行時間： 1 min)";
			var origin_marker_infowindow = new google.maps.InfoWindow();

			google.maps.event.addListener( origin_marker, 'click', ( function ( origin_marker, origin_marker_content, origin_marker_infowindow ) {
				return function () {
					origin_marker_infowindow.setContent( origin_marker_content );
					origin_marker_infowindow.open( map, origin_marker );
				};
			} )( origin_marker, origin_marker_content, origin_marker_infowindow ) );

			var destination_marker_content = "MEG 銅鑼灣分店";
			var destination_marker_infowindow = new google.maps.InfoWindow();
			google.maps.event.addListener( destination_marker, 'click', ( function ( destination_marker, destination_marker_content, destination_marker_infowindow ) {
				return function () {
					destination_marker_infowindow.setContent( destination_marker_content );
					destination_marker_infowindow.open( map, destination_marker );
				};
			} )( destination_marker, destination_marker_content, destination_marker_infowindow ) );

		}


		google.maps.event.addDomListener( window, 'load', init );

		
	</script>
</body>
</html>