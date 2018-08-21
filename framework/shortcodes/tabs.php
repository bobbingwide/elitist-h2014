<?php
function tabs_f($atts, $content = null) {
	
	return '<div class="tab-content">'.do_shortcode($content).'</div>';
}
add_shortcode("tabs", "tabs_f");


function nav_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '',
		"current" => ''
	), $atts));

	if($current == 'yes'){
		$current_class = "class='active' ";
	}else{
		$current_class = ""	;	
	}

	return '<li '.$current_class.'><a href="#'.$id.'">'.$content.'</a></li>';
}
add_shortcode("nav", "nav_f");


function menu_f($atts, $content = null) {

	
	return '<ul class="nav nav-tabs ql_tabs">'.do_shortcode($content).'</ul>';
}
add_shortcode("menu", "menu_f");

function tab_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '',
		"current" => ''
	), $atts));

	if($current == 'yes'){
		$current_class = "active";
	}else{
		$current_class = ""	;	
	}
	
	return '<div class="tab-pane '.$current_class.'" id="'.$id.'">'.do_shortcode($content).'</div>';
}
add_shortcode("tab", "tab_f");




function accordion_f($atts, $content = null) {

	
	return '<div class="accordion">'.do_shortcode($content).'</div>';
}
add_shortcode("accordion", "accordion_f");

function accordion_pane_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
		"current" => ''
	), $atts));
	
	if($current == 'yes'){
		$current_class = "class='current' ";
		$current_pane = "style='display:block'";
	}else{
		$current_class = ""	;	
		$current_pane = "";
	}

	
	$output = '<h2 '.$current_class.'>'.$title.'</h2>';
	$output =  $output.'<div class="pane" '.$current_pane.'>'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode("accordion_pane", "accordion_pane_f");
?>