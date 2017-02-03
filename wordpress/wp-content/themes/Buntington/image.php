<?php
/**
 * Image template, used to display image attachments
 */
?>

<?php
// print site header
get_header();
?>
        
<div class="row no-gutter fullwidth"><!-- row -->
    
    <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
    	
        <div class="col-padded"><!-- inner custom column -->
        
            <figure class="news-featured-image">
            	<?php k_attached_image(); ?>
            </figure>
            
            <h1 class="page-title"><?php the_title(); ?></h1>
            
            <div class="news-meta">
            
            <?php
            $published_text = __( '<span class="news-meta-date"><time class="entry-date" datetime="%1$s">%2$s</time></span><span class="news-meta-category"><a href="%3$s" title="Return to %4$s" rel="gallery">%5$s</a></span>', 'kazaz' );
            $post_title = get_the_title( $post->post_parent );
            if( empty( $post_title ) || 0 == $post->post_parent )
            $published_text = '<span class="news-meta-date"><time class="entry-date" datetime="%1$s">%2$s</time></span>';

            printf( $published_text,
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_url( get_permalink( $post->post_parent ) ),
                esc_attr( strip_tags( $post_title ) ),
                $post_title
            );

            $metadata = wp_get_attachment_metadata();
            printf( '<span class="news-meta-comments"><a href="%1$s" class="cbox" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
                esc_url( wp_get_attachment_url() ),
                esc_attr__( 'Link to full-size image', 'kazaz' ),
                __( 'Full resolution', 'kazaz' ),
                $metadata[ 'width' ],
                $metadata[ 'height' ]
            );

            edit_post_link( __( 'Edit', 'kazaz' ), '<span class="news-meta-comments">', '</span>' );
            ?>
            
            </div>
            
            <?php if( $post->post_content ) : ?>
            <hr />
            <?php echo '<p>' . $post->post_content . '</p>'; ?>
            <hr />
            <?php endif; ?>
            
            <div class="gap60"></div>
            
            <div class="clearfix">
                <?php previous_image_link( false, '<span class="pull-left"><i class="fa fa-chevron-left"></i> &nbsp; ' . __( 'Previous image', 'kazaz' ). '</span>' ); ?>
                <?php next_image_link( false, '<span class="pull-right">' . __( 'Next image', 'kazaz' ) . ' &nbsp; <i class="fa fa-chevron-right"></i></span>' ); ?>
            </div>
            
            <div class="row row-splitter"></div>
            
            <?php comments_template(); ?>
            
        </div><!-- inner custom column end -->
        
    </div><!-- doc body wrapper end -->

</div><!-- row end -->

<?php
// print site footer
get_footer();
?>