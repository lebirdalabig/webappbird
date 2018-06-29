	<div id="map">
		<!-- Map-JavaScript -->
		<script>
	      function initMap() {
	        var uluru = {lat: 10.311841, lng: 123.918308};
	        var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 100,
	          center: uluru
	        });
	        var marker = new google.maps.Marker({
	          position: uluru,
	          map: map
	        });
	      }
	    </script>
	    <script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6TrZ4EEFOHQg_7J46CRIlm6pSRiuf1rA&callback=initMap">
	    </script>
		<!-- //Map-JavaScript -->

</body>