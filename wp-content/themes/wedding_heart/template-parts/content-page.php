<?php
/**
 * Template part for displaying page content in page.php
 */

?>


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