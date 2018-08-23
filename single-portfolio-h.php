<?php get_header(); ?>

		<?php get_template_part( "beforeloop", "single-portfolio" ) ?> 
                
                	<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                    	<?php if ( post_password_required() ) : ?>
                                <div class="password_p">
                                    <?php the_content(); ?>
                                </div><!-- /password_p -->
            
                                <?php else : ?>
                                
                                	
		                            <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-post') ?> >


		                            	<?php
                                        //get_template_part( "post_image", "single-portfolio" );

                                        //Get the meta for the Video option.
										$background_video = get_post_meta(get_the_ID(), 'mb_video_link', true);

										if($background_video){

											global $Theme;
        
        
											//Get the page ID even if is the Blog Page
											global $wp_query;
											$page_id = $wp_query->get_queried_object_id();
														
											
											//Audio---------------------------------
											$background_audio = get_post_meta($page_id, 'mb_background_audio', true);
											$background_audio_format = get_post_meta($page_id, 'mb_background_audio_format', true);
											
											
											//If is a Vimeo Video----------------------------------------------
											if (preg_match("/vimeo/i", $background_video)) {
												
												require_once (THEME_FULLSCREEN . "/vimeo.php");
												
											} else if(preg_match("/youtube/i", $background_video) || preg_match("/youtu.be/i", $background_video)) {//If is another type of video---------------------------------------------
											
												require_once (THEME_FULLSCREEN . "/youtube.php");
												
											} else {//If is another type of video---------------------------------------------
											
												require_once (THEME_FULLSCREEN . "/video.php");
												
											}//End if vimeo

										?>
										

										<?php
										}else{




										?>
                                                                               
			                                <div class="flex-container span8">
	        
												<div class="flexslider ql_loading">
													
												    <ul class="slides">

				                                        <?php
				                                        $width = 1170;
				                                        $width_portrait = 702;
				                                        $is_portrait = false;
														//$height = 506;
														$featured_image = "";

				                                        

				                                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
														if($thumbnail){
															$featured_image = $thumbnail[0];
															
															 $image_data = wp_get_attachment_metadata(get_post_thumbnail_id());

														    // If the image is portrait show as it is..
														    if($image_data['height'] > $image_data['width']){
														    	echo "<li class='ql_portrait'>";
														    	$is_portrait = true;
														    }else{
														    	echo "<li>";
														    	$is_portrait = false;
														    }

															?>
																<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;w=<?php if($is_portrait){ echo $width_portrait; }else{ echo $width; } ?>"   />
															</li>
															<?php
														}

														global $wpdb;
														$portfolio_images = get_post_meta( get_the_ID(), 'mb_portfolio_images', false );
														
														if($portfolio_images){
															$portfolio_images = implode( ',' , $portfolio_images );

															// Re-arrange portfolio_images with 'menu_order'
															$portfolio_images = $wpdb->get_col( "
															    SELECT ID FROM {$wpdb->posts}
															    WHERE post_type = 'attachment'
															    AND ID in ({$portfolio_images})
															    ORDER BY menu_order ASC
															" );
															foreach ( $portfolio_images as $att )
															{
																
																if(wp_get_attachment_url($att) != $featured_image){

															    // Get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
															    $src = wp_get_attachment_image_src( $att, 'full' );
															    $src = $src[0];

															    $image_data = wp_get_attachment_metadata($att);

															    // If the image is portrait show as it is..
															    if($image_data['height'] > $image_data['width']){
															    	echo "<li class='ql_portrait'>";
															    	$is_portrait = true;
															    }else{
															    	echo "<li>";
															    	$is_portrait = false;
															    }
															  	?>
															    	<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $src; ?>&amp;w=<?php if($is_portrait){ echo $width_portrait; }else{ echo $width; } ?>"   />
															    <?php
															    echo "</li>";

																}
															}
														}//if $portfolio_images


						                				?>
			                						</ul>
												</div><!-- /flexslider -->
											</div><!-- /flex-container -->
                                                                                        <div class="span4 portfolio_post">
						                        <h2><?php the_title(); ?></h2>
						                        <?php the_content(); ?>
						                        <div class="clearfix"></div>
						                        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						                    </div>

                                                                                        





											<?php
											$portfolio_images = get_post_meta( get_the_ID(), 'mb_portfolio_images', false );
											if($portfolio_images){
											?>


												<div class="flex_carousel">
												    <ul class="slides">

				                                        <?php
				                                        $width = 210;
														$height = 118;
														$featured_image = "";

				                                        

				                                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
														if($thumbnail){
															$featured_image = $thumbnail[0];
															
															 $image_data = wp_get_attachment_metadata(get_post_thumbnail_id());
															
														    // If the image is portrait show as it is..
														    if($image_data['height'] > $image_data['width']){
														    	echo "<li class='ql_portrait'>";
														    }else{
														    	echo "<li>";
														    }

															?>
																<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $thumbnail[0]; ?>&amp;h=<?php echo $height; ?>"   />
															</li>
															<?php
														}

														global $wpdb;
														$portfolio_images = get_post_meta( get_the_ID(), 'mb_portfolio_images', false );

														if($portfolio_images){
															$portfolio_images = implode( ',' , $portfolio_images );

															// Re-arrange portfolio_images with 'menu_order'
															$portfolio_images = $wpdb->get_col( "
															    SELECT ID FROM {$wpdb->posts}
															    WHERE post_type = 'attachment'
															    AND ID in ({$portfolio_images})
															    ORDER BY menu_order ASC
															" );
															foreach ( $portfolio_images as $att )
															{
																
																if(wp_get_attachment_url($att) != $featured_image){

															    // Get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
															    $src = wp_get_attachment_image_src( $att, 'full' );
															    $src = $src[0];

															    echo "<li>";
															    
															    ?>
															    	<img src="<?php echo get_template_directory_uri(); ?>/framework/timthumb.php?src=<?php echo $src; ?>&amp;h=<?php echo $height; ?>"   />
															    <?php 
															    echo "</li>";

																}
															}
														}//if $portfolio_images


						                				?>
			                						</ul>
												</div><!-- /flexslider -->
									<?php
									}//if $portfolio_images
									?>
				

										<?php }//else video ?>

										<div id="portfolio_content" class="row-fluid">
						                    <div class="span8 portfolio_post">
						                        <h2><?php the_title(); ?></h2>
						                        <?php the_content(); ?>
						                        <div class="clearfix"></div>
						                        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						                    </div>
						                    


						                    <div class="span4 portfolioItem_sidebar">
						                        <ul class="unstyled custom_cats">
						                        	<?php
						                        	$portfolio_info_client = get_post_meta(get_the_ID(), 'mb_portfolio_info_client', true);
													$portfolio_info_url = get_post_meta(get_the_ID(), 'mb_portfolio_info_url', true);
													$portfolio_info_year = get_post_meta(get_the_ID(), 'mb_portfolio_info_year', true);
													$portfolio_info_agency = get_post_meta(get_the_ID(), 'mb_portfolio_info_agency', true);
													?>
						                            <?php if($portfolio_info_client){ echo "<li><strong>Client:</strong> ".$portfolio_info_client."</li>";} ?>
						                            <?php if($portfolio_info_url){ echo "<li><strong>URL:</strong> ".$portfolio_info_url."</li>";} ?>
						                            <?php if($portfolio_info_year){ echo "<li><strong>Year:</strong> ".$portfolio_info_year."</li>";} ?>
						                            <?php if($portfolio_info_agency){ echo "<li><strong>Agency:</strong> ".$portfolio_info_agency."</li>";} ?>
						                        </ul>
						                        <?php foreach((get_the_category()) as $category){  
						                        	echo '<a href="'.get_category_link($category->cat_ID).'" class="min_tag">'.$category->cat_name . '</a> ';
						                        
						                    	} ?>

						                        <?php the_tags('<ul class="fancy_tags"><li>','</li><li>','</li></ul>'); ?>
						                        
						                        <?php get_template_part( "socialbtns", "single-portfolio" ); ?>

						                        <div class="clearfix"></div>


						                    </div><!-- /portfolioItem_sidebar -->
						                </div><!-- /portfolio_content -->


		                            </article>


		                                    
		                                    
										
									
									
									<?php // comments_template(); ?>
									
                    
        		<?php endif; //password ?>
            <?php endwhile; 
			
			include (TEMPLATEPATH . '/framework/nav.php' );
			
			else: ?>
        
                    <article>
                        <p><?php _e('Sorry, but the requested resource was not found on this site.','eneaa'); ?></p>
                    </article>
        
            <?php endif; ?>
            
                  <?php get_template_part( "afterloop", "single-portfolio" ) ?> 

<?php get_footer(); ?>