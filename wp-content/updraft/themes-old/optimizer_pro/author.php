<?php 
/**
 * The Author page for LayerFramework
 *
 * Displays The Author page template
 *
 * @package LayerFramework
 * 
 * @since  LayerFramework 1.0
 */
global $optimizer;?>

<?php get_header(); ?>
<?php
	//Get the user data
	if(isset($_GET['author_name'])) :
	$curauth = get_userdatabylogin($author_name);
	else :
	$curauth = get_userdata(intval($author));
	endif;
?>


<div class="author_wrap layer_wrapper">
	<?php do_action('optimizer_before_author'); ?>
    
    <!--AUTHOR BIO START-->
        <div class="author_div">
            <div class="author_left"><?php echo get_avatar($curauth->ID, $size = '100'); ?></div>
            <div class="author_right">
            </div>
            <h3 class="author_posts"><span><?php _e('Posts by ', 'optimizer');?></span><?php echo $curauth->display_name; ?></h3>
        </div>
        
    <!--AUTHOR BIO END-->
    
    <div id="content">
         <!--AUTHOR POSTS START-->
         <?php get_template_part('template_parts/post','layout4'); ?>
         
	</div><!--#content END-->

	<?php do_action('optimizer_after_author'); ?>
</div><!--layer_wrapper class END-->
<?php get_footer(); ?>