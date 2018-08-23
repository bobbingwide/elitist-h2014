				<div class="flex-container">
            	
	            	<div class="flexslider ql_loading">
					  <ul class="slides">
	   					<?php 
	                    //Last to First
	                    //query_posts(array('post_type'=>'slides')); 
	                    
                    	//First to Last
                    	query_posts('post_type=slides&order=ASC&posts_per_page=-1'); 
                        //Loop for Post Types Slides
                        if ( have_posts() ) while ( have_posts() ) : the_post();
                            //Slide Image
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                            //Get the Slide meta info
                            $slide_link = get_post_meta(get_the_ID(), 'mb_slide_link', true);
	                        ?>
	                       
	                         
	                         	<li>
	                         		<?php if($slide_link != ''){ ?>
			                         <a href="<?php echo $slide_link; ?>">
			                         <?php } ?>

	                         		<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;w=940&amp;h=275&amp;zc=1" alt="<?php the_title(); ?>" class="slider_img"  />

	                         		<?php if($slide_link != ''){ ?>
			                         </a>
			                         <?php } ?>
	                         	</li>
	                         <?php
                         endwhile; 
						 
                        // Reset the global $the_post as this query will have stomped on it
                        wp_reset_query();
                        ?>
                    </ul>
					</div><!-- /flexslider -->
				
				</div><!-- /flex-container -->