<?php
/*Twitter Widget***********/

class ad_125 extends WP_Widget {
	
	function __construct() {
		$widget_ops = array('classname' => 'ad_125', 'description' => 'Displays Ads' );
		parent::__construct('ad_125', 'Advertisement 125px - eneaa', $widget_ops);
	}

	function widget($args, $instance) {
		
			extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

		$count = (int)$instance['count'];

		$output = '';
		if( $count > 0){
			for($i=1; $i<= $count; $i++){
				$image = isset($instance['ad_'.$i.'_image'])?$instance['ad_'.$i.'_image']:'';
				$link = isset($instance['ad_'.$i.'_link'])?$instance['ad_'.$i.'_link']:'';
				if(empty($image)){
					$image = THEME_IMAGES.'/ad.gif';
				}
				$output .= '<a href="'.$link.'" rel="nofollow" target="_blank" alt="Advertisment"><img src="'.$image.'" alt="Advertisement"/></a>';
			}
		}
		
		if ( !empty( $output ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
			echo $output;
			echo $after_widget;
		}
			
		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['count'] = (int) $new_instance['count'];
			for($i=1;$i<=$instance['count'];$i++){
				$instance['ad_'.$i.'_image'] = strip_tags($new_instance['ad_'.$i.'_image']);
				$instance['ad_'.$i.'_link'] = strip_tags($new_instance['ad_'.$i.'_link']);
			}
			return $instance;
		}
		
		
		function form($instance) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$count = isset($instance['count']) ? absint($instance['count']) : 4;
		for($i=1;$i<=10;$i++){
			$ad_image = 'ad_'.$i.'_image';
			$$ad_image = isset($instance[$ad_image]) ? $instance[$ad_image] : '';
			$ad_link = 'ad_'.$i.'_link';
			$$ad_link = isset($instance[$ad_link]) ? $instance[$ad_link] : '';
		}
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('count'); ?>">How many advertisement to display?</label>
		<input id="<?php echo $this->get_field_id('count'); ?>" class="advertisement_count" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" size="3" /></p>

		<p>
			<em>Note: Please input FULL URL <br/>(e.g. <code>http://www.example.com</code>)</em>
		</p>

		<?php for($i=1;$i<=10;$i++): $ad_image = 'ad_'.$i.'_image';$ad_link = 'ad_'.$i.'_link'; ?>
			<div class="advertisement_<?php echo $i;?>" <?php if($i>$count):?>style="display:none"<?php endif;?>>
				<p><label for="<?php echo $this->get_field_id( $ad_image ); ?>"><?php printf(__('#%s Image URL:', 'quemalabs_admin'),$i);?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( $ad_image ); ?>" name="<?php echo $this->get_field_name( $ad_image ); ?>" type="text" value="<?php echo $$ad_image; ?>" /></p>
				<p><label for="<?php echo $this->get_field_id( $ad_link ); ?>"><?php printf(__('#%s Link:', 'quemalabs_admin'),$i);?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( $ad_link ); ?>" name="<?php echo $this->get_field_name( $ad_link ); ?>" type="text" value="<?php echo $$ad_link; ?>" /></p>
			</div>

		<?php endfor;?>
			
			<?php
		}
}

register_widget('ad_125');
?>