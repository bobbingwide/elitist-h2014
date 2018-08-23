<div class="content_wrap">            
            <div class="page_title">
                   <?php if(!is_single()){ ?>
                            <?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
                            <?php if (is_category()) { ?>
                            
                            <h2><?php printf(__('Archive for the &ldquo;%s&rdquo; Category', 'eneaa'), single_cat_title('', false));  ?></h2>
                
                            <?php } elseif(is_tag()) { ?>
                            <h2><?php printf(__('Posts Tagged &ldquo;%s&rdquo;', 'eneaa'), single_tag_title('', false));  ?></h2>
                
                            <?php } elseif (is_day()) { ?>
                            <h2><?php printf(__('Archive for %s', 'eneaa'), get_the_time('F jS, Y'));  ?></h2>
                
                            <?php } elseif (is_month()) { ?>
                            <h2><?php printf(__('Archive for %s', 'eneaa'), get_the_time('F Y'));  ?></h2>
                
                            <?php } elseif (is_year()) { ?>
                            <h2><?php printf(__('Archive for %s', 'eneaa'), get_the_time('Y'));  ?></h2>
                
                            <?php } elseif (is_author()) { ?>
                            <h2><?php _e('Author Archive', 'eneaa');  ?></h2>
                
                            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            <h2><?php _e('Blog Archives', 'eneaa');  ?></h2>
                
                            <?php } ?>
                        
                        <?php } ?>

                    <div id="breadcrumbs">
                            <?php breadcrumbs();?>
                            <div class="clear"></div>
                    </div><!-- /breadcrumbs -->
                    <div class="clearfix"></div>
            </div><!-- /page_title -->


                <div id="main" role="main" class="row-fluid">
                            
                
                    <section id="content" class="span8">