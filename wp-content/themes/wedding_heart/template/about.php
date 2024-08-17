<?php
/**
 Template name: About Template
*/

$bftid = get_post($post->ID);

$bftimg = get_field('image',$bftid);;
if($bftimg == '') {
$bftimg = NO_IMAGE;
}

$sec1 = get_field( 'why_choose_me', $bftid);
$sec1con= (!empty($sec1['content'])) ? $sec1['content'] : 'No Content';

$hid = get_post(2);

$sec3 = get_field( 'heading_section', $hid);
$hshead4= (!empty($sec3['heading4'])) ? $sec3['heading4'] : 'No Heading';



get_header();?>



<div class="bd_main">

	<?php get_template_part( 'template-parts/innerbanner', 'page' );?>

	<div class="inner_con ptb">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="abimg bd_sticky">
						<img src="<?php echo $bftimg;?>">
					</div>
				</div>
				<div class="col-md-6">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php
						 while ( have_posts() ) : the_post();
						?>
						   <?php the_content(); ?>
						<?php
						   endwhile;
						?>
						<div class="clearfix"></div>
					</div>

					<div class="bd_skill mt-4">
						<?php echo $sec1con;?>

						<ul class="choose_me pt-4">
							<?php
							$resec1 = (!empty($sec1['choose_me'])) ? $sec1['choose_me'] : [];
							if(!empty($resec1)){
							$count = 0;
							foreach ($resec1 as $key => $value) {
							$count++;
							$chicon = $value['icon'];
							if($chicon == '') {
							$chicon = NO_IMAGE;
							}
							$chtitle = $value['title'];
							if($chtitle == '') {
							$chtitle = 'No Title';
							}
							$chsutitle = $value['subtitle'];
							if($chsutitle == '') {
							$chsutitle = 'No Title';
							}
							?>
				            <li class="wow fadeInLeft" data-wow-duration="1s">
				                <span><img src="<?php echo $chicon;?>"></span>
				                <h2><?php echo $chtitle;?></h2>
				                <p><?php echo $chsutitle;?></p>
				            </li>
				            <?php
							}
							}else{
							?>
							<li class="col-lg-12">Not Found!</li>
							<?php
							}
							?>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="service-home sec-space">
		<div class="container">
	        <div class="section-title text-center">
	            <h2 class="wow fadeInDown">MY STUDIO</h2>
	        </div>
	        <div id="gallery_slider_two" class="owl-carousel gallery-owl_two common-gallery">
	        	<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$gallery_post = array(
				'post_type'     => 'our_portfolio',
				'posts_per_page'   => -1,
				'post_status'   => 'publish',
				'orderby' => 'rand', 
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
	            <div class="item event-img">
	                <img src="<?php echo $image;?>">
	            </div>
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
			<?php $term = get_term_by( 'id', 3, 'portfolio_categories' );?>
	        <div class="center-btn wow fadeInUp">
	            <a href="<?php echo get_permalink(9)?>">VIEW ALL PORTFOLIO</a>
	        </div>
	    </div>
	</section>

	<section class="testimonial sec-space">
	    <div class="section-title text-center">
	        <h2><?php echo $hshead4;?></h2>
	    </div>
	    <div class="container">
	        <div id="testimonial_slider" class="owl-carousel testimonial-owl">
	        	<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$gallery_post = array(
				'post_type'     => 'testimonial',
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
				$title = get_the_title();
				$id = get_the_ID();

				$image = get_the_post_thumbnail_url($id);
				if($image == '') {
				$image = NO_IMAGE;
				}			
				$loc = get_field('location',$id);
				if($loc == '') {
				$loc = "No Location";
				}
				$con = get_field('content',$id);
				if($con == '') {
				$con = "No Content";
				}
				?>
	            <div class="item">
	                <div class="single-testi">
	                    <div class="user-details d-flex align-items-center">
	                        <div class="user-image">
	                            <img src="<?php echo $image;?>">
	                        </div>
	                        <div class="user-desk">
	                            <h6><?php echo $title;?></h6>
	                            <p><?php echo $loc;?></p>
	                        </div>
	                    </div>
	                    <div class="user-comment">
	                        <p><?php echo $con;?></p>
	                    </div>
	                </div>
	            </div>
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