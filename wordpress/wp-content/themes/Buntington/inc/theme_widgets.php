<?php 
/**
 * Theme Widgets
 */
 
// TWITTER 
class SOFA_Twitter extends WP_Widget {

	function SOFA_Twitter() {
		$widget_ops = array( 'classname' => 'widget_sofa_twitter', 'description' => __( 'Display Twitter Twitts for a target user.', 'kazaz' ) );
		//$this->WP_Widget( 'sofa_twitter', 'SOFA Twitter', $widget_ops );
		parent::__construct( 'sofa_twitter', 'SOFA Twitter', $widget_ops );
	}
 
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
		
		$excl_replies = false;
		$s_twitter_title = empty( $instance[ 's_twitter_title' ] ) ? '' : apply_filters( 'widget_s_twitter_title', $instance[ 's_twitter_title' ] );
		$s_twitter_user  = empty( $instance[ 's_twitter_user' ] ) ? 'dameer' : apply_filters( 'widget_s_twitter_user', $instance[ 's_twitter_user' ] );
		$s_twitts_number = empty( $instance[ 's_twitts_number' ] ) ? 3 : apply_filters( 'widget_s_twitts_number', $instance[ 's_twitts_number' ] );
		$s_twitts_exclude_replies = empty( $instance[ 's_twitts_exclude_replies' ] ) ? 'yes' : apply_filters( 'widget_s_twitts_exclude_replies', $instance[ 's_twitts_exclude_replies' ] );
		
		if( $s_twitts_number > 10 ) $s_twitts_number = 10;
		if( $s_twitts_exclude_replies == 'yes' ) $excl_replies = true;
		else $excl_replies = false;
		
		// local vars
		$consumer_key    = esc_attr( vp_option( 'vpt_option.twitter_consumer_key' ) );
		$consumer_secret = esc_attr( vp_option( 'vpt_option.twitter_consumer_secret' ) );
		$access_token    = esc_attr( vp_option( 'vpt_option.twitter_access_token' ) );
		$access_secret   = esc_attr( vp_option( 'vpt_option.twitter_access_token_secret' ) );
		
		echo $before_widget;

		if( $s_twitter_title != '' ) echo $before_title . $s_twitter_title . $after_title;
		
		//create a new instance
		require_once 'twitteroauth.php';
		require_once 'FooTweetFetcher.php';
		$fetcher = new FooTweetFetcher( $consumer_key, $consumer_secret, $access_token, $access_secret );
		$args = array(
			'limit'            => $s_twitts_number, 
			'include_rts' 	   => false, 
			'exclude_replies'  => $excl_replies
		);
		
		//get tweets (cached for 5 hours)
		$tweets = $fetcher->get_tweets( $s_twitter_user, $args );
		if( $tweets !== false && is_array( $tweets ) && ( count( $tweets ) > 0 ) ) {
		?>
		<ul class="k-twitter-twitts list-unstyled">
		<?php
		foreach( $tweets as $tweet ) {
			//convert all URLs, mentions, hashtags, media to clickable links
			$text = $fetcher->make_clickable( $tweet );
		?>
		<li class="twitter-twitt"><p><?php echo $text; ?></p></li>
		<?php } // endforeach ?>	        
		</ul>
        <div class="k-twitter-twitts-footer">
        	<a href="https://twitter.com/<?php echo $s_twitter_user; ?>" class="k-twitter-twitts-follow" title="<?php _e( 'Follow!', 'kazaz' ); ?>"><i class="fa fa-twitter"></i>&nbsp; <?php _e( 'Follow us!', 'kazaz' ); ?></a>
        </div>
		<?php
		} // end if there are twitts

		echo $after_widget;
		
	}
 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 's_twitter_title' ] = strip_tags( $new_instance[ 's_twitter_title' ] );
		$instance[ 's_twitter_user' ]  = strip_tags( $new_instance[ 's_twitter_user' ] );
		$instance[ 's_twitts_number' ] = strip_tags( $new_instance[ 's_twitts_number' ] );
		$instance[ 's_twitts_exclude_replies' ] = $new_instance[ 's_twitts_exclude_replies' ];
 
		return $instance;
	}
 
	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array( 's_twitter_title' => '', 's_twitter_user' => '', 's_twitts_number' => '', 's_twitts_exclude_replies' => '' ) );
		$s_twitter_title = strip_tags( $instance[ 's_twitter_title' ] );
		$s_twitter_user  = strip_tags( $instance[ 's_twitter_user' ] );
		$s_twitts_number = strip_tags( $instance[ 's_twitts_number' ] );
		$s_twitts_exclude_replies = $instance[ 's_twitts_exclude_replies' ];
?>

