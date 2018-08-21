<?php
/*Social Share Widget***********/

class rss_tw_btn extends WP_Widget {
	
	function rss_tw_btn() {
		$widget_ops = array('classname' => 'rss_tw_btn', 'description' => 'Add a social share widget' );
		$this->WP_Widget('rss_tw_btn', 'Suscribe & Twitter Btns - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo $before_widget;
			
			
			
			$suscribe = empty($instance['suscribe']) ? '#' : apply_filters('widget_suscribe', $instance['suscribe']);
			$twitter = empty($instance['twitter']) ? '#' : apply_filters('widget_twitter', $instance['twitter']);
			
			//if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
			
			?>
            
			<a href="<?php echo $suscribe; ?>" class="suscribe_btn ir">Suscribe</a>
            <a href="<?php echo $twitter; ?>" class="twitter_btn ir">Follow Us</a>
            <div class="clearfix"></div>
			<?php 
			echo $after_widget;
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['suscribe'] = strip_tags($new_instance['suscribe']);
			$instance['twitter'] = strip_tags($new_instance['twitter']);
			return $instance;
		}
		
		
		function form($instance) {
			$rss_default = get_bloginfo('rss2_url');
			$instance = wp_parse_args( (array) $instance, array( 'suscribe' => $rss_default, 'twitter' => '') );
			$suscribe = strip_tags($instance['suscribe']);
			$twitter = strip_tags($instance['twitter']);
			?>
			<p><label for="<?php echo $this->get_field_id('suscribe'); ?>">Suscribe Link: <input id="<?php echo $this->get_field_id('suscribe'); ?>" name="<?php echo $this->get_field_name('suscribe'); ?>" type="text" value="<?php echo esc_attr($suscribe); ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter Link: <input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></label></p>
			
			<?php
		}
}

register_widget('rss_tw_btn');
?>