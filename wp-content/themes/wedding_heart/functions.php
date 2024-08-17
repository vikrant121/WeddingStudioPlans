<?php
define('BASEURL',str_replace('twentynineteen','wedding_heart/',get_template_directory_uri()));
define('DEFAULT_BANNER',BASEURL.'images/default-banner.jpg');
define('NO_IMAGE',BASEURL.'images/no-image.png');

function pre($arr = [], $die = 0) {
	echo "<pre>"; print_r($arr); echo "</pre>";
	if($die){
		exit;
	}
}
function timthumb($path = NULl, $height = NULL, $width = NULL) { 
	$imgPath = "";
	if($path != ""){
		$imgPath = BASEURL.'timthumb.php?src='.$path;
	}
	/*else{
		$imgPath = BASEURL.'timthumb.php?src='.NO_IMAGE;
	}*/
	if($height != ""){
		$imgPath .= "&h=".$height;
	}
	if($width != ""){
		$imgPath .= "&w=".$width;
	}
	$imgPath .= "&zc=1q=100";

	return $imgPath;
}
function shortDesc($content = NULL, $limit = NUll){
	$desc = strip_tags($content);
	$shortDesc = (strlen($desc) > $limit) ? substr($desc,0,$limit).'..' : $desc ;
	return $shortDesc;
}
function itg_admin_css_all_page() {
    /**
     * Register the style handle
     */
    /* font Awasome */
    wp_register_style($handle = 'font-awesome', $src = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', $deps = array(), $ver = '1.0.0', $media = 'all');
    
    /**
     * Now enqueue it
     */
    wp_enqueue_style('font-awesome');
}
add_action('admin_print_styles', 'itg_admin_css_all_page');
$new_general_setting = new new_general_setting();
class new_general_setting {
    function __construct() {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'facebook_link', 'esc_attr' );
        add_settings_field('facebook_link', '<i class="fa fa-facebook-official" aria-hidden="true"></i> <label for="facebook_link">'.__('Facebook' , 'facebook_link' ).'</label>' , array(&$this, 'facebook_html') , 'general' );
		
		register_setting( 'general', 'twitter_link', 'esc_attr' );
		add_settings_field('twitter_link', '<i class="fa fa-twitter" aria-hidden="true"></i> <label for="twitter_link">'.__('Twitter' , 'twitter_link' ).'</label>' , array(&$this, 'twitter_html') , 'general' );

		register_setting( 'general', 'linkedin_link', 'esc_attr' );
        add_settings_field('linkedin_link', '<i class="fa fa-linkedin-square" aria-hidden="true"></i> <label for="linkedin_link">'.__('Linkedin' , 'linkedin_link' ).'</label>' , array(&$this, 'linkedin_html') , 'general' );

        register_setting( 'general', 'dribbble_link', 'esc_attr' );
        add_settings_field('dribbble_link', '<i class="fa fa-dribbble" aria-hidden="true"></i> <label for="dribbble_link">'.__('Dribbble' , 'dribbble_link' ).'</label>' , array(&$this, 'dribbble_html') , 'general' );

        register_setting( 'general', 'behance_link', 'esc_attr' );
        add_settings_field('behance_link', '<i class="fa fa-behance-square" aria-hidden="true"></i> <label for="behance_link">'.__('Behance' , 'behance_link' ).'</label>' , array(&$this, 'behance_html') , 'general' );

		register_setting( 'general', 'gplus', 'esc_attr' );
		add_settings_field('gplus', '<i class="fa fa-google-plus-square" aria-hidden="true"></i> <label for="gplus">'.__('Goole Plus' , 'gplus' ).'</label>' , array(&$this, 'gplus_html') , 'general' );
	
		register_setting( 'general', 'youtube_link', 'esc_attr' );
		add_settings_field('youtube_link', '<i class="fa fa-youtube-square" aria-hidden="true"></i> <label for="youtube_link">'.__('Youtube' , 'youtube_link' ).'</label>' , array(&$this, 'youtube_html') , 'general' );

		register_setting( 'general', 'pinterest_link', 'esc_attr' );
		add_settings_field('pinterest_link', '<i class="fa fa-pinterest-square" aria-hidden="true"></i> <label for="pinterest_link">'.__('Pinterest' , 'pinterest_link' ).'</label>' , array(&$this, 'pinterest_html') , 'general' );

		register_setting( 'general', 'instagram', 'esc_attr' );
		add_settings_field('gplus', '<i class="fa fa-instagram" aria-hidden="true"></i> <label for="gplus">'.__('Instagram' , 'instagram' ).'</label>' , array(&$this, 'instagram_html') , 'general' );		
		
		register_setting( 'general', 'store_email_id', 'esc_attr' );
		add_settings_field('store_email_id', '<i class="fa fa-envelope" aria-hidden="true"></i> <label for="store_email_id">'.__('Email' , 'store_email_id' ).'</label>' , array(&$this, 'store_email_html') , 'general' );
		
		register_setting( 'general', 'store_mobile_no', 'esc_attr' );
		add_settings_field('store_mobile_no', '<i class="fa fa-phone-square" aria-hidden="true"></i> <label for="store_mobile_no">'.__('Mobile' , 'store_mobile_no' ).'</label>' , array(&$this, 'store_mobile_html') , 'general' );

		register_setting( 'general', 'copyright', 'esc_attr' );
		add_settings_field('copyright', '<i class="fa fa-copyright" aria-hidden="true"></i> <label for="copyright">'.__('Copyright' , 'copyright' ).'</label>' , array(&$this, 'copyright_html') , 'general' );

		register_setting( 'general', 'store_address', 'esc_attr' );
		add_settings_field('store_address', '<i class="fa fa-location-arrow" aria-hidden="true"></i> <label for="store_address">'.__('Address' , 'store_address' ).'</label>' , array(&$this, 'store_address_html') , 'general' );

		register_setting( 'general', 'contact_map', 'esc_attr' );
		add_settings_field('contact_map', '<i class="fa fa-map-marker" aria-hidden="true"></i> <label for="contact_map">'.__('Map' , 'contact_map' ).'</label>' , array(&$this, 'contact_map_html') , 'general' );	

		register_setting( 'general', 'footer_note', 'esc_attr' );
		add_settings_field('footer_note', '<i class="fa fa-file" aria-hidden="true"></i> <label for="footer_note">'.__('Footer Note' , 'footer_note' ).'</label>' , array(&$this, 'footer_note_html') , 'general' );

		
	}

	function linkedin_html() {
        $value = get_option( 'linkedin_link', '' );
        echo '<input style="width: 38%;" type="text" id="linkedin_link" name="linkedin_link" placeholder="e.g. https://www.linkedin.com" value="' . $value . '" />';
    }

    function dribbble_html() {
        $value = get_option( 'dribbble_link', '' );
        echo '<input style="width: 38%;" type="text" id="dribbble_link" name="dribbble_link" placeholder="e.g. https://www.dribbble.com" value="' . $value . '" />';
    }

    function behance_html() {
        $value = get_option( 'behance_link', '' );
        echo '<input style="width: 38%;" type="text" id="behance_link" name="behance_link" placeholder="e.g. https://www.behance.com" value="' . $value . '" />';
    }

	function copyright_html() {
       $value = get_option( 'copyright', '' );
		echo '<input placeholder="e.g. &copy Copyright 2018" type="text" style="width: 38%;" id="copyright" name="copyright" value="' . $value . '" />';
    }

	function contact_map_html() {
        $value = get_option( 'contact_map', '' );
        echo '<textarea id="contact_map" style="width: 100%;" name="contact_map" rows="8" placeholder="e.g. <iframe>....</iframe>">'.$value.'</textarea>';
    }

	function facebook_html() {
        $value = get_option( 'facebook_link', '' );
        echo '<input style="width: 38%;" type="text" id="facebook_link" name="facebook_link" placeholder="e.g. https://www.facebook.com" value="' . $value . '" />';
    }
	
	function gplus_html() {
		$value = get_option( 'gplus', '' );
		echo '<input type="text" style="width: 38%;" id="gplus" name="gplus" placeholder="e.g. https://google.com/" value="' . $value . '" />';
	}

	function pinterest_html() {
		$value = get_option( 'pinterest_link', '' );
		echo '<input type="text" style="width: 38%;" id="pinterest_link" name="pinterest_link" placeholder="e.g. https://pinterest.com/" value="' . $value . '" />';
	}	

	function twitter_html() {
		$value = get_option( 'twitter_link', '' );
		echo '<input type="text" style="width: 38%;" id="twitter_link" name="twitter_link" placeholder="e.g. https://twitter.com/" value="' . $value . '" />';
	}

		
	function youtube_html() {
		$value = get_option( 'youtube_link', '' );
		echo '<input type="text" style="width: 38%;" id="youtube_link" name="youtube_link" placeholder="e.g. https://youtube.com" value="' . $value . '" />';
	}

	function instagram_html() {
		$value = get_option( 'instagram', '' );
		echo '<input type="text" style="width: 38%;" id="instagram" name="instagram" placeholder="e.g. https://instagram.com/" value="' . $value . '" />';
	}
	
	function store_email_html() {
		$value = get_option( 'store_email_id', '' );		
		echo '<input type="text" style="width: 38%;" id="store_email_id" name="store_email_id" placeholder="Enter store email id" value="' . $value . '" />';
	}
	
	function store_mobile_html() {
		$value = get_option( 'store_mobile_no', '' );		
		echo '<input type="text" style="width: 38%;" id="store_mobile_no" name="store_mobile_no" placeholder="Enter store mobile number" value="' . $value . '" />';
	}

 	function store_address_html() {
		$value = html_entity_decode(get_option('store_address', ''));		
        wp_editor($value, 'store_address', array('textarea_rows'=>4), false);
	}

	function footer_note_html() {
		$value = html_entity_decode(get_option('footer_note', ''));
		echo '<textarea rows=4 style="width: 38%;" id="footer_note" name="footer_note" placeholder="Enter Footer note">'.$value.'</textarea>';
	}
		
}

