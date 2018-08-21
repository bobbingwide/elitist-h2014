<?php
/*
Template Name: Fullscreen Gallery
*/
?>
<?php get_header(); ?>


		<?php get_template_part( "beforeloop", "portfolio" ) ?> 
        	
            <!--<h3 class="post_title"><?php wp_title(''); ?></h3>-->

          
         <?php
            global $Theme;
        
        
    //Get the page ID even if is the Blog Page
                global $wp_query;
                $page_id = $wp_query->get_queried_object_id();
                
    $background_image = get_post_meta($page_id, 'mb_background_image', true);
    $src = wp_get_attachment_image_src($background_image, 'full');
    
    //Audio---------------------------------
    $background_audio = get_post_meta($page_id, 'mb_background_audio', true);
    $background_audio_format = get_post_meta($page_id, 'mb_background_audio_format', true);
    

    $background_video = get_post_meta($page_id, 'mb_background_video', true);//KEEP <-------------





    if($background_video != "" AND !is_page_template('home-page-slider.php')){
    
        $video_autostart = of_get_option('video_autostart'); 
        $video_controlbar = of_get_option('video_controlbar'); 
        $video_stretching = of_get_option('video_stretching'); 
        $video_bufferlength = of_get_option('video_bufferlength'); 
        $video_repeat = of_get_option('video_repeat'); 

        //If is a Vimeo Video----------------------------------------------
        if (preg_match("/vimeo/i", $background_video)) {
            
            require_once (THEME_FULLSCREEN . "/vimeo.php");
            
        } else {//If is another type of video---------------------------------------------
        
            require_once (THEME_FULLSCREEN . "/video.php");

        }//End if vimeo
        
    }else{ //if $background_video (if not video)
        
        /*
        *If there isn't a Background Video to show, let's show images background
        */
        
        //If there is an audio file set play it
        if($background_audio != ""){
            //Audio Player-------------------------------
            require_once (THEME_FULLSCREEN . "/audio_player.php");
            
        }else{ //End if Audio ?>

            <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(document).ready(function($) { 
                $("#jp_interface_1").hide();
                $("#jp_play_pause").parent().hide();
            });
            /* ]]> */
            </script>
    <?php
        }//End else $background_video
                    
    }//Else Video

    
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
                                slideshow               :   1,      //Slideshow on/off
                                autoplay                :   <?php echo $slider_autoplay; ?>,        //Slideshow starts playing automatically
                                start_slide             :   1,      //Start slide (0 is random)
                                random                  :   0,      //Randomize slide order (Ignores start slide)
                                slide_interval          :   <?php echo $slider_slide_interval; ?>,  //Length between transitions
                                transition              :   <?php echo $slider_transition; ?>,        //0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                                transition_speed        :   <?php echo $slider_speed_transition; ?>,    //Speed of transition
                                new_window              :   0,      //Image links open in new window/tab
                                pause_hover             :   <?php echo $slider_pausehover; ?>,      //Pause slideshow on hover
                                keyboard_nav            :   1,      //Keyboard navigation on/off
                                performance             :   1,      //0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                                image_protect           :   1,      //Disables image dragging and right click with Javascript
                                image_path              :   '<?php echo get_template_directory_uri(); ?>/images/', //Default image path
            
                                //Size & Position
                                min_width               :   0,      //Min width allowed (in pixels)
                                min_height              :   0,      //Min height allowed (in pixels)
                                vertical_center         :   <?php echo $slider_verticalcenter; ?>,      //Vertically center background
                                horizontal_center       :   <?php echo $slider_horizontalcenter; ?>,        //Horizontally center background
                                fit_portrait            :   1,      //Portrait images will not exceed browser height
                                fit_landscape           :   0,      //Landscape images will not exceed browser width
                                
                                //Components
                                navigation              :   <?php echo $slider_navigation; ?>,        //Slideshow controls on/off
                                thumbnail_navigation    :   0,      //Thumbnail navigation
                                slide_counter           :   0,      //Display slide numbers
                                slide_captions          :   1,      //Slide caption (Pull from "title" in slides array)
                                slides                  :   [       //Background image
                                                                    <?php 
																				
																				$args = array(
																					'order'          => 'ASC',
																					'post_type'      => 'attachment',
																					'post_parent'    => $post->ID,
																					'post_mime_type' => 'image',
																					'post_status'    => null,
																					'numberposts'    => -1,
																				);
																				$attachments = get_posts($args);
																				if (count($attachments) > 1) {
																				
																					$output = "";
																					$n= 0;
																						foreach ($attachments as $attachment) {
																							$meta_info = wp_get_attachment_metadata($attachment->ID);
																								
																								
																								
																							$n++;
																							//Slide Image
																							$thumbnail = wp_get_attachment_url($attachment->ID);
																						   
																						
																							$output.="{"; 
																							$output.="image : '". $thumbnail ."'"; 
																							$output.="},";
	
																							
																						}//foreach	
																						if($n > 1){
																						  $output = substr ($output, 0, -1);
																						}
																						 echo $output;
																				}//if count											
																			?>
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
                    

                    
                        supersized_fstart();
                    
            });
            /* ]]> */            
            </script>




    <div id="ss_thumb_tray" class="load-item">
        <div id="thumb-back"><i class="icon-chevron-left"></i></div>
        <div id="thumb-forward"><i class="icon-chevron-right"></i></div>
    </div>
    
    
    <!--Navigation-->
    <ul id="slide-list"></ul>
    
    <div id="jquery_jplayer_1"></div>
    <div id="jp_interface_1">
     <a href="#" class="jp-play">Play</a>
     <a href="#" class="jp-pause">Pause</a>
    </div><!-- /jp_interface_1 -->


    <div id="controls" class="load-item">
        <ul>
            <li><a href="#" id="jp_play_pause" class="ss_button"><i class="icon-volume-off"></i> <i class="icon-volume-up"></i></a></li>
            <li><a href="#" id="ss_play_button" class="ss_button"><i class="icon-pause"></i> <i class="icon-play"></i></a></li>
            <li><a href="#" id="ss_tray_button" class="ss_button"><i class="icon-th"></i></a></li>
            <li><a href="#" id="ss_fullscreen_button" class="ss_button"><i class="icon-resize-full"></i> <i class="icon-resize-small"></i></a></li>
            <li><a href="#" id="ss_nextslide_button" class="ss_button"><i class="icon-chevron-right"></i></a></li>
            <li><a href="#" id="ss_prevslide_button" class="ss_button"><i class="icon-chevron-left"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div><!-- /controls-->
                    
              
        <?php  get_template_part( "afterloop", "fullwidth" ) ?> 

<?php get_footer(); ?>