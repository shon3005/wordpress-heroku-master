<?php header("content-type: application/x-javascript"); ?>
<?php
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once $path_to_wp.'/wp-load.php';

$tg_blog_slider_autoplay = kirki_get_option('tg_blog_slider_autoplay');
$tg_blog_slider_autoplay_timer = kirki_get_option('tg_blog_slider_autoplay_timer');
?>
jQuery(window).load(function(){ 
	jQuery('.slider_wrapper').flexslider({
	      animation: "slide",
	      animationLoop: true,
	      itemMargin: 0,
	      minItems: 1,
	      maxItems: 1,
	      controlNav: false,
	      smoothHeight: true,
	      slideshow: 0,
	      animationSpeed: 1000,
	      move: 1,
	      slideshow: <?php echo intval($tg_blog_slider_autoplay); ?>,
	      slideshowSpeed: <?php echo intval($tg_blog_slider_autoplay_timer*1000); ?>
	});
});