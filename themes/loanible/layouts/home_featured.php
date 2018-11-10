<?php 
$featuredSection = new Controllers\FeaturedSection();
$data = $featuredSection->get(get_the_ID());

?>
<?php if (!empty($data->visible)): ?>
				<div class="container">
					<div id="hero-video" class="row">
						<div class="col-sm-12">
							<div class="video_bx">
								<div class="video-container">
									<?php if($data->type == "image"): ?>
										<a href='<?php echo $data->image_link; ?>'><img src='<?php echo $data->image['sizes']['large']; ?>'></a>
									<?php else: ?>
									<iframe src="https://www.youtube.com/embed/<?php echo $data->video_shortlink; ?>?rel=0&amp;showinfo=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									<?php endif; ?>
								</div>
								<div class="video_right_img bounceInDown wow" data-wow-duration="2s" data-wow-delay="0.5s">
									<img src="<?php echo $data->graphic_overlay_image['sizes']['large']; ?>" alt="<?php echo $data->graphic_overlay_image['alt']; ?>">
									<span class="cross_icon">
										<i class="fas fa-times"></i>
									</span>
								</div>
								<div class="video_text_center">
									<h1><?php echo $data->graphic_overlay_heading_text ?></h1>
								</div>
								<div class="video_down_text clearfix">
									<h2>
										<b><?php echo $data->heading ?></b>
									</h2>
									<p><?php echo $data->description ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php endif ?>
