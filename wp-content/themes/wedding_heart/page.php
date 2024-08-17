<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<div class="bd_main">

	<?php get_template_part( 'template-parts/innerbanner', 'page' );?>

	<?php get_template_part( 'template-parts/content', 'page' );?>

</div>

<?php
get_footer();
