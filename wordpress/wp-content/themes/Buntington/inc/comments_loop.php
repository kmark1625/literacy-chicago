<?php
if( !function_exists( 'k_comment' ) ) :
	/**
	* Display template for comments and pingbacks.
	*/
    function k_comment( $comment, $args, $depth ) {
        $GLOBALS[ 'comment' ] = $comment;
        switch( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' : 
?>

			<li id="comment-<?php comment_ID(); ?>" class="comment">
                <div class="comment-content-wrap">
                    <p>
                    <?php _e('Pingback:', 'kazaz'); ?> <?php comment_author_link(); ?>
                    </p>
                </div>
<?php
            break;
            default :
            // Regular comments
			global $post; 
?>

			<li id="li-comment-<?php comment_ID(); ?>" class="comment">
            
            	<div id="comment-<?php comment_ID(); ?>"><!-- comment wrap start -->
            
            	<div class="comment-avatar"><!-- author avatar start -->
                	<a href="<?php echo $comment->comment_author_url; ?>">
                		<?php echo get_avatar( $comment, 50 ); ?>
                	</a>
                </div><!-- author avatar end -->
                
				<div class="comment-content-wrap"><!-- comment content wrap start -->
                
					<div class="comment-author"><!-- author start -->
<?php
					printf( '<cite class="fn">%1$s %2$s</cite>',
					get_comment_author_link(),
					( $comment->user_id === $post->post_author ) ? '<span class="label"> ' . __( 'Post author', 'kazaz' ) . '</span> ' : '' ); 
?>
					</div><!-- author end -->

<?php 
					if( '0' == $comment->comment_approved ) : 
					
?>
					<div class="comment-body"><p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kazaz' ); ?></p></div>
<?php 
					endif; 
?>
                    <div class="comment-meta commentmetadata"><!-- comment meta start -->
                    
<?php 
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                    esc_url( get_comment_link( $comment->comment_ID ) ),
                    get_comment_time( 'c' ),
                    sprintf( __('%1$s at %2$s', 'kazaz' ), get_comment_date(), get_comment_time() )
                    ); 
					
					// comment reply link
					comment_reply_link( array_merge( $args, array( 
					'reply_text' => '<i class="fa fa-reply"></i> &nbsp; ' . __( 'Reply', 'kazaz' ), 
					'depth' => $depth, 
					'max_depth' => $args[ 'max_depth' ] 
					) ) );
?>                   
                    </div><!-- comment meta end -->
                    
					<div class="comment-body"><!-- comment text start -->
<?php 
					comment_text();
?>
					</div><!-- comment text end -->
                    
				</div><!-- comment content wrap end -->
                
            	</div><!-- comment wrap end -->

<?php
            break;
		endswitch;
	}
endif;

/**
 * Comment form fields
 */
function k_comment_form_default_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	return wp_parse_args( array(
	
		'author' => '<div class="col-lg-4 col-md-4 col-sm-12"><div class="row"><div class="form-group col-sm-12">' . '<label for="author">' . __( 'Name', 'kazaz' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'email' => '<div class="form-group col-sm-12"><label for="email">' . __( 'Email', 'kazaz' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" id="email" name="email" type="email" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'url' => '<div class="form-group col-sm-12"><label for="url">' . __( 'Website', 'kazaz' ) . '</label> ' .
		'<input class="form-control" id="url" name="url" type="url" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" size="30" /></div></div></div></div>', 
		
		), 
		
		$fields );
}
add_filter( 'comment_form_default_fields', 'k_comment_form_default_fields' );

/**
 * Comment form defaults
 */
function k_comment_form_defaults( $defaults ) {
	$post_id = get_the_ID();
	$user_identity = wp_get_current_user()->exists() ? wp_get_current_user()->display_name : '';
	$req = get_option( 'require_name_email' );
	$required_text = sprintf( ' ' . __( 'Required fields are marked %s', 'kazaz' ), '<span class="required">*</span>' );
	
	$close_div = '';
	if( $user_identity != '' ) $close_div = '</div>';

	if( $user_identity != '' ) $comment_field  = '<div class="col-sm-12"><div class="row"><div class="form-group clearfix col-lg-12"><label for="comment">' . __( 'Comment', 'kazaz' ) . '</label><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div></div>';
	else $comment_field = '<div class="row"><div class="col-lg-8 col-md-8 col-sm-12"><div class="row"><div class="form-group clearfix col-lg-12"><label for="comment">' . __( 'Comment', 'kazaz' ) . '</label><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></div></div></div>';
	
	return wp_parse_args( array(
		'comment_field' => $comment_field,
		
		'must_log_in' => '<div class="row"><div class="col-lg-12"><div class="alert alert-error fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'kazaz' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div></div></div>',
		
		'logged_in_as' => '<div class="row"><div class="col-lg-12"><div class="alert alert-default fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'kazaz' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div></div>',
		
		'comment_notes_before' => '<div class="row"><div class="col-lg-12"><div class="alert alert-default fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>' . __( 'Your email address will not be published.', 'kazaz' ) . ( $req ? $required_text : '' ) . '</div></div></div>',
		
		/*'comment_notes_after' => '<div class="row"><div class="alert alert-info fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'kazaz' ), ' <pre>' . allowed_tags() . '</pre>' ) . '</div></div></div>' */
		
		'comment_notes_after' => $close_div,
		
		'title_reply' => __( 'Post comment', 'kazaz' ),
		
		'title_reply_to' => __( 'Reply to %s', 'kazaz' ),
		
		'cancel_reply_link' => __( 'CANCEL?', 'kazaz' )
		
		), 
		
		$defaults );
}
add_filter( 'comment_form_defaults', 'k_comment_form_defaults' );