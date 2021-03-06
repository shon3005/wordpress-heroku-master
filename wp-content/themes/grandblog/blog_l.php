<?php
/**
 * The main template file for display blog page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

get_header(); 

$is_standard_wp_post = FALSE;
$page_sidebar = 'page-sidebar';

if(is_tag())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'tag-sidebar';
} 
elseif(is_category())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'category-sidebar';
}
elseif(is_archive())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'archives-sidebar';
} 
elseif(is_search())
{
    $is_standard_wp_post = TRUE;
    $page_sidebar = 'search-sidebar';
} 
		
get_header(); 

//Include post featured slider
$tg_blog_slider_layout = kirki_get_option('tg_blog_slider_layout');

get_template_part("/templates/template-".$tg_blog_slider_layout);

if(is_category() OR is_tag() OR is_archive())
{
	get_template_part("/templates/template-header");
}
else
{
?>
<div id="page_content_wrapper">
<?php
}
?>
    <div class="inner">

    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    	
    			<div class="sidebar_wrapper left_sidebar">
	    			<div class="sidebar">
	    			
	    				<div class="content">
	
	    					<?php 
							if (is_active_sidebar('page-sidebar')) { ?>
			    	    		<ul class="sidebar_widget">
			    	    			<?php dynamic_sidebar($page_sidebar); ?>
			    	    		</ul>
			    	    	<?php } ?>
	    				
	    				</div>
	    		
	    			</div>
	    			<br class="clear"/>
	    		</div>

    			<div class="sidebar_content left_sidebar">
<?php
//Include post search bar
get_template_part("/templates/template-search");

if (have_posts()) : while (have_posts()) : the_post();
	$image_thumb = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
	}
?>

<!-- Begin each blog post -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post_wrapper">
	    
	    <div class="post_content_wrapper">
	    
	    	<div class="post_header">
	    	
	    		<?php
				    //Get post featured content
				    $post_ft_type = get_post_meta(get_the_ID(), 'post_ft_type', true);
				    
				    switch($post_ft_type)
				    {
				    	case 'Image':
				    	default:
				        	if(!empty($image_thumb))
				        	{
				        		$small_image_url = wp_get_attachment_image_src($image_id, 'grandblog_blog', true);
				?>
				
				    	    <div class="post_img static">
				    	    	<a href="<?php the_permalink(); ?>">
				    	    		<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="" class="" style="width:<?php echo esc_attr($small_image_url[1]); ?>px;height:<?php echo esc_attr($small_image_url[2]); ?>px;"/>
					            </a>
				    	    </div>
				
				<?php
				    		}
				    	break;
				    	
				    	case 'Vimeo Video':
				    		$post_ft_vimeo = get_post_meta(get_the_ID(), 'post_ft_vimeo', true);
				?>
				    		<?php echo do_shortcode('[tg_vimeo video_id="'.$post_ft_vimeo.'" width="670" height="377"]'); ?>
				<?php
				    	break;
				    	
				    	case 'Youtube Video':
				    		$post_ft_youtube = get_post_meta(get_the_ID(), 'post_ft_youtube', true);
				?>
				    		<?php echo do_shortcode('[tg_youtube video_id="'.$post_ft_youtube.'" width="670" height="377"]'); ?>
				<?php
				    	break;
				    	
				    } //End switch
				?>
			   
			   	<br class="clear"/>
	    	
			   <div class="post_header_title">
				   	<?php
						//Get Post's Categories
					    $post_categories = wp_get_post_categories($post->ID);
					    if(!empty($post_categories))
					    {
					?>
					<div class="post_info_cat">
						<span>
					    <?php
					    	$i = 0;
					    	$len = count($post_categories);
					        foreach($post_categories as $c)
					        {
					        	$cat = get_category( $c );
					    ?>
					        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
					    <?php
					    		if ($i != $len - 1) {
					    		
					    		if(THEMEDEMO && $i == 1)
					    		{
						    		break;
					    		}
					    ?>
					        &nbsp;/
					    <?php
					    		}
					    		$i++;
					        }
					    ?>
						</span>
					</div>
					<?php
						}
					?>
			      	<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
			      	<hr class="title_break">
			      	<div class="post_detail post_date">
			      		<span class="post_info_date">
			      			<span>
			       				<?php esc_html_e( 'Posted On', 'grandblog-translation' ); ?> <?php echo date_i18n(THEMEDATEFORMAT, get_the_time('U')); ?>
			      			</span>
			      		</span>
				  	</div>
			   </div>
			      
			    <?php
			      	$tg_blog_display_full = kirki_get_option('tg_blog_display_full');
			      	
			      	if(!empty($tg_blog_display_full))
			      	{
			      		the_content();
			      	}
			      	else
			      	{
			      		the_excerpt();
			      	}
			    ?>

			    <hr class="readmore_break">
			    
			    <div class="post_button_wrapper">
			    	<a class="readmore" href="<?php the_permalink(); ?>"><?php echo esc_html_e( 'Continue Reading', 'grandblog-translation' ); ?></a>
			    </div>
			    
			    <div class="post_info_comment">
					<a href="<?php comments_link(); ?>"><?php comments_number(__('No Comment', 'grandblog-translation'), __('1 Comment', 'grandblog-translation'), __('% Comments', 'grandblog-translation')); ?></a>
				</div>
			</div>
			
	    </div>
	    
	</div>

</div>
<br class="clear"/>
<!-- End each blog post -->

<?php endwhile; endif; ?>

	    	<?php 
				if(!isset($paged) OR empty($paged))
				{
					$paged = 1;
				}
			?>
			
	    	<div class="pagination"><div class="pagination_page"><?php echo esc_html($paged); ?></div><?php posts_nav_link(' ', '<i class="fa fa-angle-double-left"></i>'.esc_html__('Newer Posts', 'grandblog-translation' ), esc_html__('Older Posts', 'grandblog-translation' ).'<i class="fa fa-angle-double-right"></i>'); ?></div>
    		
			</div>
    		
    	</div>
    <!-- End main content -->
	</div>
</div>
<?php get_footer(); ?>