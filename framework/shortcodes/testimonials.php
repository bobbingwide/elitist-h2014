<?php
function testimonials_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));
		if(!$id){
			$id = "testimonial_shortcode";	
		}
		
	return '<div id="'.$id.'" class="testimonial_shortcode">'. do_shortcode($content) .'</div><!-- testimonial_shortcode -->
			
			[RAW]<script>
			//Testimonial Shortcode----------------------------->
			jQuery(document).ready(function($) {
			$("#'.$id.'").after("<div class=\'testimonial_nav_'.$id.' sliding_nav\'>") 
									.cycle({  
											fx:     "fade", 
											pager:  ".testimonial_nav_'.$id.'",
											timeout:  5000 
										});
									});
			</script>[/RAW]
	
	
	';
}
add_shortcode("testimonials", "testimonials_f");


function testimonial_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"cite" => ''
	), $atts));
		
		$output = '[RAW]<div class="testim">
                        	<div>
                                <span></span>
                                <p>'. do_shortcode($content) .'</p>
                                <cite>'.$cite.'</cite>
                            </div>
                        </div><!-- testim -->[/RAW]';
		
	return $output;
}
add_shortcode("testimonial", "testimonial_f");



?>