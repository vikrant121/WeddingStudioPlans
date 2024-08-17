<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

$term_id = get_queried_object()->term_id;
$service_id = get_the_ID();
$term_description = get_queried_object()->description;;
//echo ($term_id);
$terms = get_term_by('ID', $term_id, 'services_cat');
get_header(); ?>

	<div class="inner_banner instagram-sec p-0">

		<div class="inner_banner_text">
			<div class="container">
				<div class="banner_area_text_box">
					<?php single_term_title( '<h1 class="page-title">', '</h1>' ); ?>
		        </div>
			</div>
		</div>		
	</div>

	<section class="portfolio-home sec-space">
	    <div class="container-fluid">

	    	<div class="pro_content inner_con">
				<?php echo $term_description;?>
			</div>

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
				'tax_query' => array(
				    array(
				    'taxonomy' => $taxonomy,
				    'field' => 'term_id',
				    'terms' => $term_id
				     )
				  )
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
<?php
get_footer();
