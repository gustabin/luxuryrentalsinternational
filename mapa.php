<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple icons</title>
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
  <?php								
		$longitud = $_GET["longitud"];	
		$latitud = $_GET["latitud"];												
	?>
    <div id="map"></div>
    <script>

      
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: <?php echo $latitud?>, lng: <?php echo $longitud?>}
        });

        var image = 'img/marker.gif';
        var beachMarker = new google.maps.Marker({
          position: {lat: <?php echo $latitud?>, lng: <?php echo $longitud?>},		  
          map: map,
          icon: image
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcphmtqGOeTAGE1W_7I1tcC6YW9aQjPDg&callback=initMap">
    </script>
  </body>
</html>