<?php
/**
 * Custom Post Type: Course /// single course
 */
?>

<?php
// print site header
get_header();
?>

<?php
// sidebar
$sidebar_class = '';
$sidebar_pos = vp_option( 'vpt_option.sidebar_position' );
if( $sidebar_pos == 'left' ) $sidebar_class = ' col-lg-push-4 col-md-push-4';
?>

	<div class="row no-gutter"><!-- row -->

		<div class="col-lg-8 col-md-8<?php echo $sidebar_class; ?>"><!-- doc body wrapper -->
		
			<div class="col-padded"><!-- inner custom column -->
				
			<?php if( have_posts() ) : ?>
				
				<div class="row gutter"><!-- row -->
				
					<div class="col-lg-12 col-md-12">
				
					<?php while( have_posts() ) : the_post(); ?>

                        <div id="post-<?php the_ID(); ?>" <?php post_class( 'course-title-meta clearfix' ); ?>><!-- course meta -->
                        
                            <h1 class="page-title"><?php the_title(); ?></h1>
                            
	                    	<?php
	                    	// grab post meta
	                    	$course_id = esc_attr( vp_metabox( 'course.course_id' ) );
	                    	$course_features_arr = vp_metabox( 'course.course_features' );
	                    	$course_docs_arr = vp_metabox( 'course.course_documents' );
	                    	?>
                            
                            <dl class="dl-horizontal course-meta">
                            	<dt><?php _e('Course ID', 'kazaz'); ?></dt><dd><?php echo esc_attr( $course_id ); ?></dd>
                            	<?php
		                    	if( !empty( $course_features_arr ) ) {
		                    		foreach( $course_features_arr as $course_feature ) {
		                    			$course_feature_name  = $course_feature[ 'course_f_name' ];
		                    			$course_feature_value = $course_feature[ 'course_f_value' ];
		                    	?>
		                    	<dt><?php echo $course_feature_name; ?></dt><dd><?php echo $course_feature_value; ?></dd>
		                    	<?php
		                    		} // end foreach
		                    	} // end if
                            	?>
                            </dl>
                            
                        </div><!-- course meta end -->
                        
                        <div class="news-body clearfix">
                        
                        	<?php the_content(); ?>
                        	
                        	<?php
                        	// any docs for download?
                        	if( !empty( $course_docs_arr ) ) {
                        	?>
                        	
                        	<h6><?php _e( 'Course Downloads:', 'kazaz' ); ?></h6>
                        	
                        	<ul class="list-unstyled list-downloads"><!-- downloads list -->
                        	
                        	<?php
                        	foreach( $course_docs_arr as $course_docs ) {
                        		$course_docs_file  = $course_docs[ 'course_doc' ];
                        		$course_docs_title = $course_docs[ 'course_doc_title' ];
                        		$course_docs_descr = $course_docs[ 'course_doc_description' ];
                        	?>
                        	
                        	<li>
                        		<i class="fa fa-cloud-download"></i>
                            	<a href="<?php echo $course_docs_file; ?>" title="<?php if( !empty( $course_docs_title ) ) echo esc_attr( $course_docs_title ); ?>" class="download-link">
                                	<?php if( !empty( $course_docs_title ) ) { ?>
                                		<span class="dwnld-title"><?php echo esc_attr( $course_docs_title ); ?></span>
                                	<?php } // endif ?>
                                	<?php if( !empty( $course_docs_descr ) ) { ?>
                                	<span class="help-block"><?php echo esc_attr( $course_docs_descr ); ?></span>
                                	<?php } // endif ?>
                                </a>
                        	</li>
                        	
                        	<?php } // end foreach ?>
                        	
                        	</ul><!-- downloads list end -->
                        	
                        	<?php } // end downloads ?>
                        
                        </div>

					<?php endwhile; ?>
				
					</div>
					
					<?php k_share_with_add_this(); // addThis sharing ?>
				
				</div><!-- row end -->
				
				<?php k_paging(); //post paging ?>
				
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
		get_template_part( 'sidebars/sidebar-single-course' );
		
		// print sidebar wrappers - close
		k_sidebar_foot();
		?>
		
	</div><!-- row end -->

<?php
// print site footer
get_footer();
?>