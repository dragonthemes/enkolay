<?php /* Smarty version 2.6.3, created on 2015-12-09 11:50:05
         compiled from gmapPage.tpl */ ?>
<!--Map Process start-->
<?php echo '
<style>
 #map-canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
  }
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
        

function gLoad() {
			
			var latit = \'';  if ($_GET['lat'] != ''):  echo $_GET['lat'];  else: ?>38.657633<?php endif;  echo '\';
			var longtit = \'';  if ($_GET['lon'] != ''):  echo $_GET['lon'];  else: ?>36.936035<?php endif;  echo '\';
        	var zoom_map = \'';  if ($_GET['zoom'] != ''):  echo $_GET['zoom'];  else: ?>6<?php endif;  echo '\';
        	var lat = parseFloat(latit);  //convert string to float
			var lon = parseFloat(longtit);
			var zooming = parseFloat(zoom_map);
			var myLatLng = new google.maps.LatLng(lat,lon);
			var mapOptions = {
				scrollwheel: false,
				center: myLatLng,
				zoom: zooming,
				panControl: false, zoomControl: true, zoomControlOptions: { style: google.maps.ZoomControlStyle.SMALL },
				overviewMapControl: false,
				scaleControl: false,
				mapTypeControl: false,
				streetViewControl: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			var point = new google.maps.Marker({position: myLatLng, map: map});
		}

		//]]>
		</script>
'; ?>

<body onload="gLoad();" style="margin: 0; padding: 0;">
	<div id="mapContainer">
		<div id="map" style="height: 250px; max-width: 100%; "> </div>
	</div>
</body>
<!--Map Process End-->