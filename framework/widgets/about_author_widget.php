<?php
/*Social Share Widget***********/

class widget_about_author extends WP_Widget {
	
	function widget_about_author() {
		$widget_ops = array('classname' => 'widget_about_author', 'description' => 'Display Author Meta Information' );
		$this->WP_Widget('widget_about_author', 'About The Author - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo "<div class='widget_about_author '>";
			
			
			
			$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
			
			if ( !empty( $title ) ) { echo "<h4>" . $title . "</h4>"; }; ?>
            
                <div class="author_box box_b">
                            
                                <div class="author_img">
                                	<?php if (function_exists('get_avatar')) { echo get_avatar(get_the_author_meta('email'), '70' ); }?>  
                                
                                </div>
                                
                                <div class="author_info">
                                    <h5><?php the_author_posts_link(); ?></h5>
                                    <p><?php the_author_meta('description'); ?></p>
                                </div>
                                <div class="clear"></div>
                                
                </div><!-- /author_box -->
                
                <div class="clear"></div>
            
            </div><!-- /widget_about_author -->
			<?php 
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		
		function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
			$title = strip_tags($instance['title']);
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
			
			<?php
		}
}

register_widget('widget_about_author');
?>