// Breadcrumbs start
function custom_breadcrumbs() {
	// Settings
	$separator          = '<i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>';
	$breadcrums_id      = 'breadcrumbs';
	$breadcrums_class   = 'breadcrumbs';
	$home_title         = 'Home';
	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = 'product_cat';
	// Get the query & post information
	global $post,$wp_query;
	// Do not display on the homepage
	if ( !is_front_page() ) {
		// Build the breadcrums
		echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
		// Home page
		echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		echo '<li class="separator separator-home"> ' . $separator . ' </li>';
		if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
			echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
		} else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
			// If post is a custom post type
			$post_type = get_post_type();
			// If it is a custom post type display name and link
			if($post_type != 'post') {
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
				echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
			}
			$custom_tax_name = get_queried_object()->name;
			echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
		} else if ( is_single() ) {
			// If post is a custom post type
			$post_type = get_post_type();
			// If it is a custom post type display name and link
			if($post_type != 'post') {
				$post_type_object = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);
				echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
			}
			// Get post category info
			$category = get_the_category();
			if(!empty($category)) {
				// Get last category post is in
				$last_category = end(array_values($category));
				// Get parent any categories and create array
				$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
				$cat_parents = explode(',',$get_cat_parents);
				// Loop through parent categories and store in variable $cat_display
				$cat_display = '';
				foreach($cat_parents as $parents) {
					$cat_display .= '<li class="item-cat">'.$parents.'</li>';
					$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
				}
			}
			// If it's a custom post type within a custom taxonomy
			$taxonomy_exists = taxonomy_exists($custom_taxonomy);
			if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id         = $taxonomy_terms[0]->term_id;
				$cat_nicename   = $taxonomy_terms[0]->slug;
				$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
				$cat_name       = $taxonomy_terms[0]->name;
			}
			// Check if the post is in a category
			if(!empty($last_category)) {
				echo $cat_display;
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			// Else if post is in a custom taxonomy
			} else if(!empty($cat_id)) {
				echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			} else {
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
			}
		} else if ( is_category() ) {
			// Category page
			echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
		} else if ( is_page() ) {
			// Standard page
			if( $post->post_parent ){
				// If child page, get parents 
				$anc = get_post_ancestors( $post->ID );
				// Get parents in the right order
				$anc = array_reverse($anc);
				// Parent page loop
				if ( !isset( $parents ) ) $parents = null;
				foreach ( $anc as $ancestor ) {
					$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
					$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
				}
				// Display parent pages
				echo $parents;
				// Current page
				echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
			} else {
				// Just display current page if not parents
				echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
			}
		} else if ( is_tag() ) {
			// Tag page
			// Get tag information
			$term_id        = get_query_var('tag_id');
			$taxonomy       = 'post_tag';
			$args           = 'include=' . $term_id;
			$terms          = get_terms( $taxonomy, $args );
			$get_term_id    = $terms[0]->term_id;
			$get_term_slug  = $terms[0]->slug;
			$get_term_name  = $terms[0]->name;
			// Display the tag name
			echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
		} elseif ( is_day() ) {
			// Day archive
			// Year link
			echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
			echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
			// Month link
			echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
			echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
			// Day display
			echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
		} else if ( is_month() ) {
			// Month Archive
			// Year link
			echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
			echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
			// Month display
			echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
		} else if ( is_year() ) {
			// Display year archive
			echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
		} else if ( is_author() ) {
			// Auhor archive
			// Get the author information
			global $author;
			$userdata = get_userdata( $author );
			// Display author name
			echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
		} else if ( get_query_var('paged') ) {
			// Paginated archives
			echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
		} else if ( is_search() ) {
			// Search results page
			echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
		} elseif ( is_404() ) {
			// 404 page
			echo '<li>' . 'Error 404' . '</li>';
		}
        echo '</ul>';
    }
}
/*end_breadcum*/

