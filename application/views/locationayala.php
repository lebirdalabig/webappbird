<html>
<head>
	<title>FCC | Contact</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/.php; charset=utf-8" />
	<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="<?php echo base_url('resources/css/bootstrap.css');?>" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url('resources/css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo base_url('resources/css/faqstyle.css');?>" type="text/css" media="all" />
	<link href="<?php echo base_url('resources/css/medile.css');?>" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url('resources/css/single.css');?>" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="<?php echo base_url('resources/css/contactstyle.css');?>" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="<?php echo base_url('resources/css/font-awesome.min.css');?>" />
	<!-- //font-awesome icons -->
	<!-- js -->
	<script type="text/javascript" src="<?php echo base_url('resources/js/jquery-2.1.4.min.js');?>"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="<?php echo base_url('resources/js/move-top.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/easing.js');?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
<!-- start-smoth-scrolling -->
</head>

<body>

	<div id="map">
		<!-- Map-JavaScript -->
		<script>
	      function initMap() {
	        var uluru = {lat: 10.3181, lng: 123.9050};
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
</html>