<?php
/*
Template Name: Flex Gallery
*/
?>
<?php get_header(); ?>
		<?php get_template_part( "beforeloop", "fullwidth" ) ?> 
                
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            	<?php if ( post_password_required() ) : ?>
                                <div class="password_p">
                                    <?php the_content(); ?>
                                </div><!-- /password_p -->
            
                                <?php else : ?>
                        
                                
                                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                                    
											
                                        
                                            <?php the_content(); ?>
                                            
                                            
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
													?>
									                	<div class="flex-container">
											            	<div class="flexslider">
															  <ul class="slides">
															<?php
															foreach ($attachments as $attachment) {
																$meta_info = wp_get_attachment_metadata($attachment->ID);
																
																echo '<li><img src="'.get_template_directory_uri().'/framework/timthumb.php?src='.wp_get_attachment_url($attachment->ID).'&amp;w=940&amp;h=528"  alt="'.$attachment->post_title.'" /></li>';
																	
															}//foreach	
															?>
																</ul>
															</div><!-- /flexslider -->
														</div><!-- /flex-container -->




											            	<div class="flex_carousel">
															  <ul class="slides">
															<?php
															foreach ($attachments as $attachment) {
																$meta_info = wp_get_attachment_metadata($attachment->ID);
																
																echo '<li><img src="'.get_template_directory_uri().'/framework/timthumb.php?src='.wp_get_attachment_url($attachment->ID).'&amp;w=210&amp;h=118"  alt="'.$attachment->post_title.'" /></li>';
																	
															}//foreach	
															?>
																</ul>
															</div><!-- /flex_carousel -->
														






														
														<?php
													}//if count											
													?>
							                        
                                        
                                        
                                            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                            
                                            <div class="clear"></div>
                                           
                                     </article>
                                     
                            	<?php endif; //password ?>
                                
                        
                            <?php endwhile; else: ?>
                        
                                
                                    <article>
                                        <p>Sorry, no posts matched your criteria.</p>
                                    </article>
                               
                        
                            <?php endif; ?>
                    
                          <?php get_template_part( "afterloop", "fullwidth" ) ?> 

<?php get_footer(); ?>