/* Disable wordpress update */

function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');


define( 'WP_AUTO_UPDATE_CORE', false );
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

add_action( 'admin_init', 'remove_update_menu' );
function remove_update_menu() {
    remove_submenu_page( 'index.php', 'update-core.php' );
}


/* remove access */
//add_action('_admin_menu', 'remove_editor_menu', 1);
function remove_menus(){

    remove_menu_page( 'plugins.php' );               //Plugins
    remove_menu_page( 'tools.php' );                 //Tools
    remove_menu_page( 'themes.php' );                 //Appearance
    //remove_menu_page( 'users.php' );                 //Users
    //remove_menu_page( 'options-general.php' );       //Settings
}
//add_action( 'admin_menu', 'remove_menus' );


/* remove admin dasboard logo */
add_action('admin_head', 'admin_wp_logo');

function admin_wp_logo() {
 	echo '<style>#wp-admin-bar-wp-logo, #footer-thankyou { display:none; } </style>';
}

/* Disable WordPress Admin Bar for all users */
//add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
  		show_admin_bar(false);
	}
}
/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

add_action( 'after_setup_theme', 'skip_logo_crop', 11 );
function skip_logo_crop() {

	remove_theme_support( 'custom-logo' );

	add_theme_support( 'custom-logo', array(
		'flex-width'  => true,
		'flex-height' => true,
	) );
}

