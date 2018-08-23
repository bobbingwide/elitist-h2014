<?php
/*Social ***********/

class quick_contact extends WP_Widget {
	
	function quick_contact() {
		$widget_ops = array('classname' => 'quick_contact', 'description' => 'Quick contact form' );
		$this->WP_Widget('quick_contact', 'Quick Contact - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo $before_widget;
						
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			$email = empty($instance['email']) ? '' : apply_filters('widget_email', $instance['email']);

			
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }; ?>
            
            
            
            
            
            <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/contact-form.js"></script>
            

            
            <div class="form">
            	<form action="<?php echo get_template_directory_uri(); ?>/framework/mail.php" id="quick_contact" method="post">
                	<input type="text" name="name" id="quick_name" /><span><?php _e("Name", "eneaa"); ?></span><img src="<?php echo get_template_directory_uri(); ?>/images/error_form.png" alt="error" class="name-error"/>
                    <input type="text" name="email" id="quick_email" /><span class="email-span"><?php _e("Email", "eneaa"); ?></span><img src="<?php echo get_template_directory_uri(); ?>/images/error_form.png" alt="error" class="email-error"/>
                    <textarea name="comments" id="quick_comments"></textarea>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/error_form.png" alt="error" class="comments-error"/>
                    <input type="hidden" name="remail" id="quick_remail" value="<?php echo $email; ?>" />
    
                    <button type="submit" class="send btn btn-mini"><?php _e("Send", "eneaa"); ?> <i class="icon-envelope"></i></button>
                    

            	</form>
                <div class="mesage">
                </div>
           
			</div><!-- /form-->
            <div class="clear"></div>
            
            
            
			<?php 
			echo $after_widget;
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['email'] = strip_tags($new_instance['email']);
			return $instance;
		}
		
		
		function form($instance) {
			
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'email' => '') );

			$title = strip_tags($instance['title']);
			$email = strip_tags($instance['email']);
			
			
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
            <p>
                <label for="<?php echo $this->get_field_id('email'); ?>" >
                	Your Email: <input id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
                </label>
            </p>
			<?php
		}
}

register_widget('quick_contact');
?>