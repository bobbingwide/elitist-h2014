<?php
function sliding_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));
		if(!$id){
			$id = "sliding_shortcode";	
		}
		
	return '<div id="'.$id.'" class="sliding_shortcode">'. do_shortcode($content) .'</div><!-- sliding_shortcode -->
			
			[RAW]<script>
			//Sliding Shortcode----------------------------->
			jQuery(document).ready(function($) {
			$("#'.$id.'").after("<div class=\'sliding_nav_control_'.$id.' sliding_nav\'>") 
									.cycle({  
											fx:     "fade", 
											pager:  ".sliding_nav_control_'.$id.'",
											timeout:  3000 
										});
									});
			</script>[/RAW]
	
	
	';
}
add_shortcode("sliding", "sliding_f");

?>