# add menu class active
function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) )
	{
		$classes[] = 'active ';
	}
	return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function disable_admin_notices() {
	global $wp_filter;
		if ( is_user_admin() ) {
			if ( isset( $wp_filter['user_admin_notices'] ) ) {
				unset( $wp_filter['user_admin_notices'] );
			}
		} elseif ( isset( $wp_filter['admin_notices'] ) ) {
			unset( $wp_filter['admin_notices'] );
		}
		if ( isset( $wp_filter['all_admin_notices'] ) ) {
			unset( $wp_filter['all_admin_notices'] );
		}
}
add_action( 'admin_print_scripts', 'disable_admin_notices' );


#if woocommerce enable



// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.

					//add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);

					function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {

					    global $woocommerce;

					    extract( $_POST );

					    if ( strcmp( $password, $password2 ) !== 0 ) {

					        return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );

					    }

					    return $reg_errors;

					}

					//add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );

					function wc_register_form_password_repeat() {

					    ?>

					    <p class="form-row form-row-wide">

					        <label for="reg_password2"><?php _e( 'Confirm Password', 'woocommerce' ); ?> <span class="required">*</span></label>

					        <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />

					    </p>

					    <?php

					}

					add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );



					function new_loop_shop_per_page( $cols ) {

					    $cols = '15'; /* -1 = All */

					    return $cols;

					}


