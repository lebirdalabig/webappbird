<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</div>
		<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
			<nav>
				<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url ('/welcome/location');?>">SM CEBU</a></li>
					
				<li><a href="<?php echo base_url('/welcome/locationayala');?>">AYALA</a></li>
				<li><a href="<?php echo site_url('/welcome/locationgalleria');?>">ROBINSONS GALLERIA</a></li>
				<li><a href="<?php echo base_url('/welcome/locationseaside');?>">SM SEASIDE</a></li>
				</ul>
			</nav>
</div>
		<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="https://twitter.com/?lang=en" target="_blank">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="https://www.facebook.com/" target="_blank">Facebook <i class="fa fa-facebook"></i></a></li>				  
		</ul>
  </nav>
</div>
<!-- footer -->

	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Subscribe to us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="Your email..." required="">
								<input type="submit" value="Send">
							</form>
						</div>
					</div>
				</div>
			<div class="w3layouts_logo">
				<image src="<?php echo base_url('resources/images/fcc.png');?>" style="width:70px; float:right;"/>
			</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2018 FCC. All rights reserved | Design by Team Handsome Bird</p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
						<a href="<?php echo base_url('/welcome/genres"');?>">Movies</a>
					</li>
					<li>
						<a href="<?php echo base_url('/welcome/horror"');?>">Action</a>
					</li>
					<li>
						<a href="<?php echo base_url('/welcome/genres"');?>">Adventure</a>
					</li>
					<li>
						<a href="<?php echo base_url('/welcome/comedy"');?>">Comedy</a>
					</li>
					<li>
						<a href="<?php echo base_url('/welcome/contact"');?>">Contact Us</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>