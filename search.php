<?php get_header(); ?>
		<?php get_template_part( "beforeloop", "search" ) ?> 

					<?php if (have_posts()) : ?>
        
                    
                        
        
                        <?php while (have_posts()) : the_post(); ?>
        
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
     

                                <div class="post_content row-fluid">
                                    
                                    <div class="span12 entry">



                                        <?php get_template_part( "post_title", "index" ); ?>

                                        <?php
                                        get_template_part( "meta", "index" );
                                        ?> 


                                        <?php the_excerpt(); ?>

                                    </div><!-- /entry -->

                                    <div class="clearfix"></div>

                                </div><!-- /row-fluid -->
      
                            </article>
        
                        <?php endwhile; ?>
        
                        
                   
                    <?php include (TEMPLATEPATH . '/framework/nav.php' );?>
        
                    <?php else : ?>
        
                    <article>
                        <h2 class="post_title">Not Found</h2>
                        <p>Sorry, but the requested resource was not found on this site.</p>
                        <div class="clear"></div>
                    </article>
        
                    <?php endif; ?>
                    
              <?php get_template_part( "afterloop", "search" ) ?> 

<?php get_footer(); ?>