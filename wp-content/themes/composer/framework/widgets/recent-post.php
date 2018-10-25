<?php 

/*
 * Testimonial Widget
*/
class Composer_Recent_Post_Widget extends WP_Widget {

	function __construct() {
		$widget_options = array('classname' => 'recentpost', 'description' => esc_html__('Display Recent Posts','composer' ));
		parent::__construct('composer_recent_post',esc_html__('Composer:: Recent Post','composer' ),$widget_options);
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'composer' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$show_image = isset( $instance['show_image'] ) ?  $instance['show_image'] : false;
		if ( ! $number )
 			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

		//Empty assignment
		$image = '';

		if ( $r->have_posts() ) :

			echo $before_widget;
				if ( $title ) echo $before_title . esc_html($title) . $after_title;
				echo '<ul>';
					while ( $r->have_posts() ) : $r->the_post();
			
						$format = get_post_format();

			       		if ( $format != 'gallery') { 
			       			$image = composer_featured_thumbnail( 70, 70, 0, 0, 1 );
			       		}       		

						else {
				       		//Get gallery meta values
				    		$gallery = json_decode( composer_get_meta_value( get_the_ID(), '_amz_gallery', '' ) );

				    		$image = composer_get_image_by_id( 70, 70, $gallery[0]->itemId, 0, 0, 1 );
						}
						
						echo '<li>';
							if ( $show_image ) {
								if(!empty($image)){
									echo '<div class="postImg">';
										echo $image; // already escaped, no need escape again
									echo '</div>';
								}
							}
								
							echo '<div class="content ">';
								echo '<p><a href="'. esc_url( get_permalink() ) .'">'. esc_html( get_the_title() ) .'</a></p>';
									if ( $show_date ) {
										echo '<span class="meta">'. esc_html( get_the_time( get_option('date_format', 'd M Y') ) ).'</span>';
									}
							echo '</div>';

						echo '</li>';
        
					endwhile;
				echo '</ul>';
			echo $after_widget;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_image'] = isset( $new_instance['show_image'] ) ? (bool) $new_instance['show_image'] : false;

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'composer' );
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$show_image = isset( $instance['show_image'] ) ? (bool) $instance['show_image'] : true;
?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'composer' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?> type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'composer' ); ?></label>
		<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'composer' ); ?></label></p>
        
        <p><input class="checkbox" type="checkbox" <?php checked( $show_image ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_image' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_image' ) ); ?>"><?php esc_html_e( 'Display post image?', 'composer' ); ?></label></p>


<?php
	}
}

function composer_recent_post_widget_init(){
	register_widget('Composer_Recent_Post_Widget');	
}
add_action('widgets_init','composer_recent_post_widget_init');