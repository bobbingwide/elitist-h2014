<?php
function button_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => '',
		"style" => '',
		"href" => ''
	), $atts));
	
	
	if($color != ''){
		$styled_color = "style='background-color:$color !important;'";
	}
	
	return '<a href="'.$href.'" class="button-'.$style.'" '.$styled_color.'><span class="btn_text">'.$content.'</span><span class="btn_right" '.$styled_color.'></span></a>';
}
add_shortcode("button", "button_f");

function read_more_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => ''
	), $atts));
	
	return '<a href="'.$href.'" class="more-link">Read more</a>';
}
add_shortcode("read_more", "read_more_f");


?>