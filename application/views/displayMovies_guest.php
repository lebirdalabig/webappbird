<div class="general">
		<h4 class="latest-text w3_latest_text">Featured Movies</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Now Playing</a></li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Coming Soon</a></li>

				</ul>
				
				<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
							<div class="w3_agile_featured_movies">
				<?php
					//print_r($rs);
					foreach($res as $index=>$row){
				?>
					
								<div class="col-md-2 w3l-movie-gride-agile">
									<a href="<?php echo base_url("welcome/moviePage/{$row->movie_id}");?>" class="hvr-shutter-out-horizontal">
									<img src="<?php echo base_url("resources/{$row->movie_poster}");?>" title="album-name" class="img-responsive" alt=" " />
										<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
									</a>
									<div class="mid-1 agileits_w3layouts_mid_1_home">
										<div class="w3l-movie-text" style='height: 2em;'>
											<h6><a href="single.php">
												<?php 
													echo ("{$row->movie_title}")
												?>
											</a></h6>							
										</div>
										<div class="mid-2 agile_mid_2_home">
											<p>
												<?php 
													echo ("{$row->movie_year}")
												?></p>
											<div class="block-stars">
												<ul class="w3l-ratings">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
								</div>
				<?php 
						if($index == 5){
							echo "<div class='clearfix'></div>";
						}
					}
				?>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
