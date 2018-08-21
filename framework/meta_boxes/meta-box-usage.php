<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'mb_';

global $meta_boxes;

$meta_boxes = array();
$portfolio_types = array('portfolio');

$portfolios = get_portfolios();
				if(is_array($portfolios) && !empty($portfolios)){
					foreach($portfolios as $portfolio){
						array_push($portfolio_types, name_to_class_portfolio($portfolio));
						
						}//Foreach
					
				}//if is_array
				function arraytolower(array $array, $round = 0){ 
				   return unserialize(strtolower(serialize($array))); 
				 }
				$portfolio_types = arraytolower($portfolio_types);
				//------------------------------------------------------------------------------------




//If is WP 3.3+ and include Drag & Drop image upload use it. If not use the regular uploader
global $wp_version;
if (version_compare($wp_version, '3.3', '>=')) {
	$upload_img_type = "plupload_image";
}else{
	$upload_img_type = "image";
}


/* Demo Meta Boxes in "/demo/demo.php" */


$meta_boxes[] = array(
	'id' => 'portfolio_video',							// meta box id, unique per meta box
	'title' => 'Portfolio options',			// meta box title
	'pages' => $portfolio_types,	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name'	=> 'Add Images',
			'desc'	=> 'Here you can add more images to include in this portfolio item (Featured Image will be the first one).',
			'id'	=> "{$prefix}portfolio_images",
			'clone'		=> false,// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'	=> $upload_img_type
		),
		array(
			'name' => 'Link to video',					// field name
			'desc' => 'Example: http://www.youtube.com/watch?v=uelHwf8o7_U',	// field description, optional
			'id' => $prefix . 'video_link',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 200px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Display In Portrait?',
			'desc' => 'Select this if you want display the featured image in Portrait mode on the Portfolio Page.',	// field description, optional
			'id' => $prefix . 'portfolio_portrait',
			'type' => 'select',						// select box
			'options' => array(						// array of key => value pairs for select box
				'0' => 'No',
				'1' => 'Yes'
			),
			'multiple' => false,						// select multiple values, optional. Default is false.
			'std' => '0',					// default value, can be string (single value) or array (for both single and multiple values)
		),
		array(
			'name' => 'Client',					// field name
			'desc' => 'Client Name',	// field description, optional
			'id' => $prefix . 'portfolio_info_client',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 50px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'URL',					// field name
			'desc' => 'Link to work',	// field description, optional
			'id' => $prefix . 'portfolio_info_url',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 50px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Year',					// field name
			'desc' => 'Year',	// field description, optional
			'id' => $prefix . 'portfolio_info_year',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 50px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Agency',					// field name
			'desc' => 'Agency Name',	// field description, optional
			'id' => $prefix . 'portfolio_info_agency',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 50px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Link to URL',					// field name
			'desc' => 'If you specific an URL this item will link to that URL instead of the Single Portfolio page.',	// field description, optional
			'id' => $prefix . 'external_link',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 200px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		)
	)
);


$meta_boxes[] = array(
	'id' => 'shortcode_generator',							// meta box id, unique per meta box
	'title' => 'Shortcode Generator',			// meta box title
	'pages' => array('post', 'page'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => '',					// field name
			'desc' => '',	// field description, optional
			'id' => $prefix . 'shortcode',				// field id, i.e. the meta key
			'type' => 'shortcode',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		)
	)
);



//Meta box for Slider Post Types
$meta_boxes[] = array(
	'id' => 'slide_options',							// meta box id, unique per meta box
	'title' => 'Slide Options',			// meta box title
	'pages' => array('slides'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'low',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => 'Link',					// field name
			'desc' => 'If you want the slide has a link, if not leave it empty',	// field description, optional
			'id' => $prefix . 'slide_link',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Display Title and Description',
			'id' => $prefix . 'slide_caption',
			'type' => 'select',						// select box
			'options' => array(						// array of key => value pairs for select box
				'0' => 'No',
				'1' => 'Yes'
			),
			'multiple' => false,						// select multiple values, optional. Default is false.
			'std' => '0',					// default value, can be string (single value) or array (for both single and multiple values)
			'desc' => ''
		)
	)
);


//Add Background Options to all portfolio types, Pages and posts
$pages_and_portfolios = array_merge($portfolio_types, array('post', 'page'));



//Meta box for Titles
$meta_boxes[] = array(
	'id' => 'title_options',							// meta box id, unique per meta box
	'title' => 'Title Options',			// meta box title
	'pages' => array('post', 'page'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => 'Sub Title',					// field name
			'desc' => 'If you want a sub title, if not leave it empty',	// field description, optional
			'id' => $prefix . 'title_sub',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 300px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		)
		
	)
);


//Add Background Options to all portfolio types, Pages and posts
$pages_and_portfolios = array_merge($portfolio_types, array('post', 'page'));




//Meta box for Background Options
$meta_boxes[] = array(
	'id' => 'background_options',							// meta box id, unique per meta box
	'title' => 'Background Options',			// meta box title
	'pages' => $pages_and_portfolios,	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
	
		
		array(
			'name' => 'Background Audio',					// field name
			'desc' => 'URL to the Audio File. If you want an Audio for background, if not leave it empty (The audio is not played during the video)',	// field description, optional
			'id' => $prefix . 'background_audio',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => 'width: 300px',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Audio Format',
			'id' => $prefix . 'background_audio_format',
			'type' => 'select',						// select box
			'options' => array(						// array of key => value pairs for select box
				'mp3' => 'MP3',
				'm4a' => 'M4A',
				'oga' => 'OGA',
				'wav' => 'WAV'
			),
			'multiple' => false,						// select multiple values, optional. Default is false.
			'std' => 'mp3',					// default value, can be string (single value) or array (for both single and multiple values)
			'desc' => 'Important, select your Audio Format.'
		)
		
	)
);









//Meta box for Post Formats Options
$meta_boxes[] = array(
	'id' => 'post_formats_options',							// meta box id, unique per meta box
	'title' => 'Post Formats Options',			// meta box title
	'pages' => array('post'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'high',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields

		array(
			'name'	=> 'Images',
			'desc'	=> 'This field is used for Image and Gallery Post Format, you can upload 1 or more images.',
			'id'	=> "{$prefix}post_format_images",
			'clone'		=> false,// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'type'	=> $upload_img_type
		),
		array(
			'name' => 'Link',					// field name
			'desc' => 'URL for use as link Post Format (Do not forget the "http://").',	// field description, optional
			'id' => $prefix . 'post_format_link',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Audio MP3',					// field name
			'desc' => 'URL to the Audio File in MP3 format.',	// field description, optional
			'id' => $prefix . 'post_format_audio_mp3',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Audio OGG',					// field name
			'desc' => 'URL to the Audio File in OGG format (This will ensure you have cross browser compatibility)',	// field description, optional
			'id' => $prefix . 'post_format_audio_ogg',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name'		=> 'Quote',
			'desc'		=> "",
			'id'		=> "{$prefix}post_format_quote",
			'type'		=> 'textarea',
			'std'		=> "",
			'cols'		=> "40",
			'rows'		=> "8"
		),
		array(
			'name' => 'Quote Author',					// field name
			'desc' => '',	// field description, optional
			'id' => $prefix . 'post_format_quote_cite',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
			'name' => 'Video',					// field name
			'desc' => 'The video URL on YouTube or Vimeo, for example: "https://vimeo.com/25968181" or "http://www.youtube.com/watch?v=zatgnqdIefs"',	// field description, optional
			'id' => $prefix . 'post_format_video',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		)
		
	)
);





/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function mb_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'mb_register_meta_boxes' );
?>
