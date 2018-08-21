<?php

function divider_f($atts, $content = null) {
		
	return "[RAW]<span class='line_full' ></span>[/RAW]";
}
add_shortcode("divider", "divider_f");
?>