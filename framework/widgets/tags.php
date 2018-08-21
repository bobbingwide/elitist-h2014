<?php
/*Tags Widget***********/

class widget_tag extends WP_Widget {
	
	function widget_tag() {
		$widget_ops = array('classname' => 'widget_tag', 'description' => 'Displays your tags with style' );
		$this->WP_Widget('widget_tag', 'Fancy Tags - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		
			echo $before_widget;
			
			echo $before_title . $title . $after_title;
			
			wp_tag_cloud('format=list&smallest=12px&largest=12px');
			?>
			<div class="clearfix"></div>
            <?php
			
			echo $after_widget;

			
	}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		
		function form($instance) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
			
			<?php
		}
}

register_widget('widget_tag');
?>