<p>
<label for="<?php echo $this->get_field_id( 's_twitter_title' ); ?>">
<?php _e( 'Widget Title', 'kazaz' ); ?>: 
<input class="widefat" id="<?php echo $this->get_field_id( 's_twitter_title' ); ?>" name="<?php echo $this->get_field_name( 's_twitter_title' ); ?>" type="text" value="<?php echo esc_attr( $s_twitter_title ); ?>" />
</label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_twitter_user' ); ?>">
<?php _e( 'Twitter Username', 'kazaz' ); ?>: 
<input class="widefat" id="<?php echo $this->get_field_id( 's_twitter_user' ); ?>" name="<?php echo $this->get_field_name( 's_twitter_user' ); ?>" type="text" value="<?php echo esc_attr( $s_twitter_user ); ?>" />
</label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_twitts_number' ); ?>">
<?php _e( 'Number of Twitts to show (max 10!)', 'kazaz' ); ?>:
<input id="<?php echo $this->get_field_id( 's_twitts_number' ); ?>" name="<?php echo $this->get_field_name( 's_twitts_number' ); ?>" type="text" size="3" value="<?php echo esc_attr( $s_twitts_number ); ?>" />
</label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_twitts_exclude_replies' ); ?>">
<?php _e( 'Exclude replies?', 'kazaz' ); ?>
</label>
<select class="widefat" id="<?php echo $this->get_field_id( 's_twitts_exclude_replies' ); ?>" name="<?php echo $this->get_field_name( 's_twitts_exclude_replies' ); ?>">
	<?php if( $s_twitts_exclude_replies == 'yes' ) { ?>
    <option value="yes" selected="selected"> - <?php _e( 'YES', 'kazaz' ); ?> - </option>
    <option value="no"> - <?php _e( 'NO', 'kazaz' ); ?> - </option>
    <?php
    } else if( $s_twitts_exclude_replies == 'no' ) {
    ?>
    <option value="yes"> - <?php _e( 'YES', 'kazaz' ); ?> - </option>
    <option value="no" selected="selected"> - <?php _e( 'NO', 'kazaz' ); ?> - </option>
    <?php
    } else {
    ?>
    <option value="yes" selected="selected"> - <?php _e( 'YES', 'kazaz' ); ?> - </option>
    <option value="no"> - <?php _e( 'NO', 'kazaz' ); ?> - </option>
    <?php
    }
    ?>
</select>
</p>
            
<?php
	}
	
}
register_widget( 'SOFA_Twitter' );
 
// FLICKR
class SOFA_Flickr extends WP_Widget {
	function SOFA_Flickr() {
		$widget_ops = array( 'classname' => 'widget_sofa_flickr', 'description' => __('Display Flickr photos of target user or by tag(s).', 'kazaz' ) );
		//$this->WP_Widget( 'sofa_flickr', 'SOFA Flickr', $widget_ops );
		parent::__construct( 'sofa_flickr', 'SOFA Flickr', $widget_ops );
	}
 
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );
 
		echo $before_widget;
		
		$s_flickr_title  = empty( $instance[ 's_flickr_title' ] ) ? '' : apply_filters( 'widget_s_flickr_title', $instance[ 's_flickr_title' ] );
		$s_flickr_choice = empty( $instance[ 's_flickr_choice' ] ) ? '14897087@N04' : apply_filters( 'widget_s_flickr_choice', $instance[ 's_flickr_choice' ] );
		$s_flickr_noi    = empty( $instance[ 's_flickr_noi' ] ) ? 6 : apply_filters( 'widget_s_flickr_noi', $instance[ 's_flickr_noi' ] );
		$s_flickr_tou    = empty( $instance[ 's_flickr_tou' ] ) ? 'user' : apply_filters( 'widget_s_flickr_tou', $instance[ 's_flickr_tou' ] );
		
		$loop_q = '';
		if( $s_flickr_tou == 'user' && vp_option( 'vpt_option.flickr_key' ) != '' ) {
			$flickr_key_opt = esc_attr( vp_option( 'vpt_option.flickr_key' ) );
			require_once locate_template( '/inc/phpFlickr.php' );
			$f = new phpFlickr( $flickr_key_opt );
			$photos = $f->people_getPublicPhotos( $s_flickr_choice, NULL, NULL, $s_flickr_noi );
			$loop_q = $photos[ 'photos' ][ 'photo' ];
		} else if( $s_flickr_tou == 'all_tag' && vp_option( 'vpt_option.flickr_key' ) != '' ) {
			$flickr_key_opt = esc_attr( vp_option( 'vpt_option.flickr_key' ) );
			require_once locate_template( '/inc/phpFlickr.php' );
			$f = new phpFlickr( $flickr_key_opt );
			$photos = $f->photos_search( array( 'tags' => $s_flickr_choice, 'tag_mode' => 'any', 'per_page' => $s_flickr_noi, 'sort' => 'relevance' ) );
			$loop_q = $photos[ 'photo' ];
		}
		
		if( $s_flickr_title != '' ) echo $before_title . $s_flickr_title . $after_title;
		
		if( !empty( $photos ) ) :
		
			$fancybox_uid = k_rnd_key( 6 );
			echo '<ul class="list-unstyled clear-margins">';
			foreach ( $loop_q as $photo ) {
				echo '<li><a href="' . $f->buildPhotoURL( $photo, 'large' ) . '" title="' . $photo[ 'title' ] . '" class="swipebox" rel="flickrgal-' . $fancybox_uid . '"><img src="' . $f->buildPhotoURL( $photo, 'square' ) . '" alt="' . $photo[ 'title' ] . '" /></a></li>';
			}
			echo '</ul>';
		
		else :
		
			echo '<p>' . __( 'No photos matching given criteria.', 'kazaz' ) . '</p>';
		
		endif;
		
		echo $after_widget;
		
	}
 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 's_flickr_title' ]  = strip_tags( $new_instance[ 's_flickr_title' ] );
		$instance[ 's_flickr_choice' ] = strip_tags( $new_instance[ 's_flickr_choice' ] );
		$instance[ 's_flickr_noi' ]    = strip_tags( $new_instance[ 's_flickr_noi' ] );
		$instance[ 's_flickr_tou' ]    = strip_tags( $new_instance[ 's_flickr_tou' ] );
 
		return $instance;
	}
 
	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array( 's_flickr_title' => '', 's_flickr_choice' => '', 's_flickr_noi' => '', 's_flickr_tou' => '' ) );
		$s_flickr_title  = strip_tags( $instance[ 's_flickr_title' ] );
		$s_flickr_choice = strip_tags( $instance[ 's_flickr_choice' ] );
		$s_flickr_noi    = strip_tags( $instance[ 's_flickr_noi' ] );
		$s_flickr_tou    = strip_tags( $instance[ 's_flickr_tou' ] );
