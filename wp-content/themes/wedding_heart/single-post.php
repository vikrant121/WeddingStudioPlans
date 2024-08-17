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

	<div class="inner_banner">
		<?php
			$imageURL = get_the_post_thumbnail_url($post->ID, 'full');
				if($imageURL == '') {
				$imageURL = DEFAULT_BANNER;
			}
		?>
		<img class="baner_img_page" src="<?php echo $imageURL;?>" alt="<?php echo $post->post_title;?>" />
		
		<div class="inner_banner_text">
			<div class="container">
				<div class="banner_area_text_box">
					<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
							
		        </div>
			</div>
		</div>
	</div>


	<div class="ptb blogsec">
		<div class="container">
			<div class="row">
				<div class="col-md-8 mx-auto inner_con">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

							<?php

							// Start the Loop.
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/blogdetails', 'single' );

								if ( is_singular( 'attachment' ) ) {
									// Parent post navigation.
									the_post_navigation(
										array(
											/* translators: %s: Parent post link. */
											'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
										)
									);
								} elseif ( is_singular( 'post' ) ) {
									// Previous/next post navigation.
									the_post_navigation(
										array(
											'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
												'<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
												'<span class="post-title">%title</span>',
											'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
												'<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
												'<span class="post-title">%title</span>',
										)
									);
								}

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}

							endwhile; // End the loop.
							?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>

				<div class="col-12 mt-md-5 mt-4">

					<div class="heading">
						<h2>Other Blog</h2>
					</div>
					<div class="owl-carousel releted_services">
						<?php
						    $blog = array(
						    'category__in' => wp_get_post_categories($post->ID),
						    'post__not_in' => array($post->ID),	
						    'post_type' => 'post',
						    'order' => 'DSC',
						    'numberposts' =>4, 
						    'orderby'=>'date',
						    'order'=>'DESC'
						    );
						    $blogs = get_posts($blog);
						    if(!empty($blogs))
						    {
						    	foreach ($blogs as $key => $value) {
							    $link = get_the_permalink($value);
								$title = $value->post_title;
								$publish_date = get_the_date( 'j F Y',$value);
								$content = $value->post_content;
					        	$img = get_field('image',$value);
						        if(!empty($img)){
						            $img = $img;
						        }else{
						            $img = NO_IMAGE;

						        }
							?>
						<div class="item">
							<div class="recent_blog">
								<div class="bd_postimg">
						           <img src="<?php echo $img; ?>" alt="" class="img-fluid">
						        </div>
						        <div class="bd_deskebox">
						          <div class="post_date"><?php echo $publish_date;?></div>  
						          <h2><?php echo $title;?></h2>
						          <p><?php echo shortDesc($content,50).'...'.' <a href="'. $link .'">Read more<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>'; ?></p>
						        </div>
							</div>
						</div>
						<?php
							  }
						    }
						    else
						    {
						    	?>
						    	<div class="recent_post">
									<div class="recent_post_content">
										<p>No Related Post Found.</p>
									</div>
								</div>
						    	<?php
						    }
						    
						?>
					</div>


				</div>

			</div>
		</div>
	</div>


<?php
get_footer();
