<?php
$headerSectionContent = new \Controllers\HeaderSectionContent();
$data = $headerSectionContent->get(get_the_ID());
?>
<?php if($data->visible): ?>

<style>
.main_pnl{
	background: url('<?php echo $data->header_image['sizes']['large']; ?>');
	background-size: cover;
    background-attachment: fixed;
}
@media (min-height: 500px) and (max-height: 599px) and (orientation: Portrait){
	.main_pnl:before{
		background: #252525 url('<?php echo $data->header_image['sizes']['large']; ?>') no-repeat top center;
		background-size: auto 76vh !important;
	}
}
@media (min-height: 600px) and (max-height: 700px) and (orientation: Portrait){
	.main_pnl:before{
		background: #252525 url('<?php echo $data->header_image['sizes']['large']; ?>') no-repeat top center;
		background-size: auto 53vh !important;
	}
}


</style>
				<div class="hhsc clearfix">
					<div class="hhsc_1" style="background-image:url(<?php echo $data->header_image_animation_file_upload['sizes']['large'] ?>);background-position: <?php echo $data->header_image_animation_position ?> center;"></div>
					<div class="hhsc_2" style="background-image:url(<?php echo $data->header_image_animation_file_upload['sizes']['large'] ?>);background-position: <?php echo $data->header_image_animation_position ?> center;"></div>
					<div class="hhsc_3" style="background-image:url(<?php echo $data->header_image_animation_file_upload['sizes']['large'] ?>);background-position: <?php echo $data->header_image_animation_position ?> center;"></div>
					<div class="hhsc_4" style="background-image:url(<?php echo $data->header_image_animation_file_upload['sizes']['large'] ?>);background-position: <?php echo $data->header_image_animation_position ?> center;"></div>
				</div>

<?php endif; ?>