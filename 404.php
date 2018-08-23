	<?php get_header(); ?>
		<?php get_template_part( "beforeloop", "fullwidth" ) ?> 
                        
                                 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                                            
                                                <h2>Error 404 - Not Found</h2>
                                            
                                            <p>Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.</p>
                                            
                                        <div class="clear"></div>
                                                
                                 </article>
                            <?php get_template_part( "afterloop", "fullwidth" ) ?> 
	
	<?php get_footer(); ?>