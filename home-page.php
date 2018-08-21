<?php
/*
Template Name: Home Page 
*/
?>
<?php get_header(); ?>


		<?php get_template_part( "beforeloop", "portfolio" ) ?> 
        	
            <!--<h3 class="post_title"><?php wp_title(''); ?></h3>-->

          

            <?php
            //Flexslider
            get_template_part( "slider", "flexslider" );
            ?>


            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <?php the_content(); ?>             
                        
                    <?php endwhile; else: ?>
                                <article>
                                    <p><?php _e('Sorry, but the requested resource was not found on this site.','eneaa'); ?></p>
                                    <div class="clear"></div>
                                </article>
                    <?php endif; ?>




                    <div id="widget_area_home">
       
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('home-widgets')) : else : ?>
                            <?php endif; ?>
                            
                        <div class="clearfix"></div>
                    </div><!-- /widget_area_home-->
                    
              
        <?php  get_template_part( "afterloop", "fullwidth" ) ?> 

<?php get_footer(); ?>