<?php
function icon_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"name" => ''
	), $atts));
		
	$template_path = get_template_directory_uri();
		
	return '<img class="icon" src="'.$template_path.'/images/Tango_Icons/'.$name.'.png" />';
}
add_shortcode("icon", "icon_f");



?>