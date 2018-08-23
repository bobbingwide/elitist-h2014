<?php get_header(); ?>

		<?php get_template_part( "beforeloop", "page" ) ?> 
                    
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
                        
                  <?php get_template_part( "afterloop", "page" ) ?> 

<?php get_footer(); ?>