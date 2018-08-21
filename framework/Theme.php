<?php
if(!class_exists('Theme')){
/**
 * Theme Class
 */
class Theme {

	/**
	 * Here are loaded all the initial files, constant, etc.
	 */
	function __construct($theme_info){
	

		/* Define theme's constants. */
		$this->constants($theme_info);
		
		/* Add support for lenguages */
		$this->lenguages();

		/* Add Stylesheets for the Theme (CSS) */
		$this->stylesheets();

		/* Add JS Scripts for the Theme (JS) */
		$this->scripts();
		
		/* Clean <head> */
		$this->clean_header();
		
		/* Add Theme support */
		$this->theme_support();

		/* Create the Admin Panel */
		$this->admin();
		
		/* Add Theme Functions */
		$this->theme_functions();
		
		/* Register Post Types */
		$this->post_types();
		
		/* Create all the custom Meta Boxes */
		$this->meta_boxes();
		
		/* Create all the widget areas */
		$this->widget_areas();
		
		/* Widgets */
		$this->widgets();
		
		/* Shortcodes */
		$this->shortcodes();
		
		
		
		
		/* Set the Full Width Image value */
		if ( ! isset( $content_width ) ) $content_width = 900;
		
		/* Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553 */
		@ini_set('pcre.backtrack_limit', 500000);
	}
	
	
	
	
	/**
	 * Defines the constant paths for use within the theme.
	 */
	private function constants($theme_info) {
		define('THEME_NAME', $theme_info['theme_name']);
		define('THEME_SLUG', $theme_info['theme_slug']);
		define('THEME_VERSION', $theme_info['theme_version']);
		define('THEME_AUTHOR', $theme_info['theme_author']);
		define('THEME_AUTHOR_URI', $theme_info['theme_author_uri']);
		define('THEME_DIR', get_template_directory());
		define('THEME_URI', get_template_directory_uri());
		
		define('THEME_CSS', THEME_URI . '/css');
		define('THEME_JS', THEME_URI . '/js');

		define('THEME_FRAMEWORK', THEME_DIR . '/framework');
		define('THEME_FRAMEWORK_URI', THEME_URI . '/framework');

		define('THEME_ADMIN', THEME_FRAMEWORK_URI . '/admin');
		define('THEME_FUNCTIONS', THEME_FRAMEWORK . '/functions');
		define('THEME_SCRIPTS', THEME_FRAMEWORK . '/theme_scripts');
		define('THEME_POST_TYPES', THEME_FRAMEWORK . '/post_types');
		define('THEME_META_BOXES', THEME_FRAMEWORK . '/meta_boxes');
		define('THEME_META_BOXES_URI', THEME_FRAMEWORK_URI . '/meta_boxes');
		define('THEME_WIDGET_AREAS', THEME_FRAMEWORK . '/widget_areas');
		define('THEME_WIDGETS', THEME_FRAMEWORK . '/widgets');
		define('THEME_SHORTCODES', THEME_FRAMEWORK . '/shortcodes');
		define('THEME_FULLSCREEN', THEME_FRAMEWORK . '/fullscreen');
		
		define('THEME_LENGUAGES', THEME_DIR . '/languages');
	}
	
	
	
	
	/**
	 * Load the lenguage for the Theme
	 */
	public function lenguages(){

		load_theme_textdomain( 'eneaa', THEME_LENGUAGES );
		$locale = get_locale();
		$locale_file = THEME_LENGUAGES."/$locale.php";
		if ( is_readable($locale_file) )
			require_once($locale_file);
	}
	

	
	/**
	 * Add Stylesheets for the Theme (CSS)
	 */
	public function stylesheets(){

		//Stylesheets
		require_once (THEME_SCRIPTS . "/stylesheets.php");
		//Custom Styles from Admin Panel
		require_once (THEME_SCRIPTS . "/styles.php");
		
	}



	/**
	 * Add JS Scripts for the Theme (JS)
	 */
	public function scripts(){

		//Stylesheets
		require_once (THEME_SCRIPTS . "/scripts.php");
		
	}

	
	
	/**
	 * Clean up the <head>
	 * remove some WP defaults
	 */
	public function clean_header(){
          //bw_trace2();
          //bw_backtrace();
          if ( !function_exists( "removeHeadLinks" ) ) {
          
		function removeHeadLinks() {
			// remove simple discovery link
			remove_action('wp_head', 'rsd_link');
			// remove windows live writer link
			remove_action('wp_head', 'wlwmanifest_link');
			// remove the version number
			remove_action('wp_head', 'wp_generator');
			// remove header links
		}
		add_action('init', 'removeHeadLinks');
          }                
	}
	
	
	
	
	/**
	 * Add Theme Support
	 */
	public function theme_support(){
		// Add RSS links to <head> section
		add_theme_support('automatic-feed-links');
		
		//Add Menu Manager---------------------------
		add_theme_support( 'nav-menus' );
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus( array('menu-1' => __( 'Navigation Menu' , 'quemalabs_admin'), 'subfooter-menu' => __( 'Sub Footer Menu' , 'quemalabs_admin') ));
		}

		add_filter( 'nav_menu_css_class', 'additional_active_item_classes', 10, 2 );
		function additional_active_item_classes($classes = array(), $menu_item = false){

			if(in_array('current-menu-item', $menu_item->classes)){
				//$classes[] = 'active';
			}

			return $classes;
		}
		//End Menu Manager---------------------------
	}
	
	
	
	/**
	 * Add Theme Support
	 */
	public function theme_functions(){
		//Custom Comments
		require_once (THEME_FUNCTIONS . "/custom_comments.php");
		
		//Portfolio Generator
		require_once (THEME_FUNCTIONS . "/portfolio_generator.php");
		
		//Sidebar Generator
		require_once (THEME_FUNCTIONS . "/sidebar_generator.php");
		
		//Cufon Functions
		require_once (THEME_FUNCTIONS . '/cufon_functions.php');
		
		//Breadcrumbs
		require_once (THEME_FUNCTIONS . "/breadcrumbs.php");
		
		//Theme Pagination
		require_once (THEME_FUNCTIONS . "/pagination.php");
		
		//Single Functions
		require_once (THEME_FUNCTIONS . "/single_functions.php");

		//Option Panel Functions (Favicon, Google Analytics code, etc.)
		require_once (THEME_FUNCTIONS . "/option_panel.php");
		
		
	}
	
	
	
	
	/**
	 * Create all the custom Meta Boxes
	 */
	public function meta_boxes(){
		// Re-define meta box path and URL
		define( 'RWMB_URL', trailingslashit( THEME_META_BOXES_URI) );
		define( 'RWMB_DIR', trailingslashit( THEME_META_BOXES ) );

		// Include the meta box script
		require_once RWMB_DIR . 'meta-box.php';
		// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
		include THEME_META_BOXES . '/meta-box-usage.php';

	}

	
	
	
	/**
	 * Register all the Post Types
	 */
	public function post_types(){
		require_once (THEME_POST_TYPES . "/slider-post-types.php");
		require_once (THEME_POST_TYPES . "/portfolio-post-types.php");
	}
	
	
	
	/**
	 * Create all the widget areas
	 */
	public function widget_areas(){
		require_once (THEME_WIDGET_AREAS . "/widget_areas.php");
	}
	
	
	
	/**
	 * Widgets
	 */
	public function widgets(){
		//require_once (THEME_WIDGETS . "/social-share-widget.php");
		require_once (THEME_WIDGETS . "/related-posts.php");
		require_once (THEME_WIDGETS . "/social.php");
		require_once (THEME_WIDGETS . "/contact-info.php");
		require_once (THEME_WIDGETS . "/quick-contact.php");
		require_once (THEME_WIDGETS . "/twitter-widget.php");
		require_once (THEME_WIDGETS . "/advertisement_125.php");
		//require_once (THEME_WIDGETS . "/about_author_widget.php");
		require_once (THEME_WIDGETS . "/most-popular.php");
		require_once (THEME_WIDGETS . "/tags.php");
		//require_once (THEME_WIDGETS . "/testimonials.php");
		require_once (THEME_WIDGETS . "/suscribe_twitter_btn.php");
		//require_once (THEME_WIDGETS . "/latest_work.php");
		require_once (THEME_WIDGETS . "/post-tabs.php");
	}
	
	
	/**
	 * Shortcodes
	 */
	public function shortcodes(){
		require_once (THEME_SHORTCODES . '/columns.php'); //Columns
		require_once (THEME_SHORTCODES . '/lightbox.php'); //Lightbox
		require_once (THEME_SHORTCODES . '/video.php'); //Video
		require_once (THEME_SHORTCODES . '/typography.php'); //Typography
		require_once (THEME_SHORTCODES . '/buttons.php'); //Buttons
		require_once (THEME_SHORTCODES . '/cool_buttons.php'); //Buttons
		require_once (THEME_SHORTCODES . '/tabs.php'); //Tabs
		require_once (THEME_SHORTCODES . '/frames.php'); //Frames
		require_once (THEME_SHORTCODES . '/boxes.php'); //Boxes
		require_once (THEME_SHORTCODES . '/map.php'); //Map
		require_once (THEME_SHORTCODES . '/form.php'); //Form
		require_once (THEME_SHORTCODES . '/slogan.php'); //Slogan
		require_once (THEME_SHORTCODES . '/icon.php'); //Icon
		require_once (THEME_SHORTCODES . '/space_divider.php'); //Space Divider
		require_once (THEME_SHORTCODES . '/toggle.php'); //Toggle
		require_once (THEME_SHORTCODES . '/divider.php'); //Divider
		require_once (THEME_SHORTCODES . '/testimonials.php'); //testimonials
		require_once (THEME_SHORTCODES . '/sliding.php'); //sliding
		require_once (THEME_SHORTCODES . '/beforeafter.php'); //sliding
	}
	
	
	

	
	
	
	/**
	 * Create the Admin Panel
	 */
	public function admin(){
		/* 
		 * Loads the Options Panel
		 *
		 * If you're loading from a child theme use stylesheet_directory
		 * instead of template_directory
		 */
		 
		if ( !function_exists( 'optionsframework_init' ) ) {
			define( 'OPTIONS_FRAMEWORK_DIRECTORY', THEME_ADMIN . '/inc/' );
			require_once THEME_FRAMEWORK . '/admin/inc/options-framework.php';
		}
	}
	
	
	

}//class Theme

}//if !class_exists
?>