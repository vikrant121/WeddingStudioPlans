<?php
/**
 Template name:Coming soon Template
*/

get_header();?>



<div class="bd_main">

	<?php get_template_part( 'template-parts/innerbanner', 'page' );?>

	<div class="ptb">
		<div class="container">

			<div class="bdcoming">
				<h2>coming soon</h2>
			</div>

		</div>
	</div>

</div>

<style type="text/css">
	.bdcoming h2 {
	    margin: 0;
	    text-align: center;
	    text-transform: capitalize;
	    font-size: 80px;
	    line-height:200px;
	    -webkit-text-stroke: 1px #0066ff;
	    color: transparent;
	}
</style>

<?php get_footer(); ?>