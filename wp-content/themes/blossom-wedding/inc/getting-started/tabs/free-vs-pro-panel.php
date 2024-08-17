<?php
/**
 * Free Vs Pro Panel.
 *
 * @package Blossom_Wedding
 */
?>
<!-- Free Vs Pro panel -->
<div id="free-pro-panel" class="panel-left">
	<div class="panel-aside">               		
		<img src="<?php echo esc_url( get_template_directory_uri() . '/inc/getting-started/images/free-vs-pro.png' ); //@todo change respective images.?>" alt="<?php esc_attr_e( 'Free vs Pro', 'blossom-wedding' ); ?>"/>
		<a class="button button-primary" href="<?php echo esc_url( 'https://blossomthemes.com/wordpress-themes/blossom-wedding-pro/' ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'blossom-wedding' ); ?>" target="_blank">
            <?php esc_html_e( 'View Pro', 'blossom-wedding' ); ?>
        </a>
	</div><!-- .panel-aside -->
</div>