?>

<p>
<label for="<?php echo $this->get_field_id( 's_flickr_title' ); ?>">
<?php _e( 'Widget Title', 'kazaz' ); ?>: 
<input class="widefat" id="<?php echo $this->get_field_id( 's_flickr_title' ); ?>" name="<?php echo $this->get_field_name( 's_flickr_title' ); ?>" type="text" value="<?php echo esc_attr( $s_flickr_title ); ?>" />
</label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_flickr_tou' ); ?>">
<?php _e( 'Show photos by user or tag(s)', 'kazaz' ); ?>? 
</label>
<select class="widefat" id="<?php echo $this->get_field_id( 's_flickr_tou' ); ?>" name="<?php echo $this->get_field_name( 's_flickr_tou' ); ?>">
	<?php if( $s_flickr_tou == 'user' ) { ?>
    <option value="user" selected="selected"> - <?php _e( 'By user', 'kazaz' ); ?> - </option>
    <option value="all_tag"> - <?php _e( 'By tag(s)', 'kazaz' ); ?> - </option>
    <?php
    } else if( $s_flickr_tou == 'all_tag' ) {
    ?>
    <option value="user"> - <?php _e( 'By user', 'kazaz' ); ?> - </option>
    <option value="all_tag" selected="selected"> - <?php _e( 'By tag(s)', 'kazaz' ); ?> - </option>
    <?php
    } else {
    ?>
    <option value="user" selected="selected"> - <?php _e( 'By user', 'kazaz' ); ?> - </option>
    <option value="all_tag"> - <?php _e( 'By tag(s)', 'kazaz' ); ?> - </option>
    <?php
    }
    ?>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_flickr_choice' ); ?>">
<?php _e( 'If your choice was "By tag(s)" - enter a tag or comma separated tags. Otherwise enter Flickr user ID (something like "14897087@N04").', 'kazaz' ); ?>
<input class="widefat" id="<?php echo $this->get_field_id( 's_flickr_choice' ); ?>" name="<?php echo $this->get_field_name( 's_flickr_choice' ); ?>" type="text" value="<?php echo esc_attr( $s_flickr_choice ); ?>" />
</label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_flickr_noi' ); ?>">
<?php _e( 'Number of Flickr thumbs to show', 'kazaz' ); ?>: 
<input id="<?php echo $this->get_field_id( 's_flickr_noi' ); ?>" name="<?php echo $this->get_field_name( 's_flickr_noi' ); ?>" type="text" size="3" value="<?php echo esc_attr( $s_flickr_noi ); ?>" />
</label>
</p>
            
<?php
	}
}
register_widget( 'SOFA_Flickr' );

// RECENT POSTS 
class SOFA_RecentPosts extends WP_Widget {
	function SOFA_RecentPosts() {
		$widget_ops = array( 'classname' => 'widget_sofa_recentposts', 'description' => __( 'Display N number of recent Posts.', 'kazaz' ) );
		//$this->WP_Widget( 'sofa_recentposts', 'SOFA Recent Posts', $widget_ops );
		parent::__construct( 'sofa_recentposts', 'SOFA Recent Posts', $widget_ops );
	}
 
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$s_recentposts_title  = empty( $instance[ 's_recentposts_title' ] ) ? '' : apply_filters( 'widget_s_recentposts_title', $instance[ 's_recentposts_title' ] );
		$s_recentposts_sort   = empty( $instance[ 's_recentposts_sort' ] ) ? 'DESC' : apply_filters( 'widget_s_recentposts_sort', $instance[ 's_recentposts_sort' ] );
		$s_recentposts_number = empty( $instance[ 's_recentposts_number' ] ) ? 5 : apply_filters( 'widget_s_recentposts_number', $instance[ 's_recentposts_number' ] );
		$s_recentposts_cat    = empty( $instance[ 's_recentposts_cat' ] ) ? '' : apply_filters( 'widget_s_recentposts_cat', $instance[ 's_recentposts_cat' ] );
		$s_recentposts_style  = $instance[ 's_recentposts_style' ] ? 'true' : 'false';

		if( $s_recentposts_title != '' ) {
			echo $before_title . $s_recentposts_title . $after_title;
		};
		
		$q_args = array( 'order' => $s_recentposts_sort, 'posts_per_page' => $s_recentposts_number, 'post_status' => 'publish' );
		if( $s_recentposts_cat != '' ) $q_args[ 'cat' ] = $s_recentposts_cat;
		
