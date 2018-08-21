

            <div class="clearfix"></div>

      </div><!-- /container -->


    
<?php if(!is_page_template('gallery-fullscreen.php')){ ?>
    
    <div class="footer_wrap ">
         <footer id="footer" class="content_wrap">
            <div class="row-fluid">


            	<div class="span3">
                        
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('first-footer-widgets')) : else : ?>
                                <div class="widget">
                                    <h4>Subscribe<i></i></h4>
                                    <ul>
                                        <li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
                                        <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
                                    </ul>
                                </div><!-- /widget -->
                            <?php endif; ?>
    
                        
                    </div><!-- /span3 -->
                    
                    
                    <div class="span3">
    
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('second-footer-widgets')) : else : ?>
                                <div class="widget">
                                   <h4>Categories<i></i></h4>
                                    <ul>
                                       <?php wp_list_categories('show_count=1&title_li='); ?>
                                    </ul>
                                </div><!-- /widget -->
                            <?php endif; ?>
                            
                    </div><!-- /span3 -->
                    
                    
                    <div class="span3">
                    
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('third-footer-widgets')) : else : ?>
                            <div class="widget">
                                <h4>Meta<i></i></h4>
                                <ul>
                                    <?php wp_register(); ?>
                                    <li><?php wp_loginout(); ?></li>
                                    <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
                                    <?php wp_meta(); ?>
                                </ul>
                            </div><!-- /widget -->
                        <?php endif; ?>
    
                    </div><!-- /span3 -->
                    
                    <div class="span3">
                    
                        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('fourth-footer-widgets')) : else : ?>
                            <div class="widget quick_contact">
                                <h4>Archives<i></i></h4>
                                <ul>
                                    <?php wp_get_archives('type=monthly'); ?>
                                </ul>
                            </div><!-- /widget -->
                        <?php endif; ?>
                        
                    </div><!-- /span3 -->

                    <div class="clear"></div>
        

                    </div><!-- /row -->
                </footer><!-- /footer -->


                
                <div class="clear"></div>
                
                <div class="sub_footer_wrap">
                    <div class="sub_footer content_wrap">
                        <div class="row-fluid">
                            <div class="span6">
                                 <p><?php $footer_text = of_get_option('footer_text'); if($footer_text){ echo stripslashes($footer_text);} ?></p>
                            </div>
                            
                            <div class="span6">
                                <?php
                                if ( has_nav_menu( 'subfooter-menu' ) ){ 
                                    wp_nav_menu( array(                     
                                        'theme_location'  => 'subfooter-menu',
                                        'container'       => '',
                                        'items_wrap'      => '<ul class="sub_footer_menu">%3$s</ul>',
                                    )); 
                                }
                                ?>

                            </div>
                        
                        </div><!-- /row -->
                    </div><!-- /sub_footer -->
                </div><!-- /sub_footer_wrap -->
                
                
                
           </div><!-- /footer_wrap -->

<?php }//if fullscreen gallery?>



           </div><!-- /.container (narrow content) -->




   
    
    </div><!-- /wrap -->
    
    
    
    
    
    
    
    
    
        
    <!-- WP_Footer --> 
    <?php wp_footer(); ?>
    <!-- /WP_Footer --> 

      
    </body>
</html>