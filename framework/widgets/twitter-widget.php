<?php
/*Twitter Widget***********/

class twitter_widget extends WP_Widget {
	
	function twitter_widget() {
		$widget_ops = array('classname' => 'twitter_widget', 'description' => 'Show you lastest tweets' );
		$this->WP_Widget('twitter_widget', 'Twitter - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract($args, EXTR_SKIP);
			
			echo $before_widget;
			
			
			
			$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
			$user = empty($instance['user']) ? '&nbsp;' : apply_filters('widget_user', $instance['user']);
			$number_tweets = empty($instance['number_tweets']) ? '&nbsp;' : apply_filters('widget_number_tweets', $instance['number_tweets']);
			
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
			
			
			
			
			
			function wp_echoTwitter($username, $numb=1){
				 include_once(ABSPATH.WPINC.'/feed.php');
			
					
					
// Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed("http://search.twitter.com/search.atom?q=from:" . $username . "&rpp=" . $numb);
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity(5); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items(0, $maxitems); 
endif;
?>

<ul class="twitter">
    <?php if ($maxitems == 0) echo '<li>No items.</li>';
    else
    // Loop through each feed item and display each item as a hyperlink.
    foreach ( $rss_items as $item ) : ?>
    <li>
    	<i class="foundicon-twitter"></i>
    	<!--
        <a href='<?php echo $item->get_permalink(); ?>'
        title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>'>
        </a>
        -->
        <?php echo $item->get_content(); ?>
    </li>
    <?php endforeach;

					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
			 

				 
				 echo "</ul>";
			}
			
			
			wp_echoTwitter($user, $number_tweets);
			
 
			echo $after_widget;
			
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['user'] = strip_tags($new_instance['user']);
			$instance['number_tweets'] = strip_tags($new_instance['number_tweets']);
			return $instance;
		}
		
		
		function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'user' => '', 'number_tweets' => '') );
			$title = strip_tags($instance['title']);
			$user = strip_tags($instance['user']);
			$number_tweets = strip_tags($instance['number_tweets']);
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('user'); ?>">User: <input id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($user); ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('number_tweets'); ?>">Number of Tweets: <input id="<?php echo $this->get_field_id('number_tweets'); ?>" name="<?php echo $this->get_field_name('number_tweets'); ?>" type="text" value="<?php echo esc_attr($number_tweets); ?>" /></label></p>
			
			<?php
		}
}

register_widget('twitter_widget');
?>