<?php
/*
Template Name: Galleria
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
                        
                                
                                    <article id="post-<?php the_ID(); ?>" class="post">
                                    
											
                                        
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
												echo '<script src="'.get_template_directory_uri().'/js/galleria/galleria-1.2.7.min.js"></script>';
                                                echo '<script src="'.get_template_directory_uri().'/js/galleria/themes/classic/galleria.classic.min.js"></script>';
											?>
												<script type="text/javascript">
												jQuery(document).ready(function($) {
													 $('#galleria').galleria({
													
														height:600,
														responsive:true,
														extend: function(options) {
															this.bind('image', function(e) {
																$(e.imageTarget).click(this.proxy(function() {
																   this.openLightbox();
																}));
															});
														}
													});
												});
											</script>
												<?php
												/*
												echo '<div id="galleria">';
												foreach ($attachments as $attachment) {
													$meta_info = wp_get_attachment_metadata($attachment->ID);
													echo '<a rel="'. wp_get_attachment_url($attachment->ID).'" href="'. wp_get_attachment_url($attachment->ID).'"><img src="'.get_template_directory_uri().'/framework/timthumb.php?src='.wp_get_attachment_url($attachment->ID).'&amp;w=750" alt="'.$attachment->post_content.'" title="'.$attachment->post_title.'"></a>';
														
												}//foreach	
												echo '</div>';
												*/
												
												
												echo '<div id="galleria">';
												foreach ($attachments as $attachment) {
													$meta_info = wp_get_attachment_metadata($attachment->ID);
													
													
													echo '<a rel="'. wp_get_attachment_url($attachment->ID).'" href="'. wp_get_attachment_url($attachment->ID).'">';
													if($meta_info[image_meta][caption] == "" || $meta_info[image_meta][title] ==""){
														echo '<img src="'.get_template_directory_uri().'/framework/timthumb.php?src='.wp_get_attachment_url($attachment->ID).'&amp;w=550" alt="" title="" />';
													}else{
														echo '<img src="'.get_template_directory_uri().'/framework/timthumb.php?src='.wp_get_attachment_url($attachment->ID).'&amp;w=550" alt="'.$meta_info[image_meta][caption].'" title="'.$meta_info[image_meta][title].'" />';
													}
													echo '</a>';
														
												}//foreach	
												
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