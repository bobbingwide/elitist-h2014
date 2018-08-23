<?php
function map_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"latitude" => '',
		"longitude" => '',
		"popup" => '',
		"zoom" => '',
		"width" => '',
		"height" => '',
		"id" => '',
		"html" => ''
	), $atts));
	
	if($id){
		$id_output = $id;	
	}else{
		$id_output = "map";	
	}
		
		
	$output = "
	[RAW]
	<div id='".$id_output."' class='map-frame' style='height:".$height."; width:".$width.";'></div>
	
	<script type='text/javascript'>
	jQuery('#".$id_output."').gmap().bind('init', function(ev, map) {
	jQuery('#".$id_output."').gmap('addMarker', {'position': '".$latitude.",".$longitude."', 'bounds': true}).click(function() {
		jQuery('#".$id_output."').gmap('openInfoWindow', {'content': '".$html."'}, this);
		
	});
jQuery('#".$id_output."').gmap('option', 'zoom', ".$zoom.");
});

	</script>
	[/RAW]
	";
		
	return $output;
}
add_shortcode("map", "map_f");



?>