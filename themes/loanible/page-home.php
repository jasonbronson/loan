<?php
/**
 * Template Name: HomePage Template
 */

get_header();
?>

<div id="carouselHome" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php

// check if the repeater field has rows of data
if( have_rows('slider_images') ):

 	// loop through the rows of data
    while ( have_rows('slider_images') ) : the_row(); ?>
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php $img = get_sub_field('slider_image'); $imgDetails = wp_get_attachment_image_src($img['ID'], 'large'); echo $imgDetails[0];  ?>" alt="<?php echo $img['alt']; ?>" >
        <div class="carousel-caption d-none d-md-block text-left">
            <div class="paragraph"><?php echo the_sub_field('slider_header_text'); ?></div>
            <div class="heading"><?php echo the_sub_field('slider_paragraph_text'); ?></div>
            <p class="checking-your-rate">Checking your rate will not affect your credit score.<sup><a href="#" aria-label="Go To Disclosures &amp; Disclaimers">✝</a></sup></p>
            <div> <a href="#" class="btn findloan" role="button" >Find a loan</a> </div>
        </div>
      </div>
        
<?php
    endwhile;

endif;

?>
  <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container-fluid">
lkjlkj
</div>

<?php get_footer();?>