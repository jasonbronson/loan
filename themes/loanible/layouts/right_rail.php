<?php
/**
 * Right Rail Template
 *
 * This is designed to handle the right rail display for the whole site.
 * Parameters are set in the page/post editor to show/hide the whole rail or
 * specific parts of the rail
 */
global $post;
$showRR = get_field( 'show_right_rail', $post->ID );
if( $showRR ){
$showAd       = get_field( 'show_right_rail_ad', $post->ID );
$showTwitter  = get_field( 'show_right_rail_twitter', $post->ID );
$showFacebook = get_field( 'show_right_rail_facebook', $post->ID );
$showContent  = get_field( 'show_right_rail_other_content', $post->ID );
?>
				<div id="right-rail" class="col-md-4 animate-box fadeInRight animated-fast" data-animate-effect="fadeInRight">
<?php
	// Ad Block
	if($showAd){
        $adCode = Options::dfpAd();
		if($adCode !== ''){ echo $adCode; }
		else {
?>
					<div class="achtung">
						<img src="http://via.placeholder.com/300x250" class="img-responsive">
					</div>
<?php
		}
	}
?>
	<?php
	// Twitter Feed Block
	if($showTwitter){
		if($showAd){
?>
					<hr class="short">
<?php
		}
?>
					<a class="twitter-timeline" data-width="480" data-height="500" href="https://twitter.com/wsoe?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
	<?php } ?>
	<?php
	// Facebook Feed Block
	if($showFacebook){
		if($showAd || $showTwitter){
?>
					<hr class="short">
<?php
		}
?>
					<div class="fb-page d-none d-xl-block" data-href="https://www.facebook.com/WSOE" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="340" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WSOE" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WSOE">World Series of Esports</a></blockquote></div>
					<div class="fb-page d-none d-lg-block d-xl-none" data-href="https://www.facebook.com/WSOE" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="280" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WSOE" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WSOE">World Series of Esports</a></blockquote></div>
					<div class="fb-page d-none d-md-block d-lg-none" data-href="https://www.facebook.com/WSOE" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="200" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WSOE" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WSOE">World Series of Esports</a></blockquote></div>
					<div class="fb-page d-none d-sm-block d-md-none" data-href="https://www.facebook.com/WSOE" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="480" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WSOE" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WSOE">World Series of Esports</a></blockquote></div>
					<div class="fb-page d-block d-sm-none" data-href="https://www.facebook.com/WSOE" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WSOE" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WSOE">World Series of Esports</a></blockquote></div>
	<?php } ?>
	<?php
	// Other Content Blocks
	if($showContent){
		$rrOther = get_field( 'right_rail_other_content', $post->ID );
		if( !empty($rrOther) ){
			foreach( $rrOther as $key => $other){
		if($showAd || $showTwitter || $showFacebook || $key ){
?>
					<hr class="short">
<?php
		}
?>
				<?php
				// Other Content Block
				echo do_shortcode( $other['right_rail_other_content_section'] );
				?>
			<?php }
		}
	} ?>
				</div>
<?php }
