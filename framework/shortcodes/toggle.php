<?php
function toggle_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"title" => ''
	), $atts));

		$rand = rand();
		$rand .= "_ql";
		
	return '
	<div class="accordion-group accordion">
	<div class="accordion-heading"><a href="#'.$rand.'" data-toggle="collapse" class="accordion-toggle"><i class="icon-plus"></i> '.$title.'</a></div>
	<div class="accordion-body collapse" id="'.$rand.'"><div class="accordion-inner">'.do_shortcode($content).'</div></div></div>';
}
add_shortcode("toggle", "toggle_f");



?>