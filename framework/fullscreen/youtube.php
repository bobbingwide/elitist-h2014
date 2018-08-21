<?php
//Get the path of the URL
			$video_url = $background_video;
			$video_id = "";

			if (preg_match("/youtu.be/i", $video_url)) {//En caso de que use la URL en formato corto (http://youtu.be/OpBkEV3h7PQ)
          		$video = parse_url($video_url, PHP_URL_PATH);
          		//Remove "/" if is in the URL at the end or beggining
          		$video_id = trim($video, "/");	
          		
          	}else{//En caso de que se use el formato largo (http://www.youtube.com/watch?v=OpBkEV3h7PQ)
          	
            	$video = parse_url($video_url);
            	parse_str($video['query'], $video_query);
            	$video_id = $video_query['v'];
              	
          	}
		?>
		<div class="videoWrapper">
		  
      <iframe width="100%" height="657" src="http://www.youtube.com/embed/<?php echo $video_id; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
    
    </div>