<?php
/**
 Template name: Home Template
*/
get_header();?>

<?php

    $id = get_post($post->ID);
    $con = $id->post_content;
    $hcontent = apply_filters('the_content', $con);

    $hohead = get_field('heading',$id);
	if($hohead == '') {
	$hohead = "No Content";
	}
	$hosubhead = get_field('subheading',$id);
	if($hosubhead == '') {
	$hosubhead = "No Content";
	}

	$sec1 = get_field( 'photographer', $id);
	$phohead= (!empty($sec1['heading'])) ? $sec1['heading'] : 'No Heading';

	$sec2 = get_field( 'about', $id);
	$abcon= (!empty($sec2['content'])) ? $sec2['content'] : 'No Content';
	$abimg= (!empty($sec2['image'])) ? $sec2['image'] : NO_IMAGE;

	$sec3 = get_field( 'heading_section', $id);
	$hshead1= (!empty($sec3['heading1'])) ? $sec3['heading1'] : 'No Heading';
	$hsubhead1= (!empty($sec3['sub_heading1'])) ? $sec3['sub_heading1'] : 'No Heading';
	$hshead2= (!empty($sec3['heading2'])) ? $sec3['heading2'] : 'No Heading';
	$hsubhead2= (!empty($sec3['sub_heading2'])) ? $sec3['sub_heading2'] : 'No Heading';
	$hshead3= (!empty($sec3['heading3'])) ? $sec3['heading3'] : 'No Heading';
	$hshead4= (!empty($sec3['heading4'])) ? $sec3['heading4'] : 'No Heading';

?>

<section class="slider-gallery">
    <h2 class="outline-title"><?php echo get_bloginfo( 'name' ); ?></h2>
    <div class="container-fluid">
        <div id="gallery_slider" class="owl-carousel gallery-owl common-gallery">
        	<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$gallery_post = array(
			'post_type'     => 'our_portfolio',
			'posts_per_page'   => -1,
			'post_status'   => 'publish',
			'orderby' => 'date', 
			'order' => 'DSC',
			'paged' => $paged,
			'meta_query' => array(
			array(
			'key'     => 'show_home_banner',
			'value'   => '1',
			'compare' => '=',
			)
			),
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
    </div>
</section>

<section class="event-photo">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="wow fadeInDown"><?php echo $phohead;?></h2>
        </div>
        <div class="row justify-content-center ep-flex">
        	<?php
			$resec1 = (!empty($sec1['image_section'])) ? $sec1['image_section'] : [];
			if(!empty($resec1)){
			$count = 0;
			foreach ($resec1 as $key => $value) {
			$count++;
			$proimg = $value['image'];
			if($proimg == '') {
			$proimg = NO_IMAGE;
			}
			?>
            <div class="col-lg-4 wow fadeInLeft" data-wow-duration="1s">
                <div class="ph-image">
                    <img src="<?php echo $proimg;?>" alt="">
                </div>
            </div>
            <?php
			}
			}else{
			?>
			<div class="col-lg-12"><div class="blank_found">Not Found!</div></div>
			<?php
			}
			?>
        </div>
    </div>
    
    <div class="container">
        <div class="section-title text-center">
            <h2 class="wow fadeInDown"><?php echo $hohead?></h2>
            <p class="wow fadeInUp"><?php echo $hosubhead?></p>
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
			'tax_query' => array(
			array(
			'taxonomy' => 'portfolio_categories',
			'field' => 'ID',
			'terms' => 3
			),
			),
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
            <a href="<?php echo get_category_link($term->term_id); ?>">VIEW WEDDING PHOTOS</a>
        </div>
    </div>
</section>

<section class="about-wh sec-space">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-7">
                <div class="section-title abt-text bd_abosec">
                    <?php echo $abcon; ?>
                </div>                
            </div>
            <div class="col-lg-4 wow fadeInRight">
                <div class="abt-image">
                    <div class="abt-image-outline">
                        <img src="<?php echo $abimg; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-home sec-space">
    <h2 class="outline-title">Portfolio</h2>
    <div class="container-fluid">
        <div class="section-title text-center">
            <h2 class="wow fadeInDown"><?php echo $hshead1;?></h2>
            <p class="wow fadeInUp"><?php echo $hsubhead1;?></p>
        </div>
        <div class="portfolio-wrap">

        	<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$gallery_post = array(
			'post_type'     => 'our_portfolio',
			'posts_per_page'   => 11,
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
        <div class="center-btn wow fadeInUp">
            <a href="<?php echo get_permalink(9)?>">VIEW ALL PORTFOLIO</a>
        </div>
    </div>
    <div class="container-fluid mt-80">
        <div class="section-title text-center">
            <h2 class="wow fadeInDown"><?php echo $hshead1;?></h2>
            <p class="wow fadeInUp"><?php echo $hsubhead2;?></p>
        </div>
        <div class="baby-pic-wrap d-flex justify-content-center">
        	<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$gallery_post = array(
			'post_type'     => 'our_portfolio',
			'posts_per_page'   => 3,
			'post_status'   => 'publish',
			'orderby' => 'rand', 
			'order' => 'DSC',
			'paged' => $paged,
			'tax_query' => array(
			array(
			'taxonomy' => 'portfolio_categories',
			'field' => 'ID',
			'terms' => 4
			),
			),
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
            <div class="baby-pic">
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
        <div class="center-btn wow fadeInUp">
        	<?php $term = get_term_by( 'id', 4, 'portfolio_categories' );?>
            <a href="<?php echo get_category_link($term->term_id); ?>">VIEW BABY SHOWER PHOTOS</a>
        </div>
    </div>
</section>

<section class="service-home sec-space">
    <div class="section-title text-center">
        <h2 class="wow fadeInDown"><?php echo $hshead3;?></h2>
    </div>
    <div class="container">
        <div class="row justify-content-between service-flex">
			<?php
			$hservices = get_field('services',$post->ID);
			if(!empty($hservices)){
			foreach ($hservices as $key => $value) {
			$sicon = $value['icon'];
			if($sicon == '') {
			$sicon = NO_IMAGE;
			}
			$stitle = $value['title'];
			if($stitle == '') {
			$stitle = "No Title";
			}
			?>
			<div class="col">
                <a href="" class="service-box wow fadeInDown" data-wow-duration="1s">
                    <div class="service-image">
                        <img src="<?php echo $sicon;?>">
                    </div>
                    <h6 class="service-title">
                        <?php echo $stitle;?>
                    </h6>
                </a>
            </div>
			<?php
			}
			}else{
			?>
			<div class="col-lg-12"><div class="blank_found">Not Found!</div></div>
			<?php
			}
			?>
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

<?php get_footer(); ?>