<?php
/**
 * Theme functions and definitions
 *
 * @package Bosa Wedding
 */

require get_stylesheet_directory() . '/inc/customizer/customizer.php';
require get_stylesheet_directory() . '/inc/customizer/loader.php';

if ( ! function_exists( 'bosa_wedding_enqueue_styles' ) ) :
	/**
	 * @since Bosa Wedding 1.0.0
	 */
	function bosa_wedding_enqueue_styles() {
		wp_enqueue_style( 'bosa-wedding-style-parent', get_template_directory_uri() . '/style.css',
			array(
				'bootstrap',
				'slick',
				'slicknav',
				'slick-theme',
				'fontawesome',
				'bosa-blocks',
				'bosa-google-font'
				)
		);
		wp_enqueue_style( 'bosa-wedding-google-fonts', "https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap", false );
		wp_enqueue_style( 'bosa-wedding-google-fonts-two', "https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap", false );
	}

endif;
add_action( 'wp_enqueue_scripts', 'bosa_wedding_enqueue_styles', 10 );


if ( ! function_exists( 'bosa_wedding_modify_locale' ) ) :
	/**
	 * Modifies the localized array
	 *
	 * @since Bosa Wedding 1.0.0
	 * @return array
	 */
	function bosa_wedding_modify_locale( $locale ) {

		if( isset( $locale['is_header_two'] ) ){
			$locale['is_header_two'] =  get_theme_mod( 'header_layout', 'header_two' ) == 'header_two' ? true : false;
		}
		return $locale;	
	}
	add_filter( 'bosa_localize_var', 'bosa_wedding_modify_locale' );
endif;

if( !function_exists( 'bosa_transparent_body_class' ) ){
	/**
	* Add trasparent-header class in body
	*
	* @since Bosa Wedding 1.0.1
	* @param array $class
	* @return array $class
	*/
	function bosa_transparent_body_class( $class ){
		if( get_theme_mod( 'header_layout', 'header_two' ) == 'header_two' ){
			if( ( !get_theme_mod( 'disable_transparent_header_page', true ) && is_page() ) || ( !get_theme_mod( 'disable_transparent_header_post', true ) && is_single() ) || is_front_page() ){
				$class[] = 'transparent-header';
			}
		}
		return $class;
	}
	add_filter( 'body_class', 'bosa_transparent_body_class' );
}

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );