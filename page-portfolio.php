<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>


		<?php get_template_part( "beforeloop", "portfolio" ) ?> 
        	
            <!--<h3 class="post_title"><?php wp_title(''); ?></h3>-->

		<?php
		//===================
		//Audio Functions
		//===================
		global $Theme;
		//Get the page ID even if is the Blog Page
		global $wp_query;
		$page_id = $wp_query->get_queried_object_id();

		//Audio---------------------------------
		$background_audio = get_post_meta($page_id, 'mb_background_audio', true);
		$background_audio_format = get_post_meta($page_id, 'mb_background_audio_format', true);
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
		<?php }//End else $background_video ?>
		<div id="jquery_jplayer_1"></div>
	    <div id="jp_interface_1">
	     <a href="#" class="jp-play">Play</a>
	     <a href="#" class="jp-pause">Pause</a>
	    </div><!-- /jp_interface_1 -->
        <div id="controls" class="load-item">
        	<ul>
            	<li><a href="#" id="jp_play_pause" class="ss_button"><i class="icon-volume-off"></i> <i class="icon-volume-up"></i></a></li>
        	</ul>
        	<div class="clearfix"></div>
    	</div><!-- /controls-->




            <div id="portfolio_container" class="black_a_white">
               
            	<div class="preloader-broken"></div>

                    <?php 	
					
					//If a custom portfolio is selected-------------------------------------------------------------------------
					//Select wich portfolio will be display
					$portfolio_replacement = 'portfolio'; //Default Portfolio
					//If is page or single.
					if(is_singular()){
						global $wp_query;
						$post = $wp_query->get_queried_object();
						$portfolio_replacement = get_post_meta($post->ID, 'sbg_selected_portfolio_replacement', true);
						//If default selected
						if($portfolio_replacement == '0' || $portfolio_replacement == ''){
							$portfolio_replacement = 'portfolio';
						}
						// Reset the global $the_post as this query will have stomped on it
						wp_reset_query();
					}
					//End--> If a custom portfolio is selected-------------------------------------------------------------------------
					


					$terms_portfolio = get_terms($portfolio_replacement."_categories"); //get all the terms from the current portfolio (not empty terms)

					$terms_list = array();
					$terms_parents = array();

					if($terms_portfolio){

						foreach ($terms_portfolio as $term) {
							array_push($terms_parents, $term->parent);	//put together all the parents categories ID						
						}

						$terms_parents = array_unique($terms_parents);//remove duplicates categories ID
						rsort($terms_parents);//Order category parents

						foreach ($terms_parents as $parent) { //for each parent category, we will get all the child categories.
							$terms_list[$parent] = get_term_children( $parent, $portfolio_replacement."_categories" );//get the childrens ID
						}//terms_parents


					}//if $terms_portfolio
						
						

					if(count($terms_list) > 1){
						unset($terms_list['0']);//If we have more than 1 parent we can remove the one not created by the user
												//If we don't have more than 1 parent is because the user is not using parent categories.
					}

						//If is any category
						if($terms_list){
							$i = 0;
							foreach ($terms_list as $term) {
									$term_parent = get_term_by('id', $terms_parents[$i], $portfolio_replacement."_categories");
                                   
					                ?>
										<div class="ql_filter filter_list">
                    						<h4><?php if ( $term_parent ) echo $term_parent->name; ?></h4>
											<ul>
												<li class="active"><i class="icon-eye-open"></i><a href="#" data-filter="*" >All<span></span></a></li>
												<?php
										
													foreach ($term as $term_child) {
														$term_obj = get_term_by('id', $term_child, $portfolio_replacement."_categories");
														if($term_obj){
												?>
														<li><i class="icon-eye-open"></i><a href="#" data-filter="._<?php echo $term_obj->slug; ?>"><?php echo $term_obj->name; ?></a></li>
												<?php
														}
													} 
												?>
											</ul>
											<div class="clearfix"></div>
										</div><!-- /ql_filter -->
										
										
					<?php 
								$i++;
							}//for each
						}//if $term_list
					?>





                    
	                    
						 <?php 
						 //The numbers of words to show in the portfolio descriptions
						 function new_excerpt_length($length) {
												return 10;
						}
						add_filter('excerpt_length', 'new_excerpt_length');
						 
						 query_posts(array('post_type'=>$portfolio_replacement, 'posts_per_page' => -1)); 
						 if (have_posts()) : while (have_posts()) : the_post();
							$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
							//Get the taxonomys
							$terms = get_the_terms( $wp_query->post->ID, $portfolio_replacement.'_categories');
							//print_r(get_the_terms( $wp_query->post->ID, 'portfolio_categories'));
							$termsToPrint = "";
							$_termsToPrint = "";

							if($terms){
								foreach ( $terms as $term ) {
									
									$_termsToPrint .= "_".$term->slug." ";
									$termsToPrint .= $term->name." - ";	
								}
								
							}
							$_termsToPrint .= "portfolio_item";
							
						?>
    						
                            <div <?php post_class($_termsToPrint) ?> id="post-<?php the_ID(); ?>" data-category="<?php echo $_termsToPrint; ?>" data-id="<?php $count=0; echo $count;?>">
                            	<?php 
										//Get the meta for the Video option.
										$video_link = get_post_meta(get_the_ID(), 'mb_video_link', true);
										$video_width = get_post_meta(get_the_ID(), 'mb_video_width', true);
										$video_height = get_post_meta(get_the_ID(), 'mb_video_height', true);
										$external_link = get_post_meta(get_the_ID(), 'mb_external_link', true);

										$portrait_mode = get_post_meta(get_the_ID(), 'mb_portfolio_portrait', true);
										?>
                            	<a href="<?php if($external_link){ echo $external_link; }else{ the_permalink(); }?>">

			                        <div class="ql_hover">
			                            <div class="ql_hover_content">
			                            <div>
			                            <h2><?php the_title(); ?></h2>
			                            <p><?php the_excerpt(); ?></p>
			                            <span class="short_line"></span>
			                            <div class="portfolio_cats"><?php if($termsToPrint){ echo substr($termsToPrint, 0, -2);} ?></div>
			                            </div>
			                            </div><!-- /ql_hover_content -->

			                            <?php
			                            $background_video = get_post_meta(get_the_ID(), 'mb_video_link', true);

			                            if($background_video){ ?>
			                            <div class="p_icon"><i class="icon-play-circle"></i></div>
			                            <?php }else{ ?>
			                            <div class="p_icon"><i class="icon-picture"></i></div>

			                            <?php } ?>
			                            
			                        </div><!-- /ql_hover -->
			                        <?php 
			                        $width = 400;
									$height = 225;
			                        if($portrait_mode === "1"){
			                        	$width = 400;
										$height = 480;
			                        }


			                        ?>
			                        <img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1" alt="<?php the_title(); ?>" />
			                        <span class="baw_image"><img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;w=<?php echo $width; ?>&amp;h=<?php echo $height; ?>&amp;zc=1&amp;f=2"></span>
			                    </a>

          

                    			<div class="clearfix"></div>
                                
                            </div><!-- /portfolio_item -->

                        <?php
						
						endwhile; ?>
                    
                        <?php //include (TEMPLATEPATH . '/inc/nav.php' ); ?>
                    
                        <?php else : ?>
                    
                            <h3>No Items</h3>
                    
                        <?php endif; ?>
                        

                <div class="clearfix"></div>     	

        </div> <!-- #portfolio_container -->


        <?php wp_reset_query(); ?>

         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        
							<?php if ( post_password_required() ) : ?>
                            <div class="password_p">
                            	<?php the_content(); ?>
                            </div><!-- /password_p -->
        
                            <?php else : ?>
                        
                                
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                                    
                                        
    
                                        
                                            <?php the_content(); ?>
                        
                                        
                                        
                                            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                            
                                            
                                            
                                            <div class="clearfix"></div>
                                            
                                    </article>
                                
                            <?php endif; //password ?>
                        
                        <?php endwhile; else: ?>
                    
                            
                                <article>
                                	
                        			<p><?php _e('Sorry, but the requested resource was not found on this site.','eneaa'); ?></p>
                                    
                                    <div class="clearfix"></div>
                                </article>
                           
                    
                        <?php endif; ?>

                    
              
        <?php  get_template_part( "afterloop", "fullwidth" ) ?> 

<?php get_footer(); ?>