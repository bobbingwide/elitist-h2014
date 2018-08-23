<?php
function dropcap_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"style" => '',
		"color" => ''
	), $atts));
	
	
	if($color != ''){
		$styled_color = "style='background-color:$color !important;'";
	}else{
		$styled_color = "";
	}
	return '<span class="dropcap'.$style.' dropcap" '.$styled_color.'>'.$content.'</span>';
}
add_shortcode("dropcap", "dropcap_f");



function quotes_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"align" => '',
		"color" => '',
		"cite" => ''
	), $atts));
	
	
	if($color != ''){
		$styled_color = "style='background-color:$color !important;'";
	}
	
	if($align == 'right'){
		$align_styled = "class='alignright'";
	}elseif($align == 'left'){
		$align_styled = "class='alignleft'";
	}else{
		$align_styled = "";
	}
	
	if($cite){
		$cite_styled = "<cite>$cite</cite>";
	}else{
		$cite_styled = "";
	}
	
	return '<blockquote '.$align_styled.'><p class="qp"> </p><p>'.$content.'</p>'.$cite_styled.'</blockquote>';
}
add_shortcode("blockquote", "quotes_f");



function code_f($atts, $content = null) {

	
	return '[raw]<code class="code">'.$content.'</code>[/raw]';
}
add_shortcode("code", "code_f");



function list_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"style" => ''
	), $atts));
	
	return '<ul class="list'.$style.' list-s">'.do_shortcode($content).'</ul>';
}
add_shortcode("list", "list_f");


function li_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => ''
	), $atts));
	
	
	if($color != ''){
		$styled_color = "style='background-color:$color !important;'";
	}
	
	return '<li><span></span>'.$content.'</li>';
}
add_shortcode("li", "li_f");


function highlight_f($atts, $content = null) {
	extract(shortcode_atts(array(
		"style" => ''
	), $atts));
	
	
	return '<span class="highlight '.$style.'">'.$content.'</span>';
}
add_shortcode("highlight", "highlight_f");

?>