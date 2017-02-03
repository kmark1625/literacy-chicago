<?php
/**
 * Custom Post Type: Hom Page /// single hom_page
 */
?>
        
<?php
// print site header
get_header();
?>

	<?php 
	// main loop start
	while( have_posts() ) : the_post();
	?>
	
	<?php
	// big metabox loop; who's where?
	// how many sections?
	$sections = vp_metabox( 'hom_page_metabox.hom_section' );
	// loop thru
	foreach( $sections as $section ) {
		// section layout
		$section_layout = $section[ 'layout_style' ];
		// merge columns
		$section_merge = $section[ 'merge_cols' ];
		// stripped columns
		$section_stripped = $section[ 'stripe_cols' ];
		// stripped odd or even?
		$section_stripped_odd_even = $section[ 'stripe_odd_even' ];
		// force background
		$section_force_bg = $section[ 'force_background' ];
		// remove margins
		$section_no_margins = $section[ 'remove_margins' ];
		// bootstrap cols & classes
		$bs_cols = 1;
		$bs_class_base = '';
		$bs_class_next = '';
		// convert section layout to "readable" section and bootstrap columns number, assign corresponding bs class
		switch( $section_layout ) {
			case '1':
				$section_id = '1';
				$bs_cols = 1;
				$bs_class_base = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
				break;
			case '2':
				$section_id = '2';
				$bs_cols = 2;
				if( !$section_merge ) $bs_class_base = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
				else $bs_class_base = 'col-lg-6 col-md-12 col-sm-12 col-xs-12';
				break;
			case '3':
				$section_id = '3';
				$bs_cols = 3;
				if( !$section_merge ) $bs_class_base = 'col-lg-4 col-md-4 col-sm-12 col-xs-12';
				else $bs_class_base = 'col-lg-4 col-md-12 col-sm-12 col-xs-12';
				break;
			case '4':
				$section_id = '4';
				$bs_cols = 4;
				if( !$section_merge ) $bs_class_base = 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
				else $bs_class_base = 'col-lg-3 col-md-12 col-sm-12 col-xs-12';
				break;
			case '1_3-2_3':
				$section_id = '5';
				$bs_cols = 2;
				if( !$section_merge ) {
					$bs_class_base = 'col-lg-4 col-md-6 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-8 col-md-6 col-sm-12 col-xs-12';
				} else {
					$bs_class_base = 'col-lg-4 col-md-12 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-8 col-md-12 col-sm-12 col-xs-12';
				}
				break;
			case '2_3-1_3':
				$section_id = '6';
				$bs_cols = 2;
				if( !$section_merge ) {
					$bs_class_base = 'col-lg-8 col-md-6 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-4 col-md-6 col-sm-12 col-xs-12';
				} else {
					$bs_class_base = 'col-lg-8 col-md-12 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-4 col-md-12 col-sm-12 col-xs-12';
				}
				break;
			case '1_4-3_4':
				$section_id = '7';
				$bs_cols = 2;
				if( !$section_merge ) {
					$bs_class_base = 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-9 col-md-6 col-sm-12 col-xs-12';
				} else {
					$bs_class_base = 'col-lg-3 col-md-12 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-9 col-md-12 col-sm-12 col-xs-12';
				}
				break;
			case '3_4-1_4':
				$section_id = '8';
				$bs_cols = 2;
				if( !$section_merge ) {
					$bs_class_base = 'col-lg-9 col-md-6 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-3 col-md-6 col-sm-12 col-xs-12';
				} else {
					$bs_class_base = 'col-lg-9 col-md-12 col-sm-12 col-xs-12';
					$bs_class_next = 'col-lg-3 col-md-12 col-sm-12 col-xs-12';
				}
				break;
		}
		// section columns
		$section_cols = $section[ 'section_' . $section_id ];
		
		foreach( $section_cols as $section_col ) {
			// how many shortcodes per section column
			$cnt_cols = 1;
			$section_col_num = count( $section_col );
			
			// section props
			$no_mrg_class = '';
			$force_bg_class = '';
			if( $section_no_margins || count( $section_col ) == 1 ) $no_mrg_class = ' fullwidth';
			if( $section_force_bg ) $force_bg_class = ' section-paint';
			echo '<div class="row no-gutter' . $no_mrg_class . $force_bg_class . '">'; // wrap it up!
			
			while( $cnt_cols <= $section_col_num ) {
				
				// handle columns ----
				if( $section_id > 4 ) {
					echo ( $cnt_cols == 2 ) ? '<div class="' . $bs_class_next . '">' : '<div class="' . $bs_class_base . '">';
				} else echo '<div class="' . $bs_class_base . '">';
				
				$stripped_class = '';
				if( $section_stripped && $section_stripped_odd_even == 'odd' ) {
					if( $cnt_cols % 2 != 0 ) $stripped_class = ' col-shaded';
				} elseif( $section_stripped && $section_stripped_odd_even == 'even' ) {
					if( $cnt_cols % 2 == 0 ) $stripped_class = ' col-shaded';
				}
				if( !$section_no_margins ) echo '<div class="col-padded' . $stripped_class . '">';
				
				// as same as widgets
				echo '<ul class="list-unstyled clear-margins">';
				
				// all shortcodes per current column
				$sc_contents = $section_col[ 'col_' . $section_id . '_' . $cnt_cols ];
				foreach( $sc_contents as $sc_content ) {
					// shortcode string
					$sc = $sc_content[ 'sc_' . $section_id . '_' . $cnt_cols ];
					// get shortcode name
					$sc_name = substr( $sc, 1, strpos( $sc, ' ' ) - 1 );
					echo '<li class="widget-container">' . do_shortcode( $sc ) . '</li>' . "\n";
				}
				
				echo '</ul>';
				
				if( !$section_no_margins ) echo '</div>';
				
				if( $section_col_num == 1 ) echo '</div>';
				
				if( $section_col_num > 1 ) echo '</div>';
				// end handle columns ----
				
				$cnt_cols ++; // increase counter
			}
			
			echo '</div>'; // end wrap
			
		}
	
	}
	// end loop thru
	?>
	    
	<?php endwhile; // main loop ends ?>

<?php
// print site footer
get_footer();
?>