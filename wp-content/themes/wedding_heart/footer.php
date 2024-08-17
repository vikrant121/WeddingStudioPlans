<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

<?php
	$address = get_option( 'store_address');
	$number = get_option( 'store_mobile_no');
	$email = get_option( 'store_email_id');

	$facebook = get_option( 'facebook_link');	
	$insta = get_option( 'instagram');
	$linkedin = get_option( 'linkedin_link');
	$youtube = get_option( 'youtube_link');
	$cp = get_option('copyright');
	$info = get_option('footer_note');

?>

<footer class="footer-main">
    <div class="ft-links">
        <?php
            wp_nav_menu( array(
              'menu'              => 'Footer Menu',
              'container'         => true,            
        ));
        ?>
    </div>
    <div class="copyright text-center">
        <?php echo $cp;?> <a href="#" target="_blank">WeddingStudioPlans.</a>
    </div>
</footer>

<?php
if(!is_user_logged_in()){
    ?>
<script type="text/javascript">
        $('.single-post #commentform .submit').click(function() {
            var name = $.trim($('#author').val());
            var comment = $.trim($('#comment').val());
            var email = $.trim($('#email').val());
            if(comment == '') {
                alert('Comment is required.');
                return false;
            }
            if(name == '') {
                alert('Name is required.');
                return false;
            }
            if(email == '') {
                alert('Email is required.');
                return false;
            }  
        });
    </script>
    <?php
}
else{
    ?>
    <script type="text/javascript">
        $('.single-post #commentform .submit').click(function() {
            var comment = $.trim($('#comment').val());
            if(comment == '') {
                alert('Comment is required.');
                return false;
            }
        });
    </script>
    <?php
}
?>

<?php wp_footer(); ?>



</body>
</html>
