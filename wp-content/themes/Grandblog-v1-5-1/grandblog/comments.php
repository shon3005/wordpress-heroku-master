<?php
//Required password to comment
if ( post_password_required() ) { ?>
	<p><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'grandblog-translation' ); ?></p>
<?php
	return;
}
?>
<h3 class="textcenter"><?php comments_number(__( 'Leave A Reply', 'grandblog-translation' ), __( 'Comment', 'grandblog-translation' ), '% '.__( 'Comments', 'grandblog-translation' )); ?></span></h3><hr class="title_break slider"><br class="clear"/>
<?php 
//Display Comments
if( have_comments() ) : ?> 

<div>
	<a name="comments"></a>
	<?php wp_list_comments( array('callback' => 'grandblog_comment', 'avatar_size' => '40') ); ?>
</div>

<!-- End of thread -->  
<div style="height:10px"></div>

<?php endif; ?>  


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

<div class="pagination"><p><?php previous_comments_link('<'); ?> <?php next_comments_link('>'); ?></p></div><br class="clear"/><div class="line"></div><br/><br/>

<?php endif; // check for comment navigation ?>


<?php 
//Display Comment Form
if ('open' == $post->comment_status) : ?> 

<div id="respond">
    <?php comment_form(); ?>
</div>
			
<?php endif; ?> 