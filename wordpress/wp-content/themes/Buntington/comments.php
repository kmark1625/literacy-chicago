<?php
/**
 * Comments template
 */
 
if( post_password_required() ) return; // password protected!
?>

<div class="row gutter"><!-- row -->

	<div class="col-lg-12 col-md-12">

		<div id="comments">
		
			<?php if( have_comments() ) : ?>
		    
		    <h6 class="remove-margin-top"><?php _e( 'Comments', 'kazaz' ); ?> ( <?php comments_number( __( '0', 'kazaz' ), __( '1', 'kazaz' ), __( '%', 'kazaz' ) ); ?> )</h6>
		    
			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'k_comment' ) ); ?>
			</ol>
		
			<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		    
		    <div id="comment-nav-below">
		    
		        <ul class="pager">
		          <li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'kazaz' ) ); ?></li>
		          <li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'kazaz' ) ); ?></li>
		        </ul>
		        
		    </div>
		    
			<?php endif; ?>
		
		    <?php elseif( !comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		    
			<p class="nocomments"><?php _e( 'Comments are closed.', 'kazaz' ); ?></p>
		    
			<?php endif; ?>
		
			<?php comment_form(); ?>
		    
		</div>
		
	</div>
		
</div><!-- row end --> 