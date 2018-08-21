<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6" <?php language_attributes(); if(is_single()){echo ' itemscope itemtype="http://schema.org/Article"';} ?>> <![endif]-->
<!--[if IE 7]>    <html class="ie7" <?php language_attributes(); if(is_single()){echo ' itemscope itemtype="http://schema.org/Article"';} ?>> <![endif]-->
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); if(is_single()){echo ' itemscope itemtype="http://schema.org/Article"';} ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); if(is_single()){echo ' itemscope itemtype="http://schema.org/Article"';} ?>> <!--<![endif]-->

	<head>

		
		<meta charset="<?php bloginfo('charset'); ?>">
        <!--[if lt IE 9]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        
        <?php if (is_search()) { ?>
	   	<meta name="robots" content="noindex, nofollow" /> 
		<?php } ?>
        
		<title>
		   <?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 */
			global $page, $paged;
		
			wp_title( '|', true, 'right' );
		
			// Add the blog name.
			//bloginfo( 'name' );

			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'eneaa' ), max( $paged, $page ) );
		
			?>
		</title>

		<meta name="description" content="<?php bloginfo('description'); ?>">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        

        
        
       	<!-- WP_Head -->
        	<?php wp_head(); ?>
        <!-- /WP_Head -->
        
        
        
        <!-- html5shiv -->
        <!--[if lt IE 9]>
        	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		

        
        
        <!-- Facebook and Google +1 Tags -->
        <?php 
		if(is_single()){
			$desc_f = "";
			if (have_posts()) : 
			while (have_posts()) : the_post(); 
	        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	        $desc_f = get_the_excerpt();
			endwhile; 
			endif;
			$facebook_id = of_get_option('facebook_id');
			?>
	        <meta property="og:title" content="<?php wp_title("",true); echo " | "; bloginfo('name'); ?>" />
	        <meta property="og:description" content="<?php echo $desc_f; ?>" />
	        <meta property="og:type" content="article" />
	        <meta property="og:url" content="<?php the_permalink(); ?>" />
	        <meta property="og:image" content="<?php echo $thumbnail[0]; ?>" />
	        <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	        <meta property="fb:admins" content="<?php echo $facebook_id; ?>" />
	        
			<!-- Google +1 -->
			<meta itemprop="name" content="<?php wp_title("",true); ?>">
			<meta itemprop="image" content="<?php echo $thumbnail[0]; ?>">
        <?php } ?>
       

	</head>
    
    
	<body <?php body_class(THEME_SLUG.' ver'.THEME_VERSION); ?>>







 <div id="wrap">


 	<div id="content_wrap" class="<?php if(of_get_option('site_layout') !== "fullwidth"){echo "container"; } ?>"><!-- /container (narrow content) -->
    
   	 	

    	<header id="header" class="row-fluid">
        	


        	<div class="logo_container span5">
                <h1><a href="<?php echo home_url(); ?>/"><?php if($logo = of_get_option('logo')){ ?><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"  /><?php }else{ bloginfo('name');}?></a></h1>
                <p><?php bloginfo('description'); ?></p>
            </div><!-- /logo_container -->


            <div class="navbar">
			     


			   


		        <nav id="jqueryslidemenu" class="jqueryslidemenu">            	
					<?php            

		                    if ( has_nav_menu( 'menu-1' ) ){ 
								wp_nav_menu( array(                     
		                        'theme_location'  => 'menu-1',
		                        'container'       => '',
		                        'items_wrap'      => '<ul class="nav">%3$s</ul>',
		                    )); 
							}else{
								echo "<ul class='nav'>";
								wp_list_pages( array(
									'title_li'     => '')
								);
								echo "</ul>";
							}; 
		            ?>
		            	            
		
                        </nav>

			<div id="filter_lists">                     
			</div><!-- /filter_lists -->    </div><!-- /navbar -->




        </header>

            <div id="container" >	