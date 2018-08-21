<div class="content_wrap">
            <div class="page_title">
                <?php 
                //Get the page ID even if is the Blog Page
                global $wp_query;
                $page_id = $wp_query->get_queried_object_id();
                ?>
                    <?php if(!is_single()){ ?>
                        <h2 class="line_title"><span><?php wp_title(''); ?></span></h2>
                        <?php } ?>
                    <?php 
                    $title_sub = get_post_meta($page_id, 'mb_title_sub', true);

                    if($title_sub != ""){ ?>
                        <p><?php echo $title_sub; ?></p> 
                    <?php } ?>

                    <div id="breadcrumbs">
                            <?php breadcrumbs();?>
                            <div class="clearfix"></div>
                    </div><!-- /breadcrumbs -->
                    <div class="clearfix"></div>
            </div><!-- /page_title -->


            
                <div id="main" role="main" class="row-fluid">
                            
                
                    <section id="content" class="span8">