		// trigger query & start loop
		$recent_posts = new WP_Query( $q_args );
		if( $recent_posts->have_posts() ) : 
		
		echo '<ul class="list-unstyled">';
		
		while( $recent_posts->have_posts() ) : $recent_posts->the_post();
			// render different layout based on widget style
			if( $s_recentposts_style == 'false' ) {
		?>
		
		<li class="recent-news-wrap news-no-summary">
            <div class="recent-news-content clearfix">
                <figure class="recent-news-thumb">
                    <a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute( 'echo=1' ); ?>">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                    </a>
                </figure>
                <div class="recent-news-text">
                    <div class="recent-news-meta">
                        <div class="recent-news-date"><?php echo get_the_date(); ?></div>
                    </div>
                    <h1 class="title-median">
                    	<a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute( 'echo=1' ); ?>"><?php the_title(); ?></a>
                    </h1>
                </div>
            </div>
        </li>
        
        <?php } else { ?>
        
		<li class="recent-news-wrap">
            <h1 class="title-median">
            	<a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute( 'echo=1' ); ?>"><?php the_title(); ?></a>
            </h1>
            <div class="recent-news-meta">
                <div class="recent-news-date"><?php echo get_the_date(); ?></div>
            </div>
            <div class="recent-news-content clearfix">
                <figure class="recent-news-thumb">
                    <a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute( 'echo=1' ); ?>">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                    </a>
                </figure>
                <div class="recent-news-text">
                    <p><?php echo wp_trim_excerpt(); ?></p>
                </div>
            </div>
        </li>
			
		<?php
			} // render different layout end
		endwhile;
		
		echo '</ul>';

		else :
		
			echo '<p>' . __( 'No recent posts found!', 'kazaz' ) . '<p>';
		
		endif;
		
		wp_reset_query(); // drop current query
		
		echo $after_widget;
		
	}
 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 's_recentposts_title' ]  = esc_attr( $new_instance[ 's_recentposts_title' ] );
		$instance[ 's_recentposts_sort' ]   = esc_attr( $new_instance[ 's_recentposts_sort' ] );
		$instance[ 's_recentposts_number' ] = esc_attr( $new_instance[ 's_recentposts_number' ] );
		$instance[ 's_recentposts_cat' ]    = esc_attr( $new_instance[ 's_recentposts_cat' ] );
		$instance[ 's_recentposts_style' ]  = $new_instance[ 's_recentposts_style' ];
 
		return $instance;
	}
 
	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array( 's_recentposts_title' => '', 's_recentposts_sort' => '', 's_recentposts_number' => '', 's_recentposts_cat' => '', 's_recentposts_style' => '' ) );
		$s_recentposts_title  = esc_attr( $instance[ 's_recentposts_title' ] );
		$s_recentposts_sort   = $instance[ 's_recentposts_sort' ];
		$s_recentposts_number = intval( $instance[ 's_recentposts_number' ] );
		$s_recentposts_cat    = $instance[ 's_recentposts_cat' ];
		$s_recentposts_style  = $instance[ 's_recentposts_style' ];
?>

<p>
<label for="<?php echo $this->get_field_id( 's_recentposts_title' ); ?>">
<?php _e( 'Widget Title', 'kazaz' ); ?>: 
<input class="widefat" id="<?php echo $this->get_field_id( 's_recentposts_title' ); ?>" name="<?php echo $this->get_field_name( 's_recentposts_title' ); ?>" type="text" value="<?php echo esc_attr( $s_recentposts_title ); ?>" />
</label>
</p>

<p>
<input class="checkbox" type="checkbox" <?php checked( $instance[ 's_recentposts_style' ], 'on' ); ?> id="<?php echo $this->get_field_id( 's_recentposts_style' ); ?>" name="<?php echo $this->get_field_name( 's_recentposts_style' ); ?>" /> 
<label for="<?php echo $this->get_field_id( 's_recentposts_style' ); ?>"><?php echo _x( 'Show post summary', 'recent posts widget checkbox label', 'kazaz' ); ?></label>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_recentposts_sort' ); ?>">
<?php _e( 'Sort posts', 'kazaz' ); ?>: 
</label>
<select class="widefat" id="<?php echo $this->get_field_id( 's_recentposts_sort' ); ?>" name="<?php echo $this->get_field_name( 's_recentposts_sort' ); ?>">
	<?php if( $s_recentposts_sort == 'ASC' ) { ?>
    <option value="ASC" selected="selected"> - <?php _e( 'Ascending order', 'kazaz' ); ?> - </option>
    <option value="DESC"> - <?php _e( 'Descending order', 'kazaz' ); ?> - </option>
    <?php
    } else if( $s_recentposts_sort == 'DESC' ) {
    ?>
    <option value="ASC"> - <?php _e( 'Ascending order', 'kazaz' ); ?> - </option>
    <option value="DESC" selected="selected"> - <?php _e( 'Descending order', 'kazaz' ); ?> - </option>
    <?php
    } else {
    ?>
    <option value="ASC"> - <?php _e( 'Ascending order', 'kazaz' ); ?> - </option>
    <option value="DESC" selected="selected"> - <?php _e( 'Descending order', 'kazaz' ); ?> - </option>
    <?php
    }
    ?>
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id( 's_recentposts_number' ); ?>">
<?php _e( 'Number of Recent Posts to show', 'kazaz' ); ?>: 
<input id="<?php echo $this->get_field_id( 's_recentposts_number' ); ?>" name="<?php echo $this->get_field_name( 's_recentposts_number' ); ?>" type="text" size="3" value="<?php echo esc_attr( $s_recentposts_number ); ?>" />
</label>
</p>

