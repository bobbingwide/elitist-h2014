<?php
/*Latest Work Widget***********/

class latest_work extends WP_Widget {
	
	function latest_work() {
		$widget_ops = array('classname' => 'widget_work', 'description' => 'Display your latest work from the Portfolio in your Home Page' );
		$this->WP_Widget('latest_work', 'Latest Work (Home Page) - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
	
		extract($args, EXTR_SKIP);			
		
		// start widget output
		echo $before_widget . "\n";
		?>							
		<div class="latest_work">
			
			<?php echo $before_title .'<span>'. $instance['title'] .'</span>'. $after_title . "\n";?>
			
			<?php 
			$text = isset($instance['t_text'])?$instance['t_text']:'';
			?>
			<p><?php echo $text ;?></p>
		


		
		<div class="row">
			<?php
			$count = 0;
			$t_number = isset($instance['t_number'])?$instance['t_number']:'4';
			query_posts(array('post_type' => array( 'portfolio', 'portfolio2'), 'posts_per_page' => $t_number)); 
			if (have_posts()) : while (have_posts()) : the_post();
				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				//Get the meta for the Video option.
				$video_link = get_post_meta(get_the_ID(), 'mb_video_link', true);
				$video_width = get_post_meta(get_the_ID(), 'mb_video_width', true);
				$video_height = get_post_meta(get_the_ID(), 'mb_video_height', true);
				?>
				
					<div class="work_post span4">
						<a href="<?php the_permalink(); ?>" class="work_img">
						<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;w=500&amp;h=280&amp;zc=1" alt="<?php the_title(); ?>" />
						
						<div class="fold_corner2">
                            <h4><?php the_title(); ?></h4>
                            <p><?php echo excerpt(15); ?></p>
        				  	<i class="icon-arrow-right"></i>
                        </div>
                        </a>
					</div>	
				<?php
				$count++;
			endwhile; ?>
		<div class="clearfix"></div>
		</div><!-- /row -->	




		</div><!-- /latest_work -->
		<?php 
		echo $after_widget . "\n";
		
		
		else : ?>
		
		<h3>No Items</h3>
		
		<?php endif; 
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_query();
	
	}// func widget
		
		
		
		
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['t_text'] = $new_instance['t_text'];
			$instance['t_number'] = $new_instance['t_number'];
			return $instance;
		}
		
		
		function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 't_text' => '', 't_number' => '4') );
			$title = strip_tags($instance['title']);
			$t_text = $instance['t_text'];
			$t_number = $instance['t_number'];
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'quemalabs_admin');?> <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
			
			<p>
			<label for="<?php echo $this->get_field_id( 't_text' ); ?>"><?php _e('Text:', 'quemalabs_admin');?></label>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 't_text' ); ?>" name="<?php echo $this->get_field_name( 't_text' ); ?>"><?php echo $t_text; ?></textarea>
			</p>

			<p><label for="<?php echo $this->get_field_id('t_number'); ?>"><?php _e('Number of items:', 'quemalabs_admin');?> <input id="<?php echo $this->get_field_id('t_number'); ?>" name="<?php echo $this->get_field_name('t_number'); ?>" type="text" value="<?php echo esc_attr($t_number); ?>" /></label></p>
			
			<?php
		}
}

register_widget('latest_work');
?>