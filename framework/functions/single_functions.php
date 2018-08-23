<?php
/* Single Functions ----- */

		//Function to make a limit excerpt (maybe use in Portfolios)
		function excerpt($num) {
		$limit = $num+1;
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt)."…";
		return $excerpt;
		}
		
		//Function to make a limit content (maybe use in Portfolios)
		function content($limit) {
		  $content = explode(' ', get_the_content(), $limit);
		  if (count($content)>=$limit) {
		    array_pop($content);
		    $content = implode(" ",$content).'…';
		  } else {
		    $content = implode(" ",$content);
		  }	
		  $content = preg_replace('/\[.+\]/','', $content);
		  $content = apply_filters('the_content', $content); 
		  $content = str_replace(']]>', ']]&gt;', $content);
		  return $content;
		}
?>