<p>

<label for="<?php echo $this->get_field_id( 's_recentposts_cat' ); ?>">
<?php _e( 'Show posts from category (comma separate category IDs if more than one, for example: 1, 7, 16)', 'kazaz' ); ?>: 
<input class="widefat" id="<?php echo $this->get_field_id( 's_recentposts_cat' ); ?>" name="<?php echo $this->get_field_name( 's_recentposts_cat' ); ?>" type="text" value="<?php echo esc_attr( $s_recentposts_cat ); ?>" />
</label>
</p>
            
<?php
	}
}
register_widget( 'SOFA_RecentPosts' );

// UPCOMING EVENTS
class SOFA_UpcomingEvents extends WP_Widget {

	function SOFA_UpcomingEvents() {
		$widget_ops = array( 'classname' => 'widget_upcoming_events', 'description' => __('Add Upcoming Events list', 'kazaz') );
		//$this->WP_Widget( 'sofa_upcoming_events', 'SOFA Upcoming Events', $widget_ops );
		parent::__construct( 'sofa_upcoming_events', 'SOFA Upcoming Events', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance[ 'title' ] ) ? '' : $instance[ 'title' ], $instance, $this->id_base );
		$items_num = apply_filters( 'widget_items_num', empty( $instance[ 'items_num' ] ) ? 3 : intval( $instance[ 'items_num' ] ), $instance );
		if( $items_num < 1 ) $items_num = 3;
		
		echo $before_widget;
		if( !empty( $title ) ) : 
			echo $before_title . $title . $after_title; 
		endif; // end if title empty
		
		// query events
		$date_time_now = time(); // to compare with
		$q_events = new WP_Query( 
			array( 
				'post_type' => 'event', 
				'order' => 'ASC', 
				'orderby' => 'meta_value_num', 
				'meta_key' => '_order', 
				'posts_per_page' => $items_num, 
				'meta_query' => array( 
					array(
						'key' => '_finito', 
						'value' => $date_time_now,
						'compare' => '>', 
						'type' => 'NUMERIC' 
					)
				)
			) 
		);

		if( $q_events->have_posts() ) : 
		?>
		
		<ul class="list-unstyled">
		
		<?php while( $q_events->have_posts() ) : $q_events->the_post(); ?>
			
            <li class="up-event-wrap">
                <h1 class="title-median">
                	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
                	<?php the_title(); ?>
                	</a>
                </h1>
            	<?php
            	$event_start_date = vp_metabox( 'event.event_from' );
            	$event_end_date = vp_metabox( 'event.event_to' );
            	$event_start_time = vp_metabox( 'event.event_time_start' );
            	$event_end_time = vp_metabox( 'event.event_time_end' );
            	?>
                <div class="up-event-meta clearfix">
                <?php if( $event_start_date ) : ?><div class="up-event-date"><?php echo date_i18n( get_option( 'date_format'), strtotime( $event_start_date ) ); ?></div><?php endif; ?>
                <?php if( $event_end_date ) : ?><div class="up-event-date"><?php echo date_i18n( get_option( 'date_format'), strtotime( $event_end_date ) ); ?></div><?php endif; ?>
                <?php if( $event_start_time ) : ?><div class="up-event-time"><?php echo $event_start_time; ?><?php if( $event_end_time ) { echo ' - ' . $event_end_time; } ?></div><?php endif; ?>
                </div>
                
                <?php echo k_get_google_uri(); // google calendar add ?>
                
                <p><?php echo wp_trim_excerpt(); ?></p>
            </li>
			
        <?php endwhile; ?>
        
        </ul>
        
        <?php
		else :
		
			echo '<p>' . __( 'No Upcoming Events found!', 'kazaz' ) . '<p>';
		
		endif;
		
		wp_reset_query(); // drop current query

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'items_num' ] = intval( $new_instance[ 'items_num' ] );
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'items_num' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$items_num = intval( $instance[ 'items_num' ] );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php _e( 'Number of events to show', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" type="text" value="<?php echo intval( $items_num ); ?>" />
		</p>
<?php
	}
}
register_widget( 'SOFA_UpcomingEvents' );


// All EVENTS
class SOFA_AllEvents extends WP_Widget {

