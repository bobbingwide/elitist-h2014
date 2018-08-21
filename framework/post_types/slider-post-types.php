<?php

//Custom Post Types for Slider


		//Adding a new Taxonomy for Slider Categories
	add_action( 'init', 'build_taxonomies_slider', 0 );  
	function build_taxonomies_slider() {  
    	register_taxonomy( 'slides_categories', 'slides', array( 'hierarchical' => true, 'label' => 'Categories', 'query_var' => true, 'rewrite' => true ) ); 
	} 
	
	
		add_action( 'init', 'create_post_type' );
		
		function create_post_type() {
			
				register_post_type( 'slides',
				array(
				  'labels' => array(
					'name' => __( 'Slider Items', 'quemalabs_admin' ), //this name will be used when will will call the investments in our theme
					'singular_name' => __( 'Slider Item', 'quemalabs_admin' ),
					'add_new' => _x('Add New', 'slides', 'quemalabs_admin'),
					'add_new_item' => __('Add New Slider Item', 'quemalabs_admin'), //custom name to show up instead of Add New Post. Same for the following
					'edit_item' => __('Edit Slide', 'quemalabs_admin'),
					'new_item' => __('New Slide', 'quemalabs_admin'),
					'view_item' => __('View Slide', 'quemalabs_admin'),
				  ),
				  'public' => true,
				  'show_ui' => true,
				  'hierarchical' => false, //it means we cannot have parent and sub pages
				  'capability_type' => 'post', //will act like a normal post
				  'rewrite' => 'slides', //this is used for rewriting the permalinks
				  'query_var' => false,
				  'supports' => array( 'title',	'editor', 'thumbnail', 'excerpts', 'revisions'), //the editing regions that will support
				  'taxonomies' => array('slides_categories') // Adding Categories Boxes
				)
			  );

			}
			
			
			
	//Activate post-image functionality (WP 2.9+)
	if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );
	
	
	
	// Add to admin_init function
	add_filter('manage_edit-slides_columns', 'add_new_slides_columns');
	
	//Add Columns for Slides Post Types
	function add_new_slides_columns($slides_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';
		$new_columns['title'] = _x('Slider Item Title', 'column name', 'quemalabs_admin');
		$new_columns['thumbnail'] = __('Thumbnail', 'quemalabs_admin'); 
		$new_columns['author'] = __('Author', 'quemalabs_admin');
		$new_columns['slides_categories'] = __('Categories', 'quemalabs_admin');
		$new_columns['date'] = _x('Date', 'column name', 'quemalabs_admin');
		return $new_columns;
	}
	




function manage_slides_columns($column) {
	global $post;
	
	if ($post->post_type == "slides") {
		switch($column){
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
			case "slides_categories":
				$terms = get_the_terms($post->ID, 'slides_categories');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=slides&slides_categories=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'slides_categories', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('slides_categories');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_slides_columns', 10, 2);



	//Move the Featured Image from Right Side to the center
	add_action('do_meta_boxes', 'customposttype_image_box');
	function customposttype_image_box() {
		remove_meta_box( 'postimagediv', 'slides', 'side' );
		add_meta_box('postimagediv', __('Slide Image', 'quemalabs_admin'), 'post_thumbnail_meta_box', 'slides', 'normal', 'high');
	}
	//-------------------------------------------------------
	
	
	//Add Icon for Slides Post Types
	add_action('admin_head', 'plugin_header');
function plugin_header() {
        global $post_type;
	?>
	<style>

    #adminmenu #menu-posts-slides div.wp-menu-image{background:transparent url("<?php echo get_template_directory_uri();?>/images/admin_icons.png") no-repeat 7px -16px;}
	#adminmenu #menu-posts-slides:hover div.wp-menu-image,#adminmenu #menu-posts-slides.wp-has-current-submenu div.wp-menu-image{background:transparent url("<?php echo get_template_directory_uri();?>/images/admin_icons.png") no-repeat 7px 7px;}	
</style>
        <?php
}




?>