<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
	$number = get_option( 'store_mobile_no');
	$email = get_option( 'store_email_id');
	$facebook = get_option( 'facebook_link');	
	$insta = get_option( 'instagram');
    $youtube = get_option( 'youtube_link');
	$twitter = get_option( 'twitter_link');
?>

<header class="header-main">
    <div class="header-top d-flex justify-content-between align-items-center">
        <div class="ht-left">
            <ul>
                <li><a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="<?php echo $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="<?php echo $insta;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
        </div>
        <div class="logo">    
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            $logo_image_url =  $image[0];
            if($logo_image_url != '') {?>
            <a href="<?php echo get_home_url(); ?>" class="navbar-brand bd_logo">
                <img src="<?php echo $logo_image_url; ?>" alt="<?=get_bloginfo()?>" title="<?=get_bloginfo()?>"/>
            </a> 
            <?php
            }
            ?>
        </div>
        <div class="ht-right">
            <ul>
                <li><a href="tel:<?php echo $number;?>"><?php echo $number;?></a></li>
                <li><a href="mailto:<?php echo $email;?>>"><?php echo $email;?></a></li>
            </ul>
        </div>
    </div>
    <div class="header-menu">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    wp_nav_menu( array(
                      'menu'              => 'Top Menu',
                      'container'         => true,
                      'theme_location'    => 'Primary',
                      'menu_class' => 'navbar-nav mx-auto',             
                ));
                ?>
            </div>
        </nav>
    </div>
</header>