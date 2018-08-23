<?php
global $defaults;
add_action("widgets_init", create_function('', 'return register_widget("Popular_Posts");'));

// default values
$defaults = array(
				'title' => 'Popular Posts',
				'number_posts' => 3
				
				);


class Popular_Posts extends WP_Widget {
	function Popular_Posts() {
		$widget_ops = array('description' => __( "Displays links to the posts with the most comments.", 'quemalabs_admin') );
		$this->WP_Widget('popular_posts', __('Popular Posts - eneaa', 'quemalabs_admin'), $widget_ops);
	}

	function form($instance) {
		global $defaults;

		// check if options are saved, otherwise use defaults
		if (mpm_isEmpty($instance))
			$instance = $defaults;
			
	$title = esc_attr($instance['title']);
	$number_posts = esc_attr($instance['number_posts']);
	
//create widget configuration panel
?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        
        <p><label for="<?php echo $this->get_field_id('number_posts'); ?>">Number of posts to show: <input id="<?php echo $this->get_field_id('number_posts'); ?>" name="<?php echo $this->get_field_name('number_posts'); ?>" type="text" value="<?php echo esc_attr($number_posts); ?>" size="3" /></label></p>
  

<?php
	}


	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number_posts'] = strip_tags($new_instance['number_posts']);

        return $instance;
	}

	function widget($args, $instance) {
		
		extract($args, EXTR_SKIP);
			
			$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
			$number_posts = empty($instance['number_posts']) ? 4 : apply_filters('widget_number_posts', $instance['number_posts']);
		
		if (mpm_isEmpty($instance))
			$instance = $defaults;



// start widget output
echo $before_widget . "\n";
echo $before_title . $instance['title'] . $after_title . "\n";

	echo "<ul>";
	$query = array('showposts' => $number_posts, 'nopaging' => 0, 'orderby'=> 'comment_count', 'post_status' => 'publish');
		$r = new WP_Query($query);
		if ($r->have_posts()) :
		


	while ($r->have_posts()) : $r->the_post();
	

	echo "\t" . '<li>';
	
	
	
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
						if($thumbnail){
						?>
						<div class="recent-post-img">
							<a href="<?php the_permalink(); ?>">
                            <span></span>
                           <?php  the_post_thumbnail(array(50,50),array('title'=>get_the_title(),'alt'=>get_the_title()));?>
                            </a>
                        </div>
                            <?php
						}
						?>
                        
                        <h6><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h6>
                        <time datetime="<?php the_time('Y-m-d') ?>"><?php echo get_the_date(); ?></time>
                        <div class="clear"></div>
                        </li>
                        <?php	
	endwhile;
	
	// Reset the global $the_post as this query will have stomped on it
		wp_reset_query();

		endif;
?>
</ul>
<?php
echo $after_widget . "\n";
	}
}

function mpm_isEmpty($array) {
	$i = 0;
	foreach ($array as $elements) {
		if (strlen($elements) == 0)
			$i++;
	}	
	if ($i == count($array))
		return true;
	else
		return false;
}
?>