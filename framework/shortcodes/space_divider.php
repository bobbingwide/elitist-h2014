<?php

function space_divider_f($atts, $content = null) {
		
	return "[RAW]<div class='space_divider' ></div>[/RAW]";
}
add_shortcode("space_divider", "space_divider_f");
?>