/* Add Css JS*/

function addStylesheetMain() {

	wp_enqueue_style('bootstrap.min-css',BASEURL."css/bootstrap.min.css");
	wp_enqueue_style('font-awesome',BASEURL."css/font-awesome.min.css");
	wp_enqueue_style('owl-carousel-css',BASEURL."css/owl.carousel.min.css");
	wp_enqueue_style('fancybox-css',BASEURL."css/fancybox.css");
	wp_enqueue_style('animate-css',BASEURL."css/animate.css");
	wp_enqueue_style('bd_style-css',BASEURL."css/bd_style.css");
	wp_enqueue_style('ad_style-css',BASEURL."css/ad_style.css");
	wp_enqueue_style('responsive-css',BASEURL."css/responsive.css");

	//scripts

	//wp_enqueue_script('jquery-min',"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js");

	wp_enqueue_script('jquery-3.6.0-js',BASEURL."js/jquery-3.6.0.js", true);
	wp_enqueue_script('owl.carousel.min-js',BASEURL."js/owl.carousel.min.js");
	wp_enqueue_script('wow.min-js',BASEURL."js/wow.min.js");
	wp_enqueue_script('bootstrap-js',BASEURL."js/bootstrap.min.js");
	wp_enqueue_script('fancybox-js',BASEURL."js/fancybox.js");
	wp_enqueue_script('custom-js',BASEURL."js/bd_custom.js");
	wp_enqueue_script('ad_custom-js',BASEURL."js/ad_custom.js");
	
}

add_action('wp_enqueue_scripts','addStylesheetMain');



/* Cahnge admin Logo */


function my_login_logo_one() { 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $logo_image_url =  $image[0];
    ?> 
    <style type="text/css"> 
        body.login div#login h1 a {
            background-image: url(<?php echo $logo_image_url; ?>); 
            background-size: 100%;
            width:215px;
            height:100px;
            margin:0 auto;
    		max-width: 100%;
        } 
        .login h1 {
		    padding: 10px;
		}
    </style>
<?php 
} 
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
   return home_url();
}


add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );

function keep_me_logged_in_for_1_year( $expirein ) {
    return 31556926; // 1 year in seconds
}



/* Comment form validation on same page*/
function comment_validation_init() {
if(is_single() && comments_open() ) { ?>
<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($)
{
$('#commentform').validate({
rules: {
author: {
required: true,
minlength: 2
},
email: {
required: true,
email: true
},
comment: {
required: true,
minlength: 2
}
},
messages: {
author: "Please enter your name",
email: "Please enter a valid email address.",
//comment: "Please enter your comment"
comment: "Please enter your <?= is_product() ? 'review' : 'comment'?>"
},
errorElement: "div",
errorPlacement: function(error, element) {
element.after(error);
}
});
});
</script>
<?php
}
}
add_action('wp_footer', 'comment_validation_init');

function meks_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');

}