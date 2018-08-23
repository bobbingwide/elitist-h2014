<?php
/*Social Share Widget***********/

class social_share_widget extends WP_Widget {
	
	function social_share_widget() {
		$widget_ops = array('classname' => 'social_share_widget', 'description' => 'Add a social share widget' );
		$this->WP_Widget('social_share_widget', 'Social Share - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo "<div class='share-widget'>";
			
			
			
			$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
			
			if ( !empty( $title ) ) { echo "<h5>" . $title . "</h5>"; }; ?>
            
			<ul>
                <li>
                    <a title="Facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/facebook_32.png" border="0" alt="Facebook" />
                    </a>
                </li>
                <li>
                    <a title="Twitter" href="http://twitter.com/home?status=<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/twitter_32.png" border="0" alt="Twitter" />
                    </a>
                </li>
                <li>
                    <a title="Digg" href="http://digg.com/submit?url=<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/digg_32.png" border="0" alt="Digg" />
                    </a>
                </li>
                
                <li>
                    <a title="Delicious" href="http://delicious.com/post?url=<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/delicious_32.png" border="0" alt="Delicious" />
                    </a>
                </li>
                <li>
                    <a title="Stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/stumbleupon_32.png" border="0" alt="Stumbleupon" />
                    </a>
                </li>
                <li>
                    <a title="Tumblr" href="http://www.tumblr.com/share?u=<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/tumblr_32.png" border="0" alt="Tumblr" />
                    </a>
                </li>
                <li>
                    <a title="Email" href="mailto:?body=<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/social_icons/email_32.png" border="0" alt="Email" />
                    </a>
                </li>
			</ul>
            <div class="clear"></div>
            
            </div>
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

register_widget('social_share_widget');
?>