	function SOFA_AllEvents() {
		$widget_ops = array( 'classname' => 'widget_all_events', 'description' => __('Add all Events list', 'kazaz') );
		//$this->WP_Widget( 'sofa_all_events', 'SOFA All Events', $widget_ops );
		parent::__construct( 'sofa_all_events', 'SOFA All Events', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		//$title = apply_filters( 'widget_title', empty( $instance[ 'title' ] ) ? '' : $instance[ 'title' ], $instance, $this->id_base );
		$title = empty( $instance[ 'title' ] ) ? '' : apply_filters( 'widget_title', $instance[ 'title' ] );
		//$items_num = apply_filters( 'widget_items_num', empty( $instance[ 'items_num' ] ) ? 3 : intval( $instance[ 'items_num' ] ), $instance );
		$items_num = $items_num = empty( $instance[ 'items_num' ] ) ? 3 : apply_filters( 'widget_items_num', $instance[ 'items_num' ] );
		$sort_events = empty( $instance[ 'sort_events' ] ) ? 'ASC' : apply_filters( 'widget_sort_events', $instance[ 'sort_events' ] );
		if( $items_num < 1 ) $items_num = 3;
		
		echo $before_widget;
		if( !empty( $title ) ) : 
			echo $before_title . $title . $after_title; 
		endif; // end if title empty
		
		// query events
		$date_time_now = time(); // to compare with
		$q_events = new WP_Query( 
			array( 
				'post_type' => 'event', 
				'order' => $sort_events, 
				'orderby' => 'meta_value_num', 
				'meta_key' => '_order', 
				'posts_per_page' => $items_num
			) 
		);

		if( $q_events->have_posts() ) : 
		?>
		
		<ul class="list-unstyled">
		
		<?php while( $q_events->have_posts() ) : $q_events->the_post(); ?>
			
            <li class="up-event-wrap">
                <h1 class="title-median">
                	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>">
                	<?php the_title(); ?>
                	</a>
                </h1>
            	<?php
            	$event_start_date = vp_metabox( 'event.event_from' );
            	$event_end_date = vp_metabox( 'event.event_to' );
            	$event_start_time = vp_metabox( 'event.event_time_start' );
            	$event_end_time = vp_metabox( 'event.event_time_end' );
            	?>
                <div class="up-event-meta clearfix">
                <?php if( $event_start_date ) : ?><div class="up-event-date"><?php echo date_i18n( get_option( 'date_format'), strtotime( $event_start_date ) ); ?></div><?php endif; ?>
                <?php if( $event_end_date ) : ?><div class="up-event-date"><?php echo date_i18n( get_option( 'date_format'), strtotime( $event_end_date ) ); ?></div><?php endif; ?>
                <?php if( $event_start_time ) : ?><div class="up-event-time"><?php echo $event_start_time; ?><?php if( $event_end_time ) { echo ' - ' . $event_end_time; } ?></div><?php endif; ?>
                </div>
                <p><?php echo wp_trim_excerpt(); ?></p>
            </li>
			
        <?php endwhile; ?>
        
        </ul>
        
        <?php
		else :
		
			echo '<p>' . __( 'No Events found!', 'kazaz' ) . '<p>';
		
		endif;
		
		wp_reset_query(); // drop current query

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'items_num' ] = intval( $new_instance[ 'items_num' ] );
		$instance[ 'sort_events' ] = $new_instance[ 'sort_events' ];
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'items_num' => '', 'sort_events' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$items_num = intval( $instance[ 'items_num' ] );
		$sort_events = $instance[ 'sort_events' ];
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php _e( 'Number of events to show', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" type="text" value="<?php echo intval( $items_num ); ?>" />
		</p>
        <p>
        <label for="<?php echo $this->get_field_id( 's_recentposts_sort' ); ?>">
        <?php _e( 'Sort posts', 'kazaz' ); ?>: 
        </label>
        <select class="widefat" id="<?php echo $this->get_field_id( 'sort_events' ); ?>" name="<?php echo $this->get_field_name( 'sort_events' ); ?>">
            <?php if( $sort_events == 'ASC' ) { ?>
            <option value="ASC" selected="selected"> - <?php _e( 'Ascending order', 'kazaz' ); ?> - </option>
            <option value="DESC"> - <?php _e( 'Descending order', 'kazaz' ); ?> - </option>
            <?php
            } else if( $sort_events == 'DESC' ) {
            ?>
            <option value="ASC"> - <?php _e( 'Ascending order', 'kazaz' ); ?> - </option>
            <option value="DESC" selected="selected"> - <?php _e( 'Descending order', 'kazaz' ); ?> - </option>
            <?php
            } else {
            ?>
            <option value="ASC"> - <?php _e( 'Ascending order', 'kazaz' ); ?> - </option>
            <option value="DESC" selected="selected"> - <?php _e( 'Descending order', 'kazaz' ); ?> - </option>
            <?php
            }
            ?>
        </select>
        </p>
<?php
	}
}
register_widget( 'SOFA_AllEvents' );


// QUICK CONTACT
class SOFA_QuickContact extends WP_Widget {
	function SOFA_QuickContact() {
		$widget_ops = array( 'classname' => 'widget_sofa_quickcontact', 'description' => __('This Widget is used to display information provided in Theme Options > Contact >> Contact Details.', 'kazaz' ) );
		//$this->WP_Widget( 'sofa_quickcontact', 'SOFA Quick Contact', $widget_ops );
		parent::__construct( 'sofa_quickcontact', 'SOFA Quick Contact', $widget_ops );
	}
 
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$s_quickcontact_title = empty( $instance[ 's_quickcontact_title' ] ) ? '' : apply_filters( 'widget_s_quickcontact_title', $instance[ 's_quickcontact_title' ] );
		
