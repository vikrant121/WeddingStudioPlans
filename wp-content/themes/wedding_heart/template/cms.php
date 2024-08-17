<?php
/**
 Template name: CMS Template
*/
get_header();?>

<div class="bd_main">

	<?php get_template_part( 'template-parts/innerbanner', 'page' );?>

	<div class="inner_con ptb">
		<div class="container">

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

		</div>
	</div>

</div>

<?php get_footer(); ?>