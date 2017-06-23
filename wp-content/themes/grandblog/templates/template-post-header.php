<?php
/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Get page header display setting
$page_title = get_the_title();
$tg_blog_header_bg = kirki_get_option('tg_blog_header_bg');

$post_ft_type = get_post_meta(get_the_ID(), 'post_ft_type', true);

if(!empty($tg_blog_header_bg) && has_post_thumbnail($current_page_id, 'full') && $post_ft_type != 'Gallery')
{
	$pp_page_bg = '';
	
	//Get page featured image
	if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        
        if(isset($image_thumb[0]) && !empty($image_thumb[0]))
        {
        	$pp_page_bg = $image_thumb[0];
        }
        
        //Check if add blur effect
		$tg_page_title_img_blur = kirki_get_option('tg_page_title_img_blur');
    }
    
    global $grandblog_topbar;
    global $grandblog_screen_class;
?>
<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg parallax<?php } ?> <?php if(!empty($grandblog_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($grandblog_screen_class)) { ?>split<?php } ?>">

	<?php if(!empty($pp_page_bg)) { ?>
		<div id="bg_regular" style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"></div>
	<?php } ?>
	<?php
	    if(!empty($tg_page_title_img_blur) && !empty($pp_page_bg) && $grandblog_screen_class != 'split')
	    {
	?>
	<div id="bg_blurred" style="background-image:url(<?php echo admin_url('admin-ajax.php').'?action=grandblog_blurred&src='.esc_url($pp_page_bg); ?>);"></div>
	<?php
	    }
	?>
</div>
<?php
}
?>

<?php
	//Check if gallery post type then display horizontal gallery
	
	if($post_ft_type == 'Gallery')
	{
		$post_ft_gallery = get_post_meta(get_the_ID(), 'post_ft_gallery', true);
	
		//Get gallery images
		$all_photo_arr = get_post_meta($post_ft_gallery, 'wpsimplegallery_gallery', true);
		
		//Get global gallery sorting
		$all_photo_arr = grandblog_resort_gallery_img($all_photo_arr);
	
		wp_enqueue_script("grandblog-horizontal-gallery", get_template_directory_uri()."/js/horizontal_gallery.js", false, THEMEVERSION, true);
?>
<div id="horizontal_gallery" class="tg_post">
	<table id="horizontal_gallery_wrapper">
	<tbody><tr>
	<?php
	    foreach($all_photo_arr as $photo_id)
		{
		    $small_image_url = '';
		    $hyperlink_url = get_permalink($photo_id);
		    $thumb_image_url = '';
		    
		    if(!empty($photo_id))
		    {
		    	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
		    }
		    
		    //Get image meta data
		    $image_caption = get_post_field('post_excerpt', $photo_id);
		    $image_alt = get_post_meta($photo_id, '_wp_attachment_image_alt', true);
		    $tg_lightbox_enable_caption = kirki_get_option('tg_lightbox_enable_caption');
	?>
	<td>
	    <?php 
	    	if(isset($image_url[0]) && !empty($image_url[0]))
	    	{
	    ?>
	    	<a <?php if(!empty($tg_lightbox_enable_caption)) { ?>title="<?php if(!empty($image_caption)) { ?><?php echo esc_attr($image_caption); ?><?php } ?>"<?php } ?> class="fancy-gallery" href="<?php echo esc_url($image_url[0]); ?>">
	    	<div class="gallery_image_wrapper">
		    	<img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="horizontal_gallery_img"/>
	    	</div>
	    	</a>
	    <?php
	    	}		
	    ?>
	</td>
	
	<?php
	    }
	?>
	</tr></tbody>
	</table>
</div>
<?php
	}
?>

<!-- Begin content -->
<?php
global $grandblog_page_content_class;
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php } ?><?php if(!empty($pp_page_bg) && !empty($grandblog_topbar)) { ?>withtopbar <?php } ?><?php if(!empty($grandblog_page_content_class)) { echo esc_attr($grandblog_page_content_class); } ?>">