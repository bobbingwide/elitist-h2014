<?php
/*
Template Name: Bootstrap Gallery
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
											?>

												<div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">

													<?php												
													foreach ($attachments as $attachment) {
														$meta_info = wp_get_attachment_metadata($attachment->ID);
														
														echo '<a rel="gallery" href="'. wp_get_attachment_url($attachment->ID).'" style="margin-left:5px;">';
															echo '<img src="'.get_template_directory_uri().'/framework/timthumb.php?src='.wp_get_attachment_url($attachment->ID).'&amp;w=150&amp;h=150" alt="" title="" />';
														echo '</a>';
															
													}//foreach	
													?>
												</div><!-- gallery_boot -->

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


<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade modal-fullscreen">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
        <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
        <a class="btn modal-download" target="_blank"><i class="icon-download"></i> Download</a>
    </div>
</div>
<!-- end modal-gallery-->
                    
                          <?php get_template_part( "afterloop", "fullwidth" ) ?> 

<?php get_footer(); ?>