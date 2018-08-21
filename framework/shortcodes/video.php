<?php
function shortcode_video($atts){
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'youtube':
				return youtube($atts);
				break;
			case 'vimeo':
				return vimeo($atts);
				break;
			case 'dailymotion':
				return dailymotion($atts);
				break;
		}
	}
	return '';
}
add_shortcode('video', 'shortcode_video');


function vimeo($atts) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'width' => false,
		'height' => false,
		'title' => 'false',
	), $atts));

	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		$height = '400';
		$width = '650';
	}
	if($title!='false'){
		$title = 1;
	}else{
		$title = 0;
	}

	if (!empty($video_id) && is_numeric($video_id)){
		return "<div class='video_frame'><iframe src='http://player.vimeo.com/video/$video_id?title={$title}&amp;byline=0&amp;portrait=0' width='$width' height='$height' frameborder='0'></iframe></div>";
	}
}

function youtube($atts, $content=null) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16) + 25;
	if (!$height && !$width){
		$height = '400';
		$width = '650';
	}

	if (!empty($video_id)){
		return "<div class='video_frame'><iframe src='http://www.youtube.com/embed/$video_id' width='$width' height='$height' frameborder='0'></iframe></div>";
	}
}

function dailymotion($atts, $content=null) {

	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		$height = '400';
		$width = '650';
	}

	if (!empty($video_id)){
		return "<div class='video_frame'><iframe src=http://www.dailymotion.com/embed/video/$video_id?width=$width&theme=none&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=1&additionalInfos=0&autoPlay=0&hideInfos=0' width='$width' height='$height' frameborder='0'></iframe></div>";
	}
}