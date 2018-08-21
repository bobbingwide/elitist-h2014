<?php
/*Social ***********/

class contact_info extends WP_Widget {
	
	function contact_info() {
		$widget_ops = array('classname' => 'contact_info', 'description' => 'Add a your contact info' );
		$this->WP_Widget('contact_info', 'Contact Info - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo $before_widget;
						
			$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
			$phone = empty($instance['phone']) ? '' : apply_filters('widget_phone', $instance['phone']);
			$address = empty($instance['address']) ? '' : apply_filters('widget_address', $instance['address']);
			$email = empty($instance['email']) ? '' : apply_filters('widget_email', $instance['email']);

			
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }; ?>
            
            <ul class="contact_info">
            
			
            <?php if ( !empty( $phone ) ) { ?>
            		<li class="phone"><i class="icon-phone"></i><?php echo $phone; ?></li>
            <?php } ?>
            <?php if ( !empty( $address ) ) { ?>
            		<li class="address"><i class="icon-map-marker"></i><?php echo $address; ?></li>
            <?php } ?>
            <?php if ( !empty( $email ) ) { ?>
            		<li class="email"><i class="icon-envelope"></i><?php echo $email; ?></li>
            <?php } ?>
           
			</ul>
            <div class="clearfix"></div>
            
            
            
			<?php 
			echo $after_widget;
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['phone'] = strip_tags($new_instance['phone']);
			$instance['address'] = strip_tags($new_instance['address']);
			$instance['email'] = strip_tags($new_instance['email']);
			return $instance;
		}
		
		
		function form($instance) {
			
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'phone' => '', 'address' => '', 'email' => '') );

			$title = strip_tags($instance['title']);
			$phone = strip_tags($instance['phone']);
			$address = strip_tags($instance['address']);
			$email = strip_tags($instance['email']);
			
			
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
            <p>
                <label for="<?php echo $this->get_field_id('phone'); ?>" >
                	Phone: <input id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('address'); ?>" >
                	Address: <input id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
                </label>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('email'); ?>" >
                	Email: <input id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
                </label>
            </p>
            <p>If any field is empty will be ignored</p>
            
			<?php
		}
}

register_widget('contact_info');
?>