		// get values
		$contact_name = ( vp_option( 'vpt_option.contact_name' ) != '' ) ? vp_option( 'vpt_option.contact_name' ) : 0;
		$contact_address = ( vp_option( 'vpt_option.contact_address' ) != '' ) ? vp_option( 'vpt_option.contact_address' ) : 0;
		$contact_city = ( vp_option( 'vpt_option.contact_city' ) != '' ) ? vp_option( 'vpt_option.contact_city' ) : 0;
		$contact_state = ( vp_option( 'vpt_option.contact_state' ) != '' ) ? vp_option( 'vpt_option.contact_state' ) : 0;
		$contact_zip = ( vp_option( 'vpt_option.contact_zip' ) != '' ) ? vp_option( 'vpt_option.contact_zip' ) : 0;
		$contact_country = ( vp_option( 'vpt_option.contact_country' ) != '' ) ? vp_option( 'vpt_option.contact_country' ) : 0;
		$contact_phone_1 = ( vp_option( 'vpt_option.contact_phone_1' ) != '' ) ? vp_option( 'vpt_option.contact_phone_1' ) : 0;
		$contact_phone_2 = ( vp_option( 'vpt_option.contact_phone_2' ) != '' ) ? vp_option( 'vpt_option.contact_phone_2' ) : 0;
		$contact_email = ( vp_option( 'vpt_option.contact_email' ) != '' ) ? vp_option( 'vpt_option.contact_email' ) : 0;
		
		if( $s_quickcontact_title != '' ) echo $before_title . $s_quickcontact_title . $after_title;
		?>

        <div itemscope itemtype="http://data-vocabulary.org/Organization"> 
        
        	<h2 class="title-median m-contact-subject" itemprop="name"><?php echo $contact_name; ?></h2>
        
        	<div class="m-contact-address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
        		<span class="m-contact-street" itemprop="street-address"><?php echo $contact_address; ?></span>
        		<span class="m-contact-city-region">
        			<span class="m-contact-city" itemprop="locality"><?php echo $contact_city; ?></span>
        			<?php if( !empty( $contact_state ) ) : ?><span class="m-contact-region" itemprop="region">, <?php echo $contact_state; ?></span><?php endif; ?>
        		</span>
        		<span class="m-contact-zip-country">
        			<span class="m-contact-zip" itemprop="postal-code"><?php echo $contact_zip; ?></span>
        			<span class="m-contact-country" itemprop="country-name"><?php echo $contact_country; ?></span>
        		</span>
        	</div>
            <?php if( !empty( $contact_phone_1 ) || !empty( $contact_phone_2 ) ) : ?>
        	<div class="m-contact-tel-fax">
            	<?php if( !empty( $contact_phone_1 ) ) { ?><span class="m-contact-tel"><?php echo _x( 'Tel:', 'contact telephone short', 'kazaz' ); ?> <span itemprop="tel"><?php echo $contact_phone_1; ?></span></span><?php } ?>
            	<?php if( !empty( $contact_phone_2 ) ) { ?><span class="m-contact-fax"><?php echo _x( 'Fax:', 'contact fax short', 'kazaz' ); ?> <span itemprop="fax"><?php echo $contact_phone_2; ?></span></span><?php } ?>
            </div>
            <?php endif; ?>
            
            <?php
            $arr_valid_socials = k_social_media_links(); // get all social links
            if( !empty( $arr_valid_socials ) ) : 
            ?>
            
            <div class="social-icons">
            
            	<ul class="list-unstyled list-inline">
            	
            		<li>
            			<a href="mailto:<?php echo $contact_email; ?>" title="<?php _e( 'Contact us via email', 'kazaz' ); ?>">
            				<i class="fa fa fa-envelope"></i>
            			</a>
            		</li>
            		
            		<li>
            			<a href="<?php bloginfo( 'atom_url' ); ?>" title="RSS">
            				<i class="fa fa fa-rss"></i>
            			</a>
            		</li>
            	
            		<?php foreach( $arr_valid_socials as $arr_social ) { ?>
                
                	<li>
                		<a href="<?php echo $arr_social[ 'url' ]; ?>" target="_blank" title="<?php echo $arr_social[ 'media_name' ]; ?>">
                			<i class="fa fa-<?php echo strtolower( $arr_social[ 'media_name' ] ); ?>"></i>
                		</a>
                	</li>
                    
                    <?php } // end foreach ?>
                
                </ul>
            
            </div>
            <?php endif; // social media links ?>
            
        </div>
		<?php
		echo $after_widget;
		
	}
 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 's_quickcontact_title' ]  = $new_instance[ 's_quickcontact_title' ];
		return $instance;
	}
 
	function form( $instance ) {
		$instance = wp_parse_args( ( array ) $instance, array( 's_quickcontact_title' => '' ) );
		$s_quickcontact_title  = esc_attr( $instance[ 's_quickcontact_title' ] );
		
?>

<p>
<label for="<?php echo $this->get_field_id( 's_quickcontact_title' ); ?>">
<?php _e( 'Widget Title', 'kazaz' ); ?>: 
<input class="widefat" id="<?php echo $this->get_field_id( 's_quickcontact_title' ); ?>" name="<?php echo $this->get_field_name( 's_quickcontact_title' ); ?>" type="text" value="<?php echo esc_attr( $s_quickcontact_title ); ?>" />
</label>
</p>
            
<?php
	}
}
register_widget( 'SOFA_QuickContact' );

