<?php
/**
 * Search custom post type - Course
 */
?>

<?php
// print site header
get_header();
?>

<?php
// query
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' => 'course', 
	'paged' => $paged, 
	'order' => 'ASC', 
	'orderby' => 'title', 
	'meta_query' => array(
     array(
       'key' => '_search',
       'value' => esc_attr( $_GET[ 's' ] ),
       'compare' => 'LIKE'
		)
	)
);
$q_search_courses = new WP_Query( $args );

// sidebar
$sidebar_class = '';
$sidebar_pos = vp_option( 'vpt_option.sidebar_position' );
if( $sidebar_pos == 'left' ) $sidebar_class = ' col-lg-push-4 col-md-push-4';
?>

	<div class="row no-gutter"><!-- row -->

		<div class="col-lg-8 col-md-8<?php echo $sidebar_class; ?>"><!-- doc body wrapper -->
		
			<div class="col-padded"><!-- inner custom column -->
			
            	<div class="row gutter"><!-- row -->
                
                	<div class="col-lg-12 col-md-12">
            
                    	<h1 class="title-widget">
	                        <?php echo __( 'Course search results:', 'kazaz' ) . ' <em>' . esc_attr( $_GET[ 's' ] ) . '</em>'; ?>
                    	</h1>
                    
                    </div>
                
                </div><!-- row end -->
				
				<?php if( $q_search_courses->have_posts() ) : ?>
					
				<div class="row gutter"><!-- row -->
				
					<div class="col-lg-12 col-md-12">
					
						<table class="table table-striped table-courses remove-margin-top"><!-- courses table -->
						
                            <thead>
                                <tr>
                                    <th><?php _e( 'Course ID', 'kazaz' ); ?></th>
                                    <th><?php _e( 'Course Title', 'kazaz' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
				
							<?php while( $q_search_courses->have_posts() ) : $q_search_courses->the_post(); ?>
		                    	
                                <tr>
                                    <td>
                                    	<?php 
                                    	$course_id = vp_metabox( 'course.course_id' );
                                    	if( $course_id ) echo esc_attr( $course_id );
                                    	else echo _x( '-----', 'non-existing table value', 'kazaz' );
                                    	?>
                                    </td>
                                    <td>
		                            	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
		                            	<?php the_title(); ?>
		                            	</a>
                                    </td>
                                </tr>
							
							<?php endwhile; ?>
						
	                        </tbody>
					
						</table><!-- courses table end -->
				
					</div>
				
				</div><!-- row end -->
					
				<?php k_pagination(); // pagination ?>
						
				<?php else : ?>
				
					<div class="row gutter"><!-- row -->
				
					<?php get_template_part( 'content', 'none' ); ?>
				
					</div><!-- row end -->

				<?php endif; ?>
				
			</div><!-- inner custom column end -->
			
		</div><!-- doc body wrapper end -->
			
		<?php
		// print sidebar wrappers - open
		k_sidebar_head();
		
		// print sidebar content
		get_template_part( 'sidebars/sidebar-courses' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>