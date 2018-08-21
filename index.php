<?php get_header(); ?>

     <?php get_template_part( "beforeloop", "index" ); ?>   
     
                	<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                    
						<?php if ( post_password_required() ) : ?>
                        <div class="password_p">
                        <?php the_content(); ?>
                        </div><!-- /password_p -->
    
                        <?php else : ?>
            
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

                            <div class="post_title">
          
                                <?php get_template_part( "post_icon", "index" ); ?>

                                <?php get_template_part( "post_title", "index" ); ?>

                            </div><!-- /post_title -->
 
                            <?php 
                            if(!get_post_format()) {
                                   //Display the Post Image by default
                                   get_template_part( "post_image", "index" );
                            } else {
                                   get_template_part('format', get_post_format());
                            }
                            ?>

                            <div class="post_content row-fluid">
                                
                                <div class="span3">

                                    <?php
                                    get_template_part( "meta", "index" );
                                    ?> 

                                </div><!-- /span3 -->

                                <div class="entry span9">

                                    <?php the_content(__('Read more <i class="icon-arrow-right"></i>', 'eneaa')); ?>

                                </div><!-- /entry -->

                                <div class="clearfix"></div>

                            </div><!-- /row-fluid -->
  
                        </article>


                        
                        <?php endif; //password ?>
        
                    <?php endwhile; ?>
        
                    <?php include (TEMPLATEPATH . '/framework/nav.php' );?>
        
                    <?php else : ?>
        
                    <article <?php post_class(); ?> >
                        <h3><?php _e('Not Found','eneaa'); ?></h3>
                        <p><?php _e('Sorry, but the requested resource was not found on this site.','eneaa'); ?></p>
                        
                    </article>
        
                    <?php endif; ?>
                    
              	<?php get_template_part( "afterloop", "index" ) ?> 

<?php get_footer(); ?>