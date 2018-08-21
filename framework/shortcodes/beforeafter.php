<?php
function beforeafter_f($atts, $content = null) {
		extract(shortcode_atts(array(
		"before" => '',
		"after" => '',
		"id" => ''
	), $atts));

	
		
	return '<div id="ba_container_'.$id.'" class="ql_beforeafter">
                         <div><img alt="before" src="'.$before.'" /></div>
                         <div><img alt="after" src="'.$after.'"  /></div></div>
                         [RAW]<script>
			jQuery(window).load(function() {
                                jQuery("#ba_container_'.$id.'").beforeAfter({
                                        imagePath : "'.THEME_JS.'/beforeafter/",
                                        showFullLinks : false
                            	});
			});
			</script>[/RAW]
			';
}
add_shortcode("beforeafter", "beforeafter_f");
?>