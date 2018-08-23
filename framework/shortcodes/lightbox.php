<?php
function lightbox_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => '',
		"title" => '',
		"group" => ''
	), $atts));
	
	($group == '') ? $rel = "prettyPhoto" : $rel = "prettyPhoto[".$group."]";
	return '<a href="'.$href.'" rel="'.$rel.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode("lightbox", "lightbox_f");

?>