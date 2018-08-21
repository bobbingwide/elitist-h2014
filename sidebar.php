		<aside id="sidebar" class="span4">
        	     	
                
                <?php 
				
				//Select wich sidebar will be display
				$selected_sidebar_replacement = 'Sidebar Widgets'; //Default Sidebar
				
				//If is page or single.
				if(is_singular()){
					
					global $wp_query;
					$post = $wp_query->get_queried_object();
					$selected_sidebar_replacement = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
					
					//If default selected
					if($selected_sidebar_replacement == '0' || $selected_sidebar_replacement == ''){
						$selected_sidebar_replacement = 'Sidebar Widgets';
					}
					
					// Reset the global $the_post as this query will have stomped on it
					wp_reset_query();
	
				}
				
				
				
				
				if (function_exists('dynamic_sidebar') && dynamic_sidebar($selected_sidebar_replacement)) : else : ?>
                    
                    <div class="widget categories-widget">
                        <h4>Categories<i></i></h4>
                        <ul>
                           <?php wp_list_categories('show_count=0&title_li='); ?>
                        </ul>
                    </div>
   
    
                    <div class="widget">
                        <h4>Archives<i></i></h4>
                        <ul>
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>
                    </div>
    
                    <?php if ( is_404() || is_category() || is_day() || is_month() || is_year() || is_search() || is_paged() ) { ?>
    
                        <div class="widget">
                            <?php if (is_404()) { ?>
                            <p>Please contact us or try again with a new search using the form above.</p>
        
                            <?php } elseif (is_category()) { ?>
                            <p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
        
                            <?php } elseif (is_day()) { ?>
                            <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for the day <?php the_time('l, F jS, Y'); ?>.</p>
        
                            <?php } elseif (is_month()) { ?>
                            <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for <?php the_time('F, Y'); ?>.</p>
        
                            <?php } elseif (is_year()) { ?>
                            <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for the year <?php the_time('Y'); ?>.</p>
        
                            <?php } elseif (is_search()) { ?>
                            <p>You have searched the <a href="<?php echo home_url(); ?>/"><?php echo bloginfo('name'); ?></a> blog archives for <strong>'<?php the_search_query(); ?>'</strong>.</p>
        
                            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            <p>You are currently browsing the <a href="<?php echo home_url(); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>
        
                            <?php } ?>
                        </div>
                    
                    <?php }?>
                    
                    
                    <div class="widget">
                    	<?php wp_list_pages('title_li=<h4>Pages<i></i></h4>' ); ?>
                    </div>
                    
					
                    <div class="widget widget_tag">
                        <h4>Tags<i></i></h4>
                        
                        <?php wp_tag_cloud('format=list&smallest=12px&largest=12px'); ?>
                        <div class="clearfix"></div>
                        
                    </div>
                    
    
                    <?php if (is_home() || is_page() || is_single()) { ?>
                    
                    
                    <div class="widget">
                    	<?php wp_list_bookmarks('title_before=<h4>&title_after=<i></i></h4>'); ?>
                	</div>
    
                    <div class="widget">
                        <h4>Meta<i></i></h4>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <li><a href="http://validator.w3.org/check/referer" title="Built with valid HTML 5" rel="nofollow">Valid <abbr title="HyperText Markup Language">HTML</abbr> 5</a></li>
                            <li><a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fdiggingintowordpress.com%2FThemePlayground%2Fwp-content%2Fthemes%2FH5%2Fstyle.css&profile=css21&usermedium=all&warning=1&lang=en" title="Styled with valid CSS" rel="nofollow">Valid CSS 2.1</a></li>
                            <li><a href="http://wordpress.org/" title="Proudly Powered by WordPress" rel="nofollow">WordPress</a></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </div>
                    <?php } ?>
                <?php endif; ?>
                	<div class="clearfix bt"></div>
                     
                        
             <div class="clearfix"></div>
	            <div id="sidebar_bottom"></div>
           
		</aside>