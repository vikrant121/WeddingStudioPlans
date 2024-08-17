<?php
/**
 Template name: Portfolio Template
*/


get_header();?>



<div class="bd_main">

	<?php get_template_part( 'template-parts/innerbanner', 'page' );?>

	<section class="portfolio-home sec-space">
	    <div class="container-fluid">

	        <div class="portfolio-wrap bd_portfolio">

	        	<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$gallery_post = array(
				'post_type'     => 'our_portfolio',
				'posts_per_page'   => -1,
				'post_status'   => 'publish',
				'orderby' => 'date', 
				'order' => 'DSC',
				'paged' => $paged,
				);
				// The Query
				$the_query = new WP_Query( $gallery_post );
				// The Loop
				if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$id = get_the_ID();
				$image = get_the_post_thumbnail_url($id);
				if($image == '') {
				$image = NO_IMAGE;
				}
				?>

	            <a href="<?php echo $image;?>" class="pot-item wow fadeInUp" data-fancybox="gallery">
	                <img src="<?php echo $image;?>" alt="">
	            </a>
	            <?php
				}
				} else {
				?>
				<div class="col-lg-12"><div class="blank_found">No Post Found!</div></div>
				<?php
				}
				// Restore original Post Data /w
				wp_reset_postdata();
				?>

	        </div>

	    </div>

	</section>

</div>

<?php get_footer(); ?>