// Course search
class SOFA_Course_Search extends WP_Widget {

	function SOFA_Course_Search() {
		$widget_ops = array( 'classname' => 'widget_course_search', 'description' => __('Add Course search form to a sidebar.', 'kazaz') );
		//$this->WP_Widget( 'sofa_course_search', 'SOFA Course Search Form', $widget_ops );
		parent::__construct( 'sofa_course_search', 'SOFA Course Search Form', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance[ 'title' ] ) ? '' : $instance[ 'title' ], $instance, $this->id_base );
		$text = apply_filters( 'widget_text', empty( $instance[ 'text' ] ) ? '' : $instance[ 'text' ], $instance );
		echo $before_widget;
		if( !empty( $title ) ) : 
		?>
		<h2 class="title-titan"><?php echo $title; ?></h2>
		<?php endif; ?>
		
        <form role="search" method="get" id="course-finder" action="<?php echo site_url('/'); ?>">
            <div class="input-group">
                <input type="text" placeholder="<?php echo _x( 'Find a course...', 'course search form placeholder', 'kazaz' ); ?>" autocomplete="off" class="form-control" id="find-course" name="s" />
                <input type="hidden" name="post_type" value="course" /> 
                <span class="input-group-btn"><button type="submit" class="btn btn-default"><?php echo _x( 'GO!', 'course search form button label', 'kazaz' ); ?></button></span>
            </div>
            <?php if( !empty( $text ) ) : ?><span class="help-block"><?php echo $text; ?></span><?php endif; ?>
        </form>
                                
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		if( current_user_can( 'unfiltered_html' ) ) $instance[ 'text' ] =  $new_instance[ 'text' ];
		else $instance[ 'text' ] = stripslashes( wp_filter_post_kses( addslashes( $new_instance[ 'text' ] ) ) );
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$text = esc_attr( $instance[ 'text' ] );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Search Info', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>
<?php
	}
}
register_widget( 'SOFA_Course_Search' );

// Featured gallery
class SOFA_FeaturedGallery extends WP_Widget {

	function SOFA_FeaturedGallery() {
		$widget_ops = array( 'classname' => 'widget_featured_gallery', 'description' => __('Add Featured Gallery', 'kazaz') );
		//$this->WP_Widget( 'sofa_featured_gallery', 'SOFA Featured Gallery', $widget_ops );
		parent::__construct( 'sofa_featured_gallery', 'SOFA Featured Gallery', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance[ 'title' ] ) ? '' : $instance[ 'title' ], $instance, $this->id_base );
		$gallery = apply_filters( 'widget_gallery', empty( $instance[ 'gallery' ] ) ? -1 : $instance[ 'gallery' ], $instance );
		echo $before_widget;
		if( !empty( $title ) ) : 
			echo $before_title . $title . $after_title; 
		endif; // end if title not empty
		
		// make the query and loop
		$argz = array( 'p' => intval( $gallery ), 'post_type' => 'gallery' );
		$g_post = new WP_Query( $argz );
		if( !$g_post->have_posts() ) return '<div class="alert alert-danger">' . __( 'No entries found!', 'kazaz' ) . '</div>';
		else {
			while( $g_post->have_posts() ) : $g_post->the_post();
			// how many photos in this gallery?
			$photos_num = 0;
			$this_post_images = get_children( array(
				'post_parent' => $gallery,
				'post_type' => 'attachment',
				'post_mime_type' => 'image'
			) );
			if( !empty( $this_post_images ) ) {
				$photos_num = count( $this_post_images );
				if( $photos_num < 10 ) $photos_num = '0' . $photos_num;
		?>
		
				<div class="gallery-wrapper">
					<figure class="gallery-last-photo clearfix">
						<a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute( 'echo=1' ); ?>">
						<?php the_post_thumbnail(); ?>
						</a>
					</figure>
					<div class="gallery-info">
						<span class="gallery-photos-num"><?php echo $photos_num; ?></span>
						<span class="gallery-photos-tag"><?php echo _x( 'Photos', 'galleries category page, NN photos', 'kazaz' ); ?></span>
					</div>
					<div class="gallery-meta">
						<h1 class="gallery-title">
							<a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute( 'echo=1' ); ?>">
							<?php the_title(); ?>
							</a>
						</h1>
					</div>
				</div>
                                
		<?php
			} // end if gallery has images
			endwhile; // end loop
		} // end else - if gallery record exists
		
		wp_reset_query(); // reset query
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'gallery' ] =  intval( $new_instance[ 'gallery' ] );
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'gallery' => '' ) );
		$title = esc_attr( $instance[ 'title' ] );
		$gallery = esc_attr( $instance[ 'gallery' ] );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'gallery' ); ?>"><?php _e( 'Gallery ID', 'kazaz' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'gallery' ); ?>" name="<?php echo $this->get_field_name( 'gallery' ); ?>" type="text" value="<?php echo esc_attr( $gallery ); ?>" />
			<span>
			<?php _e( '<strong>How to obtain Gallery ID?</strong><br />Go to Galleries > All Galleries and copy from "Gallery ID" column.', 'kazaz' ); ?>
			</span>
		</p>
<?php
	}
}
register_widget( 'SOFA_FeaturedGallery' );