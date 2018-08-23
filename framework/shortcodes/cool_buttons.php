<?php
function cool_button_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => '',
		"href" => ''
	), $atts));
	
	
	if($color == ''){
		$color = "";
	}
	
	return '<a href="'.$href.'" class="cool_button '.$color.'"><span>'.$content.'</span></a>';
}
add_shortcode("cool_button", "cool_button_f");

?>