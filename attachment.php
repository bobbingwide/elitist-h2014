<?php get_header(); ?>


		<?php get_template_part( "beforeloop", "attachment" ) ?> 
                
                	<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
        
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                            

                           
                                    <?php 
                                    if(!get_post_format()) {
                                           //Display the Post Image by default
                                           get_template_part( "post_image", "attachment" );

                                      } else {
                                           get_template_part('format', get_post_format());
                                      }
                                    ?> 
                                    <div class="post_content row-fluid">
                                
                                        <div class="span12 entry">
                                            <?php get_template_part( "post_icon", "attachment" ); ?>
                                    

                                                <?php get_template_part( "post_title", "attachment" ); ?>



                                            <?php echo preg_replace('/&lt;img[^&gt;]+./','',get_the_content()); ?>

    
                                        </div><!-- /entry -->

                                        <div class="clearfix"></div>

                                    </div><!-- /row-fluid -->
                    </article>
                    
                    <div class="clearfix"></div>
                    
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('post-widgets')) : else : ?>
					<?php endif; ?>
        
                    <?php comments_template(); ?>
        
                    
                    
        
            <?php endwhile; else: ?>
        
                    <article>
                        <p>Sorry, no posts matched your criteria.</p>
                    </article>
        
            <?php endif; ?>
            <?php get_template_part( "afterloop", "attachment" ) ?> 

<?php get_footer(); ?>