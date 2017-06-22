<?php
//Get page ID
if(is_object($post))
{
    $obj_page = get_page($post->ID);
}
$current_page_id = '';

if(isset($obj_page->ID))
{
    $current_page_id = $obj_page->ID;
}
elseif(is_home())
{
    $current_page_id = get_option('page_on_front');
}
?>

<div class="header_style_wrapper">
<?php
    //Check if display top bar
    $tg_topbar = kirki_get_option('tg_topbar');
    if(THEMEDEMO && isset($_GET['topbar']) && !empty($_GET['topbar']))
	{
	    $tg_topbar = true;
	}

    global $grandblog_topbar;
    $grandblog_topbar = $tg_topbar;

    if(!empty($tg_topbar))
    {
?>

<!-- Begin top bar -->
<div class="above_top_bar">
    <div class="page_content_wrapper">

    <div class="top_contact_info">
		<?php
		    $tg_menu_contact_hours = kirki_get_option('tg_menu_contact_hours');

		    if(!empty($tg_menu_contact_hours))
		    {
		?>
		    <span id="top_contact_hours"><i class="fa fa-clock-o"></i><?php echo esc_html($tg_menu_contact_hours); ?></span>
		<?php
		    }
		?>
		<?php
		    //Display top contact info
		    $tg_menu_contact_number = kirki_get_option('tg_menu_contact_number');

		    if(!empty($tg_menu_contact_number))
		    {
		?>
		    <span id="top_contact_number"><a href="tel:<?php echo esc_attr($tg_menu_contact_number); ?>"><i class="fa fa-phone"></i><?php echo esc_html($tg_menu_contact_number); ?></a></span>
		<?php
		    }
		?>
    </div>

    <?php
    	//Display Top Menu
    	if ( has_nav_menu( 'top-menu' ) )
		{
		    wp_nav_menu(
		        	array(
		        		'menu_id'			=> 'top_menu',
		        		'menu_class'		=> 'top_nav',
		        		'theme_location' 	=> 'top-menu',
		        	)
		    );
		}
    ?>
    <br class="clear"/>
    </div>
</div>
<?php
    }
?>
<!-- End top bar -->

<?php
    $pp_page_bg = '';
    //Get page featured image
    if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id);
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        $pp_page_bg = $image_thumb[0];
    }

   if(!empty($pp_page_bg) && basename($pp_page_bg)=='default.png')
    {
    	$pp_page_bg = '';
    }
?>
<div class="top_bar">

		<div id="menu_wrapper">
			<div class="custom-nav">
				<a href="http://www.appwinit.com" class="top-logo"><img src="http://www.appwinit.com/public/images/logo/image.png"/></a>

				<div class="right-nav">
					<a href="http://www.appwinit.com">Home</a>
					<a href="http://www.appwinit.com/how-it-works">How it Works</a>
					<a href="http://www.appwinit.com/business">Business</a>
					<a href="http://www.appwinit.com/faq">FAQ</a>
					<a href="http://www.appwinit.com/contact">Contact</a>
					<a href="http://blog.appwinit.com">Blog</a>
				</div>
			</div>

		<?php
			//Check if enable main menu
			$tg_main_menu = kirki_get_option('tg_main_menu');
			if(THEMEDEMO && isset($_GET['menu']) && !empty($_GET['menu']))
			{
			    $tg_main_menu = false;
			}

			if(!empty($tg_main_menu))
			{
		?>
	        <!-- End main nav -->
        <?php
        	}
        ?>
        </div>
    	</div>
    </div>

    <!-- Begin logo -->
    <div id="logo_wrapper">

    <?php
        //get custom logo
        $tg_retina_logo = kirki_get_option('tg_retina_logo');

        if(!empty($tg_retina_logo))
        {
        	//Get image width and height
	    	$image_id = grandblog_get_image_id($tg_retina_logo);
	    	$obj_image = wp_get_attachment_image_src($image_id, 'original');
	    	$image_width = 0;
	    	$image_height = 0;

	    	if(isset($obj_image[1]))
	    	{
	    		$image_width = intval($obj_image[1]/2);
	    	}
	    	if(isset($obj_image[2]))
	    	{
	    		$image_height = intval($obj_image[2]/2);
	    	}
    ?>
    <div id="logo_normal" class="logo_container">
        <div class="logo_align">
	        <a id="custom_logo" class="logo_wrapper default" href="<?php echo esc_url(home_url('/')); ?>">
	        	<?php
	    			if($image_width > 0 && $image_height > 0)
	    			{
	    		?>
	    		<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>"/>
	    		<?php
	    			}
	    			else
	    			{
	    		?>
	        	<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="252" height="108"/>
	        	<?php
	    	    	}
	    	    ?>
	        </a>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- End logo -->
</div>
