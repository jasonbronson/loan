<?php
$lowerSection = new \Controllers\LowerSectionContent();
$data = $lowerSection->get(get_the_ID());

if( $data->visible ) {
?>
			<div class="mid_video_box clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-12 featured-title">
							<h1><?php echo $data->heading_text; ?></h1>
							<p><?php echo $data->description; ?></p>
						</div>
					</div>
					<div class="row">	

<?php
	$x = 0;
	foreach ($data as $value){
		$x++;
		// breakpoints for optimized display based on device size:
?>
						<div class="clearfix<?php echo ($x % 2 == 0?' visible-sm':'') . ($x % 3 == 0?' visible-md visible-lg':'');?>"></div>
<?php
		// echo var_dump($value);
		if($value->type == 'content'){
?>
						<div class="col-md-4 col-sm-6 col-xs-12 image-wrapper">
							<div class="video-mobile visible-xs-block visible-sm-block image-mobile">
								<img src="<?php echo $value->image_large ?>" alt="<?php echo $value->image_alt ?>">
							</div>
							<div class="video-desktop hidden-sm hidden-xs mid_vd_bx clearfix">
								<div class="img-container clearfix">
									<a href="<?php echo $value->link; ?>">
										<img src="<?php echo $value->image_medium ?>" alt="<?php echo $value->image_alt ?>">
										<!-- <i class="far fa-play-circle"></i> -->
									</a>
								</div>
							</div>
							<h2><a href="<?php echo $value->link; ?>"><?php echo $value->title; ?></a></h2>
							<p><?php echo $value->short_description; ?></p>
						</div>
<?php
		}elseif($value->type == 'video'){
			$videoURL = $value->video_url;
			
?>
						<div class="clearfix visible-sm"></div>
						<div class="col-md-4 col-sm-6 col-xs-12 video-wrapper">
							<div class="video-mobile">
								<iframe width="100%"  src="https://www.youtube.com/embed/<?php echo $value->video_shortlink; ?>?ecver=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							</div>
							<div class="mid_vd_bx clearfix video-desktop">
								<div class="img-container clearfix">
									<a href="#" data-toggle="modal" data-target="#video-<?php echo sprintf('%02d', $x); ?>">
										<img src="https://img.youtube.com/vi/<?php echo $value->video_shortlink; ?>/mqdefault.jpg" alt="">
										<span class="play_icon">
											<i class="far fa-play-circle"></i>
										</span>
									</a>
								</div>
							</div>
							<h2><?php echo $value->title; ?></h2>
							<p><?php echo $value->short_description ?></p>
							<div class="modal fade cus_video" id="video-<?php echo sprintf('%02d', $x); ?>" role="dialog">
								<div class="vertical-alignment-helper">
									<div class="modal-dialog vertical-align-center">
										<div class="modal-content">
											<div class="modal-body">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<div class="video-container">
													<iframe src="https://www.youtube.com/embed/<?php echo $value->video_shortlink; ?>?enablejsapi=1&rel=0&showinfo=0" allow="autoplay; encrypted-media" allowfullscreen id="cus_video6"></iframe>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
<?php
		}
	}
?>
					</div>
				</div>
			</div>
<?php
}
?>