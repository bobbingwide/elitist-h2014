<?php
		$slider_autoplay = of_get_option('slider_autoplay'); 
		$slider_slide_interval = of_get_option('slider_slide_interval'); 
		$slider_speed_transition = of_get_option('slider_speed_transition'); 
		$slider_transition = of_get_option('slider_transition'); 
		$slider_pausehover = of_get_option('slider_pausehover_fullscreen'); 
		$slider_navigation = of_get_option('slider_navigation');
		$slider_verticalcenter = of_get_option('slider_verticalcenter');
		$slider_horizontalcenter = of_get_option('slider_horizontalcenter'); 

		$background_image = "";
		
		?>
        
           	
            
            <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(document).ready(function($) { 
					
                    
                    supersized_fstart = function(){
                    jQuery(function($){
                    		$("#supersized-loader").show();
                            $.supersized({
                                //Functionality
                                slideshow               :   1,		//Slideshow on/off
                                autoplay				:	<?php echo $slider_autoplay; ?>,		//Slideshow starts playing automatically
                                start_slide             :   1,		//Start slide (0 is random)
                                random					: 	0,		//Randomize slide order (Ignores start slide)
                                slide_interval          :   <?php echo $slider_slide_interval; ?>,	//Length between transitions
                                transition              :   <?php echo $slider_transition; ?>, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                                transition_speed		:	<?php echo $slider_speed_transition; ?>,	//Speed of transition
                                new_window				:	0,		//Image links open in new window/tab
                                pause_hover             :   <?php echo $slider_pausehover; ?>,		//Pause slideshow on hover
                                keyboard_nav            :   1,		//Keyboard navigation on/off
                                performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                                image_protect			:	1,		//Disables image dragging and right click with Javascript
                                image_path				:	'<?php echo get_template_directory_uri(); ?>/images/', //Default image path
            
                                //Size & Position
                                min_width		        :   0,		//Min width allowed (in pixels)
                                min_height		        :   0,		//Min height allowed (in pixels)
                                vertical_center         :   <?php echo $slider_verticalcenter; ?>,		//Vertically center background
                                horizontal_center       :   <?php echo $slider_horizontalcenter; ?>,		//Horizontally center background
                                fit_portrait         	:   1,		//Portrait images will not exceed browser height
                                fit_landscape			:   0,		//Landscape images will not exceed browser width
                                
                                //Components
                                navigation              :   <?php echo $slider_navigation; ?>,		//Slideshow controls on/off
                                thumbnail_navigation    :   0,		//Thumbnail navigation
                                slide_counter           :   0,		//Display slide numbers
                                slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
                                slides					:   [ 		//Background image
                                                                    <?php if($background_image != ""){ ?>
                                                                        { image : '<?php echo $src[0]; ?>' }
                                                                    <?php }else{
																		
																		
																		
																		wp_reset_query();
																		$slide_caption = 0;
																		if(is_page_template('home-page.php')){
																				$slide_caption = "home";
																		}
																		//First to Last
																		query_posts('post_type=slides&order=ASC&posts_per_page=-1'); 
																		$output = "";
																		
																		//Loop for Post Types Slides
																		if ( have_posts() ) while ( have_posts() ) : the_post();
																			//Slide Image
																			$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
																			//Get the Slide meta info
																			$slide_link = get_post_meta(get_the_ID(), 'mb_slide_link', true);
																			
																			$output.="\n{"; 
																			$output.="image : '". $thumbnail[0] ."'"; 
																			if($slide_link != ''){
																				  $output.="  , url : '". $slide_link." '";
																			} ;
																			$output.="  , title : '".get_the_title()."'";
																			$output.="  , caption : '".get_the_content()."'";
																			//echo"$slide_caption";
																			if($slide_caption === "home"){
																				$output.="  , show_caption : ".get_post_meta(get_the_ID(), 'mb_slide_caption', true);
																			}else{
																				$output.="  , show_caption : 0";																	
																			}				
																			$output.="},";
																		endwhile; 
																		//Remove the "," from the last item
																		$output = substr ($output, 0, -1);
																		// Reset the global $the_post as this query will have stomped on it
																		wp_reset_query();
																		
																		echo $output;


                                                                    } //else ?>
                                                            ]
                                        
                            });//supersized
                            
							//jQuery("#supersized li").prepend('<div class="full_pattern" />');	
							
							//If is only 1 image don't show controls
							if($("#slide-list li").size() == 1){
								$("#slide-list").hide();
								$("#ss_tray_button").parent().hide();
							}//-------------------------------------
							
							
							<?php if($background_image != ""){ ?>
                                  $("#controls").hide();
                            <?php } ?>
						});//jQuery(function($)
					}//supersized_fstart
					
					<?php
					//Start the Slider if there isn't a Background video
                    if($background_video != ""){}else{ ?>
                    
						supersized_fstart();
					
					<?php
                    }
                    ?>
                  
            });
            /* ]]> */            
            </script>