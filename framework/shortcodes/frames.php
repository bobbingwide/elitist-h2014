<?php
function imgframe_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"align" => ''
	), $atts));
		
		if($align){
			$alignment = "align".$align;
		}else{
			$alignment = "";
		}
	return '<img class="image-frame '.$alignment.'" src="'.$content.'" />';
}
add_shortcode("img-frame", "imgframe_f");



?>