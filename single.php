<?php get_header(); ?>


		<?php get_template_part( "beforeloop", "single" ) ?> 
                
                	<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                    	
                        <?php if ( post_password_required() ) : ?>
                            <div class="password_p">
                            	<?php the_content(); ?>
                            </div><!-- /password_p -->
        
                            <?php else : ?>
        
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >


                                  <div class="post_title">
          
                                      <?php get_template_part( "post_icon", "single" ); ?>

                                      <?php get_template_part( "post_title", "single" ); ?>

                                  </div><!-- /post_title -->
       
                                  <?php 
                                  if(!get_post_format()) {
                                         //Display the Post Image by default
                                         get_template_part( "post_image", "single" );
                                  } else {
                                         get_template_part('format', get_post_format());
                                  }
                                  ?>

                                  <div class="post_content row-fluid">
                                      
                                     

                                      <?php get_template_part( "meta", "single" ); ?> 

                                      

                                      <div class="entry">

                                          <?php the_content(__('Read more <i class="icon-arrow-right"></i>', 'eneaa')); ?>


                                          <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                          <?php the_tags('<ul class="fancy_tags"><li>','</li><li>','</li></ul>'); ?>
                                          <div class="clearfix"></div>
                          
                                          <?php get_template_part( "socialbtns", "single" ); ?>

                                      </div><!-- /entry -->

                                      <div class="clearfix"></div>

                                  </div><!-- /row-fluid -->


                                </article>
                                
                                <div class="clearfix"></div>
                                
                                <div id="single_widget_area">
	                                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('post-widgets')) : else : ?>
	                                <?php endif; ?>
                    			      </div><!-- /single_widget_area -->
                    			
                                <?php comments_template(); ?>
        
                    
                    
        		<?php endif; //password ?>
                
            <?php endwhile; else: ?>
        
                    <article>
                        <p><?php _e('Sorry, but the requested resource was not found on this site.','eneaa'); ?></p>
                    </article>
        
            <?php endif; ?>
            
                  <?php get_template_part( "afterloop", "single" ) ?> 

<?php get_footer(); ?>