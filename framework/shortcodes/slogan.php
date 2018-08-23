<?php

function slogan_f($atts, $content = null) {
		
	return "[RAW]<div class='slogan grid_12 alpha omega' >".do_shortcode($content)."</div>[/RAW]";
}
add_shortcode("slogan", "slogan_f");




function slogan_link_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"color" => '',
		"href" => ''
	), $atts));
	
	if($color != ''){
		$styled_color = "style='background-color:$color ;'";
	}
	
	return '<a href="'.$href.'"'.$styled_color.'><span class="btn_text">'.$content.'</span><span class="btn_right" '.$styled_color.'></span></a>';
}
add_shortcode("sloganlink", "slogan_link_f");



?>