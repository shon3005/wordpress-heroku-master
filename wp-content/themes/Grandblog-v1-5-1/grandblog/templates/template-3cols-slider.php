<?php
	//Check if display slider
	$tg_blog_slider = kirki_get_option('tg_blog_slider');

	if(!empty($tg_blog_slider) && !is_search() && !is_category() && !is_tag() && !is_archive())
	{
		//Get post featured category
		$args = array( 
			'orderby' => 'date',
			'order' => 'DESC',
			'order' => 'post',
			'suppress_filters' => 0,
		);
		
		//Check if filter slider posts by selected category
		$tg_blog_slider_cat = kirki_get_option('tg_blog_slider_cat');
		if(!empty($tg_blog_slider_cat))
		{
		    $args['cat'] = $tg_blog_slider_cat;
		}
		
		//Check if filter slider posts by selected category
		$tg_blog_slider_cat = kirki_get_option('tg_blog_slider_cat');
		if(THEMEDEMO)
		{
			$args['cat'] = 7;
		}
		
		//Check slider post items
		$tg_blog_slider_items = kirki_get_option('tg_blog_slider_items');
		if(!empty($tg_blog_slider_items) && is_numeric($tg_blog_slider_items))
		{
			$args['posts_per_page'] = $tg_blog_slider_items;
		}
		else
		{
			$args['posts_per_page'] = 5;
		}
		
		// the query
		$theme_query = new WP_Query( $args );
		
		wp_enqueue_script("grandblog-flexslider-js", get_template_directory_uri()."/js/flexslider/jquery.flexslider-min.js", false, THEMEVERSION, true);
		wp_enqueue_script("grandblog-script-gallery-flexslider", get_template_directory_uri()."/templates/script-slider-flexslider.php", false, THEMEVERSION, true);
?>
	<div id="post_featured_slider" class="slider_wrapper three_cols">
		<div class="flexslider" data-height="350">
			<ul class="slides">
	<?php
		//Display slide content
		$key = 0;
		if ($theme_query->have_posts()) : while ($theme_query->have_posts()) : $theme_query->the_post();
			$key++;
			$total = $wp_query->post_count;
		
			//Get post featured image
			$slide_ID = get_the_ID();
			$image_url = array();
						
			if(has_post_thumbnail($slide_ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($slide_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			}
			
			if(isset($image_url[0]) && !empty($image_url[0]))
			{
			if(($key+2)%3==0)
			{
	?>
			<li>
	<?php
			}
	?>
				<a href="<?php echo get_permalink($slide_ID); ?>">
					<div class="slider_image three_cols" style="background-image:url('<?php echo esc_url($image_url[0]); ?>');">
						<div class="slide_post">
							<h2><?php the_title(); ?></h2>
							<div class="slide_post_date"><?php echo date_i18n(THEMEDATEFORMAT, get_the_time('U')); ?></div>
						</div>
					</div>
				</a>
	<?php
			if($key%3==0)
			{
	?>
			</li>
	<?php
			}
			
			}
			
		endwhile; endif;
	?>
			</ul>
		</div>
	</div>
<?php	
		wp_reset_postdata();
	} //End if display slider
?>