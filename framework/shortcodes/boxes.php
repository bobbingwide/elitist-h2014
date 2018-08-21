<?php
function alertbox_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"style" => ''
	), $atts));
		if($style){
			$styled = $style."-box";	
		}
		
	return '<div class="alert-box '.$styled.'" ><div class="inner_box">'.do_shortcode($content).'</div></div>';
}
add_shortcode("alert-box", "alertbox_f");



?>