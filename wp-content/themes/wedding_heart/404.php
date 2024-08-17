<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found text-center" style="padding:150px 0 150px 0;     background: rgb(57,58,60);
    background: linear-gradient(90deg, rgba(57,58,60,1) 0%, rgba(34,37,42,1) 65%, rgba(34,37,42,1) 100%); color: #fff;">

				<header class="page_header">

					<p><?php _e( 'It looks like nothing was found at this location.', 'twentysixteen' ); ?></p>

					<h1 class="page-title"><?php _e( '404', 'twentysixteen' ); ?></h1>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Go to Homepage</a>

				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</main><!-- .site-main -->


	</div><!-- .content-area -->

<?php get_footer(); ?>
