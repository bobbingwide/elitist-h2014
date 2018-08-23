<?php
$video_URL = get_post_meta( get_the_ID(), 'mb_post_format_video', true );


//If is a Vimeo Video----------------------------------------------
		if (preg_match("/vimeo/i", $video_URL)) {
			
			//Get the path of the URL
			$vimeo_video = parse_url($video_URL, PHP_URL_PATH);
			
			//Remove "/" if is in the URL at the end or beggining
			$vimeo_video = trim($vimeo_video, "/");	
			
		?>
		<div class="videoWrapper">
            <iframe class="post_video" height="433" src="http://player.vimeo.com/video/<?php echo $vimeo_video; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
        <?php  
		}else if(preg_match("/youtube/i", $video_URL)){
			//Get the path of the URL
			parse_str( parse_url( $video_URL, PHP_URL_QUERY ), $youtube_video );
		?>
		<div class="videoWrapper">
			<iframe class="post_video" width="100%" height="433" src="http://www.youtube.com/embed/<?php echo $youtube_video['v']; ?>" frameborder="0" allowfullscreen></iframe>
		</div>

		<?php }else if( preg_match("/youtu/i", $video_URL)){ 
			//Get the path of the URL
			$youtube_video = parse_url($video_URL, PHP_URL_PATH);
			
			//Remove "/" if is in the URL at the end or beggining
			$youtube_video = trim($youtube_video, "/");	
		?>
		<div class="videoWrapper">
			<iframe class="post_video" width="100%"  height="433" src="http://www.youtube.com/embed/<?php echo $youtube_video; ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php }else{ ?>

		<div class="flowplayer" data-swf="<?php echo get_template_directory_uri(); ?>/js/flowplayer.swf">
			<video autoplay>
				<source type="video/mp4" src="<?php echo $video_URL; ?>"/>
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

		<?php } ?>
