<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<?php
	$imageURL = get_the_post_thumbnail_url($post->ID, 'full');
		if($imageURL == '') {
		$imageURL = DEFAULT_BANNER;
	}
?>

	<div class="inner_banner instagram-sec p-0">

		<div class="inner_banner_text">
			<div class="container">
				<div class="banner_area_text_box">
					<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		        </div>
			</div>
		</div>		
	</div>
	