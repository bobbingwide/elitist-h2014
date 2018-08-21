<?php
//Get the path of the URL
			$vimeo_video = parse_url($background_video, PHP_URL_PATH);
			
			//Remove "/" if is in the URL at the end or beggining
			$vimeo_video = trim($vimeo_video, "/");	
			
		?>
		<div class="videoWrapper">
               	
        	<iframe id="video" src="http://player.vimeo.com/video/<?php echo $vimeo_video; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;loop=0" width="400" height="657" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
    
        </div>