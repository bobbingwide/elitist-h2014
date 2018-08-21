<div class="flowplayer" data-swf="<?php echo get_template_directory_uri(); ?>/js/flowplayer.swf">
	<video autoplay>
		<source type="video/mp4" src="<?php echo $background_video; ?>"/>
	</video>
</div>

<script type="text/javascript"> 
/* <![CDATA[ */
jQuery(document).ready(function($) {  

	flowplayer.conf.embed = false;						

	$("#controls").hide();
 });
 /* ]]> */
</script>
	                
	        