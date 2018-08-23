<?php
/*
Lines modifded in the Options Framework for Quema Labs Themes
options-medialibrary-uploader.php 12, 13
options-framework.php 75, 76, 171, 172, 192

*/


/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'quemalabs_admin'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'quemalabs_admin'),
		'two' => __('Two', 'quemalabs_admin'),
		'three' => __('Three', 'quemalabs_admin'),
		'four' => __('Four', 'quemalabs_admin'),
		'five' => __('Five', 'quemalabs_admin')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'quemalabs_admin'),
		'two' => __('Pancake', 'quemalabs_admin'),
		'three' => __('Omelette', 'quemalabs_admin'),
		'four' => __('Crepe', 'quemalabs_admin'),
		'five' => __('Waffle', 'quemalabs_admin')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '13px',
		'face' => 'Helvetica',
		'style' => 'normal',
		'color' => '#737373' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => false,
		'faces' => array( 'Helvetica' => '"Helvetica Neue", Helvetica, sans-serif','Verdana' => 'Verdana','Georgia' => 'Georgia','Trebuchet' => 'Trebuchet', 'Tahoma' => 'Tahoma' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => '#737373'
	);

	//True/False options
	$options_true_false = array("true" => "True","false" => "False");

	//Optins for Cufon list
	$options_cufon = array();	
	foreach(theme_cufon_get_fonts() as $font_name => $file_name){
					$options_cufon[$file_name] =$font_name;
	}

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  THEME_ADMIN . '/images/';











	$options = array();

	$options[] = array(
		'name' => __('General Settings', 'quemalabs_admin'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Theme Info', 'quemalabs_admin'),
		'desc' => '<strong>Name:</strong> '. THEME_NAME . '<br />' .
					'<strong>Version:</strong> '. THEME_VERSION . '<br />' .
					'<strong>Author:</strong> ' . THEME_AUTHOR,
		'type' => 'info');

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Custom Logo', 'quemalabs_admin'),
		'desc' => __("Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)", 'quemalabs_admin'),
		'id' => 'logo',
		'type' => 'upload');
					
	$options[] = array(
		'name' => __('Custom Favicon', 'quemalabs_admin'),
		'desc' => __("Upload a 16px x 16px Png/Gif image that will represent your website's favicon.", 'quemalabs_admin'),
		'id' => 'custom_favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Footer Text', 'quemalabs_admin'),
		'desc' => __('Custom HTML and Text that will appear at the bottom of your site.', 'quemalabs_admin'),
		'id' => 'footer_text',
		'type' => 'textarea',
		'std' => "Copyright &copy; ".date('Y')." <a href='".get_bloginfo('url')."' title='".get_bloginfo('name')."'>".get_bloginfo('name')."</a>.");
										
    $options[] = array(
		'name' => __('Tracking Code', 'quemalabs_admin'),
		'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'quemalabs_admin'),
		'id' => 'google_analytics',
		'std' => '',
		'type' => 'textarea');

    $options[] = array(
		'name' => __('Facebook ID', 'quemalabs_admin'),
		'desc' => __("Go to your Profile Page and click on your Profile Picture, you will find your ID on the URL bar: <a href='http://cl.ly/7Ao6' target='_blank'>http://cl.ly/7Ao6</a>. Or use this site: <a href='http://findmyfacebookid.com/' target='_blank'>findmyfacebookid.com/</a>", 'quemalabs_admin'),
		'id' => 'facebook_id',
		'std' => '',
		'type' => 'text');








    $options[] = array(
		'name' => __('Styling Options', 'quemalabs_admin'),
		'type' => 'heading');


    $options[] = array(
		'name' => __('Featured Color', 'quemalabs_admin'),
		'desc' => __('Select the featured color for the Theme.', 'quemalabs_admin'),
		'id' => 'featured_color',
		'std' => '#FFFFFF',
		'type' => 'color' );

    $options[] = array(
		'name' => __('Background Color', 'quemalabs_admin'),
		'desc' => __('Select the background color for the Theme.', 'quemalabs_admin'),
		'id' => 'background_color',
		'std' => '#000000',
		'type' => 'color' );

    $options[] = array( 
    	'name' => __('Content Typography', 'quemalabs_admin'),
		'desc' => __('This change the content typography.', 'quemalabs_admin'),
		'id' => "content_typograpy",
		'std' => array('size' => '13px','face' => 'Helvetica','style' => 'normal','color' => '#FFFFFF'),
		'type' => 'typography',
		'options' => $typography_options);

    $options[] = array( 
    	'name' => __('Links Typography', 'quemalabs_admin'),
		'desc' => __('This change the links in the content.', 'quemalabs_admin'),
		'id' => "links_typograpy",
		'std' => array('size' => '13px','face' => 'Helvetica','style' => 'normal','color' => '#FFFFFF'),
		'type' => 'typography',
		'options' => $typography_options);


   

    $options[] = array(
		'name' => __('Site Layout', 'quemalabs_admin'),
		'desc' => __('Choose the layout for your site. Default, Full width or Wrap', 'quemalabs_admin'),
		'id' => "site_layout",
		'std' => "normal",
		'type' => "images",
		'options' => array(
			'normal' => $imagepath . 'normal.png',
			'fullwidth' => $imagepath . 'fullwidth.png',
			'wrap' => $imagepath . 'wrap.jpg')
	);


	$url =  THEME_URI . '/images/grid-patterns/';
	$options[] = array( "name" => __('Background Pattern', 'quemalabs_admin'),
						"desc" => __('Select your background pattern.', 'quemalabs_admin'),
						"id" => "background_pattern",
						"std" => "none",
						"type" => "images",
						"options" => array(
							'pattern1.png' => $url . 'preview/pattern1.png',
							'pattern2.png' => $url . 'preview/pattern2.png',
							'noise1.png' => $url . 'preview/noise1.png',
							'grid1.png' => $url . 'preview/grid1.png',
							'grid2.png' => $url . 'preview/grid2.png',
							'grid3.png' => $url . 'preview/grid3.png',
							'grid4.png' => $url . 'preview/grid4.png',
							'grid5.png' => $url . 'preview/grid5.png',
							'grid6.png' => $url . 'preview/grid6.png',
							'grid7.png' => $url . 'preview/grid7.png',
							'grid8.png' => $url . 'preview/grid8.png',
							'grid12.png' => $url . 'preview/grid12.png',
							'elegant1.png' => $url . 'elegant1.png',
							'elegant2.png' => $url . 'elegant2.png',
							'none' => $url . 'preview/none.png'
							
							));


    $options[] = array( "name" => __('Background Image', 'quemalabs_admin'),
						"desc" => __('Upload an image for your background', 'quemalabs_admin'),
						"id" => "background_image",
						"std" => "",
						"type" => "upload");


     $options[] = array(
		'name' => __('Custom CSS', 'quemalabs_admin'),
		'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'quemalabs_admin'),
		'id' => 'custom_css',
		'std' => '',
		'type' => 'textarea');










	$options[] = array( 'name' => __('Typography Options', 'quemalabs_admin'),
		'type' => 'heading');
		


	$options[] = array(
		'name' => __('Font Systems', 'quemalabs_admin'),
		'desc' => __('Use a font system, Cufon or Google Fonts', 'quemalabs_admin'),
		'id' => 'font_system',
		'std' => false,
		'type' => 'checkbox' );

	
	$options[] = array(
		'name' => __('Select System', 'quemalabs_admin'),
		'desc' => __('Select between Cufon or Google Fonts.', 'quemalabs_admin'),
		'id' => 'selected_font_system',
		'std' => 'google_font',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => array("google_font" => "Google Font","cufon" => "Cufon"));

	$options[] = array(
		'name' => __('Cufon Fonts', 'quemalabs_admin'),
		'desc' => __('Choose a Cufon font for Headings and Menu.', 'quemalabs_admin'),
		'id' => 'cufon_font',
		'std' => 'PT_Sans_Bold_700.font.js',
		'type' => 'radio',
		"custom" => "cufon",
		'options' => $options_cufon);

	
	$options[] = array( 'name' => 'Google Fonts',
		'desc' => 'Some of the best fonts on <a href="http://www.google.com/webfonts">google fonts</a>.',
		'id' => 'google_font',
		'std' => array( 'size' => '36px', 'face' => 'PT Sans, sans-serif', 'color' => '#00bc96'),
		'type' => 'typography',
		'options' => array(
			'faces' => options_typography_get_google_fonts(),
			'styles' => false,
			'sizes' => false,
			'color' => false )
		);


	





	$options[] = array(
		'name' => __('Slider Options', 'quemalabs_admin'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Flexslider', 'options_framework_theme'),
		'desc' => __('Below are the options for the Flex Slider', 'options_framework_theme'),
		'type' => 'info');

	$options_select = array("fade" => "fade", "slide" => "slide");
	$options[] = array(
		'name' => __('Animation', 'quemalabs_admin'),
		'desc' => '',
		'id' => 'slider_animation_flex',
		'std' => 'fade',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);

	$options[] = array(
		'name' => __('Animation Speed', 'quemalabs_admin'),
		'desc' => __('Set the speed of animations, in milliseconds,', 'quemalabs_admin'),
		'id' => 'slider_animationspeed_flex',
		'std' => '500',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slideshow Speed', 'quemalabs_admin'),
		'desc' => __('Set the speed of the slideshow cycling, in milliseconds.', 'quemalabs_admin'),
		'id' => 'slider_slideshowspeed_flex',
		'std' => '7000',
		'class' => 'mini',
		'type' => 'text');

	$options_select = array("true" => "true","false" => "false");
	$options[] = array(
		'name' => __('Pause on Hover', 'quemalabs_admin'),
		'desc' => __('Pause slideshow on hover.', 'quemalabs_admin'),
		'id' => 'slider_pauseonhover_flex',
		'std' => 'false',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);

	$options_select = array("true" => "true","false" => "false");
	$options[] = array(
		'name' => __('Navigation', 'quemalabs_admin'),
		'desc' => '',
		'id' => 'slider_controlnav_flex',
		'std' => 'true',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);	

	




	$options[] = array(
		'name' => __('Fullscreen Slider', 'options_framework_theme'),
		'desc' => __('Below are the options for the Fullscreen Slider', 'options_framework_theme'),
		'type' => 'info');



	$options_select = array("1" => "true","0" => "false");
	$options[] = array(
		'name' => __('Auto Start', 'quemalabs_admin'),
		'desc' => __('Slideshow starts playing automatically.', 'quemalabs_admin'),
		'id' => 'slider_autoplay',
		'std' => '1',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);

	$options[] = array(
		'name' => __('Slide Interval', 'quemalabs_admin'),
		'desc' => __('Length between transitions (Miliseconds).', 'quemalabs_admin'),
		'id' => 'slider_slide_interval',
		'std' => '5000',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Speed of transition', 'quemalabs_admin'),
		'desc' => __('Length between transitions (Miliseconds).', 'quemalabs_admin'),
		'id' => 'slider_speed_transition',
		'std' => '500',
		'class' => 'mini',
		'type' => 'text');
					
	$options_select = array("0" => "None", "1" => "Fade", "2" => "Slide Top", "3" => "Slide Right", "4" => "Slide Bottom", "5" => "Slide Left", "6" => "Carousel Right", "7" => "Carousel Left");
	$options[] = array(
		'name' => __('Transition', 'quemalabs_admin'),
		'desc' => '',
		'id' => 'slider_transition',
		'std' => '1',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);
					
	$options_select = array("1" => "true","0" => "false");
	$options[] = array(
		'name' => __('Pause on Hover', 'quemalabs_admin'),
		'desc' => __('Pause slideshow on hover.', 'quemalabs_admin'),
		'id' => 'slider_pausehover_fullscreen',
		'std' => '0',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);				
						
	$options_select = array("1" => "true","0" => "false");
	$options[] = array(
		'name' => __('Navigation', 'quemalabs_admin'),
		'desc' => '',
		'id' => 'slider_navigation',
		'std' => '1',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);					

	$options_select = array("1" => "true","0" => "false");
	$options[] = array(
		'name' => __('Vertical Center', 'quemalabs_admin'),
		'desc' => __('Vertically center background.', 'quemalabs_admin'),
		'id' => 'slider_verticalcenter',
		'std' => '0',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);							
	
	$options_select = array("1" => "true","0" => "false");
	$options[] = array(
		'name' => __('Horizontal Center', 'quemalabs_admin'),
		'desc' => __('Horizontally center background.', 'quemalabs_admin'),
		'id' => 'slider_horizontalcenter',
		'std' => '1',
		"class" => "mini", //mini, tiny, small
		'type' => 'select',
		'options' => $options_select);	
					







$options[] = array( "name" => "Header Options",
					"type" => "heading");      

$options[] = array(
		'name' => __('Header Social Icons', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'type' => 'info');


$options[] = array( "name" => "Facebook Link",
					"desc" => "The URL for the social icons on the header. Example: http://facebook.com/MyCompany",
					"id" => "hlink_facebook",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Twitter Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_twitter",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Flickr Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_flickr",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Youtube Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_youtube",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Vimeo Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_vimeo",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "LinkedIn Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_linkedin",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Skype Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_skype",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Forrst Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_forrst",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Google +1 Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_google",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Tumblr Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_tumblr",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "Dribbble Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_dribbble",
					"std" => "",
					"type" => "text",
					"subheading" => "h4"
					); 
$options[] = array( "name" => "RSS Link",
					"desc" => "The URL for the social icons on the header.",
					"id" => "hlink_rss",
					"std" => get_bloginfo('rss2_url'),
					"type" => "text",
					"subheading" => "h4"
					); 













	$options[] = array(
		'name' => __('Sidebars Generator', 'quemalabs_admin'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Sidebars', 'quemalabs_admin'),
		'desc' => 'Create sidebar for later use on pages.',
		'id' => 'sidebars',
		'std' => '',
		'type' => 'sidebar');




	$options[] = array(
		'name' => __('Portfolios Generator', 'quemalabs_admin'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Portfolios', 'quemalabs_admin'),
		'desc' => 'Create portfolios for later use on pages.',
		'id' => 'portfolios',
		'std' => '',
		'type' => 'portfolio');






	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}







	/* Font System */
	$('#selected_font_system').change(function() {

		if($(this).val() == "cufon"){
			$('#section-cufon_font').fadeIn(400);
			$('#section-google_font').fadeOut(200);

		}else if ($(this).val() == "google_font"){

			$('#section-google_font').fadeIn(400);
			$('#section-cufon_font').fadeOut(200);
		}
  		
	});

	if ($('#selected_font_system').val() == "google_font") {
		$('#section-google_font').fadeIn(400);
		$('#section-cufon_font').fadeOut(200);
	}else{
		$('#section-cufon_font').fadeIn(400);
		$('#section-google_font').fadeOut(200);
	}


});
</script>

<?php
}