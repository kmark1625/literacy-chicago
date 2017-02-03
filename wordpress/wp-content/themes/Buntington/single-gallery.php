<?php
/**
 * Custom Post Type: Gallery /// single gallery
 */
?>
        
<?php
// print site header
get_header();
?>

    <div class="row no-gutter fullwidth"><!-- row -->
        
        <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
        	
            <div class="col-padded"><!-- inner custom column -->
				
				<?php
				// main loop start
				while( have_posts() ) : the_post();
				?>
				
				<h1 class="page-title"><?php the_title(); ?></h1>
				
				<div class="news-body">
				
					<div class="row gutter">
						<div class="col-lg-12">
						<?php the_content(); ?>
						</div>
					</div>
					
					<?php
					// grab all images attached...
					$photos_num = 0;
					$this_post_images = get_children( array(
						'post_parent' => get_the_ID(),
						'post_type' => 'attachment',
						'post_mime_type' => 'image', 
						'orderby' => 'menu_order', 
						'order' => 'ASC'
					) );
					
					if( !empty( $this_post_images ) ) {
					?>
					
					<div class="row gutter k-equal-height">
					
					<?php foreach( $this_post_images as $photo ) : ?>
					
                    	<?php 
                    	// any post content?
                    	$photo_meta = '';
                    	if( !empty( $photo->post_content ) ) $photo_meta = esc_attr( $photo->post_content );
                    	elseif( !empty( $photo->post_excerpt ) ) $photo_meta = esc_attr( $photo->post_excerpt );
                    	?>
					
                        <div class="col-lg-4 col-md-4 col-sm-12">
                        	<figure class="gallery-photo-thumb">
                            	<a href="<?php echo wp_get_attachment_url( $photo->ID ); ?>" title="<?php echo $photo_meta; ?>" class="swipebox" rel="gallery-'<?php the_ID(); ?>'">
                            	<?php echo wp_get_attachment_image( $photo->ID, 'large' ); ?>
                            	</a>
                            </figure>
                        	<?php if( !empty( $photo_meta ) ) : ?><div class="gallery-photo-description"><?php echo $photo_meta; ?></div><?php endif; ?>
                        </div>
					
					<?php endforeach; ?>
					
					</div>
					
					<div class="row"><?php k_share_with_add_this(); // addThis sharing ?></div>
					
					<?php } // end has photos ?>
				</div>
					
				<?php
				// paging
				$next_post = get_adjacent_post( false, '', true, 'galleries' );
				$next_post_title = '';
				if( isset( $next_post->ID ) ):
				    $next_id = $next_post->ID;
				    $next_post_title = esc_attr( $next_post->post_title );
				else : 
					$args = array( 'posts_per_page' => '1', 'post_type' => 'gallery' );
				    $next_post = new WP_Query( $args );
				    $next_id = $next_post->post->ID;
				    $next_post_title = esc_attr( $next_post->post->post_title );
				endif;
				
				// handle next gallery link
				if( $next_id != get_the_ID() ) : 
				
					$next_photos_num = 0;
					$next_post_images = get_children( array(
						'post_parent' => $next_id,
						'post_type' => 'attachment',
						'post_mime_type' => 'image'
					) );
					
					if( !empty( $this_post_images ) ) {
						// how many photos?
						$next_photos_num = count( $next_post_images );
						if( $next_photos_num < 10 ) $next_photos_num = '0' . $next_photos_num;
					}
				?>
				
				<br /><hr />
				
				<div class="row gutter">
					<div class="col-lg-12">
						<a href="<?php echo get_permalink( $next_id ); ?>" title="<?php echo $next_post_title; ?>" class="next-gallery-link">
							<figure class="next-gallery-thumb">
					        	<?php echo get_the_post_thumbnail( $next_id, 'thumbnail' ); ?>
				    		</figure>
				    		<div class="next-gallery-meta">
				    			<h6 class="title-median clear-margins"><?php _e( 'Next Gallery:', 'kazaz' ); ?></h6>
				    			<h5 class="next-gallery-title clear-margins"><?php echo $next_post_title ?></h5>
				    			<div class="gallery-photos-num"><?php echo $next_photos_num; ?></div>
				    			<div class="gallery-photos-tag"><?php echo _x( 'Photos', 'galleries category page, NN photos', 'kazaz' ); ?></div>
				    		</div>
			    		</a>
			    	</div>
			    </div>
			    
			    <?php endif; // if only one post in all galleries ?>
				
				<?php
				// main loop end
				endwhile;
				?>
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>