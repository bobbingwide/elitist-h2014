<?php

//Custom Post Types for Portfolio



	//Adding a new Taxonomy for Portfolio Categories
	add_action( 'init', 'build_taxonomies', 0 );  
	function build_taxonomies() {  
	
		register_taxonomy( 'portfolio_categories', 'portfolio', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) ); 


		$portfolios = get_portfolios();
				if(is_array($portfolios) && !empty($portfolios)){
					foreach($portfolios as $portfolio){
						$portfolio_slug = name_to_class_portfolio($portfolio);

						register_taxonomy( $portfolio_slug.'_categories', $portfolio_slug, array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) ); 
						
					
						
					}//Foreach
					
				}//if is_array
	} 
	
	
		//Create Portfolio Post Type
		add_action( 'init', 'create_post_type_portfolio' );
		
		function create_post_type_portfolio() {
			
				register_post_type( 'portfolio',
				array(
				  'labels' => array(
					'name' => __( 'Portfolio', 'quemalabs_admin' ), //this name will be used when will will call the investments in our theme
					'singular_name' => __( 'Portfolio Item', 'quemalabs_admin' ),
					'add_new' => _x('Add New', 'portfolio', 'quemalabs_admin'),
					'add_new_item' => __('Add New Portfolio Item', 'quemalabs_admin'), //custom name to show up instead of Add New Post. Same for the following
					'edit_item' => __('Edit Portfolio', 'quemalabs_admin'),
					'new_item' => __('New Portfolio', 'quemalabs_admin'),
					'view_item' => __('View Portfolio', 'quemalabs_admin'),
				  ),
				  'public' => true,
				  'show_ui' => true,
				  'hierarchical' => false, //it means we cannot have parent and sub pages
				  'capability_type' => 'post', //will act like a normal post
				  'rewrite' => 'portfolio', //this is used for rewriting the permalinks
				  'query_var' => false,
				  'supports' => array( 'title',	'editor', 'thumbnail', 'excerpts', 'revisions', 'comments'), //the editing regions that will support
				  'taxonomies' => array('portfolio_categories') // Adding Categories Boxes
				  
				)
			  );
				
				
				//------------------------------------------------------------------------------------
				$portfolios = get_portfolios();
				if(is_array($portfolios) && !empty($portfolios)){
					foreach($portfolios as $portfolio){
						$portfolio_slug = name_to_class_portfolio($portfolio);
						
						
							register_post_type( $portfolio_slug,
							array(
							  'labels' => array(
								'name' =>  $portfolio , //this name will be used when will will call the investments in our theme
								'singular_name' => __( 'Portfolio Item', 'quemalabs_admin' ),
								'add_new' => _x('Add New', 'portfolio', 'quemalabs_admin'),
								'add_new_item' => __('Add New Portfolio Item', 'quemalabs_admin'), //custom name to show up instead of Add New Post. Same for the following
								'edit_item' => __('Edit Portfolio', 'quemalabs_admin'),
								'new_item' => __('New Portfolio', 'quemalabs_admin'),
								'view_item' => __('View Portfolio', 'quemalabs_admin'),
							  ),
							  'public' => true,
							  'show_ui' => true,
							  'hierarchical' => false, //it means we cannot have parent and sub pages
							  'capability_type' => 'post', //will act like a normal post
							  'rewrite' => $portfolio_slug, //this is used for rewriting the permalinks
							  'query_var' => false,
							  'supports' => array( 'title',	'editor', 'thumbnail', 'excerpts', 'revisions', 'comments'), //the editing regions that will support
							  'taxonomies' => array($portfolio_slug.'_categories') // Adding Categories Boxes
							  
							)
						  );
						
						
					}//Foreach
					
				}//if is_array
				//------------------------------------------------------------------------------------

			}//create_post_type_portfolio
			
			
			
	//Activate post-image functionality (WP 2.9+)
	if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
	
	
	
	// Add to admin_init function
	add_filter('manage_edit-portfolio_columns', 'add_new_portfolio_columns');
	
	//Add Columns for Slides Post Types
	function add_new_portfolio_columns($portfolio_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';
		$new_columns['title'] = _x('Portfolio Item Title', 'column name', 'quemalabs_admin');
		$new_columns['thumbnail'] = __('Thumbnail', 'quemalabs_admin'); 
		$new_columns['author'] = __('Author', 'quemalabs_admin');
		$new_columns['portfolio_categories'] = __('Categories', 'quemalabs_admin');
		$new_columns['date'] = _x('Date', 'column name', 'quemalabs_admin');
		return $new_columns;
	}
	
function manage_portfolio_columns($column) {
	global $post;
						
	
								if ($post->post_type == "portfolio") {
									switch($column){
										case 'thumbnail':
											echo the_post_thumbnail('thumbnail');
											break;
										case "portfolio_categories":
											$terms = get_the_terms($post->ID, 'portfolio_categories');
											
											if (! empty($terms)) {
												foreach($terms as $t)
													$output[] = "<a href='edit.php?post_type=portfolio&portfolio_categories=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio_categories', 'display')) . "</a>";
												$output = implode(', ', $output);
											} else {
												$t = get_taxonomy('portfolio_categories');
												$output = "No $t->label";
											}
											
											echo $output;
											break;
									}
								}
								
							
}
add_action('manage_posts_custom_column', 'manage_portfolio_columns', 10, 2);



	//Add Icon for Slides Post Types
	add_action('admin_head', 'plugin_header_portfolio');
function plugin_header_portfolio() {
        global $post_type;
			?>
	<style>

    #adminmenu #menu-posts-portfolio div.wp-menu-image{background:transparent url("<?php echo get_template_directory_uri();?>/images/admin_icons.png") no-repeat -19px -17px;}
	#adminmenu #menu-posts-portfolio:hover div.wp-menu-image,#adminmenu #menu-posts-portfolio.wp-has-current-submenu div.wp-menu-image{background:transparent url("<?php echo get_template_directory_uri();?>/images/admin_icons.png") no-repeat -19px 6px;}	
	 #icon-edit.icon32-posts-portfolio {background: url(<?php echo get_template_directory_uri() ?>/images/portfolio-32x32.png) no-repeat;}
</style>
        <?php
		
		//------------------------------------------------------------------------------------
				$portfolios = get_portfolios();
				if(is_array($portfolios) && !empty($portfolios)){
					foreach($portfolios as $portfolio){
						$portfolio_slug = name_to_class_portfolio($portfolio);
	?>
	<style>

    #adminmenu #menu-posts-<?php echo strtolower($portfolio_slug); ?> div.wp-menu-image{background:transparent url("<?php echo get_template_directory_uri();?>/images/admin_icons.png") no-repeat -19px -17px;}
	#adminmenu #menu-posts-<?php echo strtolower($portfolio_slug); ?>:hover div.wp-menu-image,#adminmenu #menu-posts-<?php echo $portfolio_slug; ?>.wp-has-current-submenu div.wp-menu-image{background:transparent url("<?php echo get_template_directory_uri();?>/images/admin_icons.png") no-repeat -19px 6px;}	
	 #icon-edit.icon32-posts-<?php echo strtolower($portfolio_slug); ?> {background: url(<?php echo get_template_directory_uri() ?>/images/portfolio-32x32.png) no-repeat;}
</style>
        <?php
					}//Foreach
					
				}//if is_array
				//------------------------------------------------------------------------------------
}




?>