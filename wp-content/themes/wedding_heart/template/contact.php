<?php
/**
 Template name: Contact Template
*/
get_header();?>

<?php 
	$map = get_option( 'contact_map');
	$address = get_option( 'store_address');
	$number = get_option( 'store_mobile_no');
	$email = get_option( 'store_email_id');
	$facebook = get_option( 'facebook_link');
	$twitter = get_option( 'twitter_link');
	$youtube = get_option( 'youtube_link');


	$id = get_post($post->ID);

	$con = $id->post_content;
    $pigcontent = apply_filters('the_content', $con);

    $image = get_the_post_thumbnail_url($id);
	if($image == '') {
	$image = NO_IMAGE;
	}

	$conimg = get_field('image',$id);
	if($conimg == '') {
	$conimg = NO_IMAGE;
	}
?>

<div class="bd_main">

	<?php get_template_part( 'template-parts/innerbanner', 'page' );?>

	<div class="inner_con ptb">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="abimg bd_sticky">
						<img src="<?php echo $image;?>">
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

					<ul class="continfo">
						<li>
							<span>Email :</span>
							<a href="mailto:<?php echo $email?>"><?php echo $email?></a>
						</li>
						<li>
							<span>Number :</span>
							<a href="tel:<?php echo $number?>"><?php echo $number?></a>
						</li>
					</ul>

					<div class="contact_form1">
						<div class="heading">
							<h2>Contact Us</h2>
							<p>Your email address will not be published. Required fields are marked *</p>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]');?>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="ptb d-none">
		<div class="container">
			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="heading text-center">
						<?php echo $pigcontent;?>
					</div>
				</div>
			</div>
			<div class="row mt-md-5">
				<div class="col-lg-4">
					<ul class="continfo">
						<li>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $address?></p>
						</li>
						<li>
							<a href="mailto:<?php echo $email?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $email?></a>
						</li>
						<li>
							<a href="tel:<?php echo $number?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $number?></a>
						</li>
					</ul>
				</div>
				<div class="col-lg-8 mb-lg-0 mb-4">
					<div class="contact-wrap conoverlap" style="background: url(<?php echo $conimg;?>) no-repeat center; background-attachment:fixed; background-size:cover;">
						<div class="heading">
							<h2>Contact Us</h2>
							<p>Your email address will not be published. Required fields are marked *</p>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]');?>
					</div>
				</div>
				<div class="col-12 mt-md-5">
					<div class="conmap">
						<iframe src="<?php echo $map;?>"></iframe>
					</div>
				</div>		
			</div>
		</div>
	</div>
	

</div>

<?php get_footer(); ?>