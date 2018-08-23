<?php

/*-----------------------------------------------------------------------------------*/
/* Output CSS from standarized options */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('optionsframework_wp_head')) {
	function optionsframework_wp_head() {     
			
		// This prints out the custom css and specific styling options
		of_head_css();
	}
}
add_action('wp_head', 'optionsframework_wp_head');

function of_head_css() {

		$shortname =  of_get_option('shortname'); 
		$output = '';
		
		$custom_css = of_get_option('custom_css');
		
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}
		
		// Output styles
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
	
}


/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function childtheme_favicon() { 
		if (of_get_option('custom_favicon') != '') {
	        echo '<link rel="shortcut icon" href="'.  of_get_option('custom_favicon')  .'" type="image/x-icon"/>'."\n";
	    }
		else { ?>
			<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<?php }
}

add_action('wp_head', 'childtheme_favicon');

/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function childtheme_analytics(){
	$output = of_get_option('google_analytics');
	if ( $output <> "" ) 
		echo stripslashes($output) . "\n";
}
add_action('wp_footer','childtheme_analytics');

/*
 * This is an example of how to override a default filter
 * for 'textarea' sanitization and $allowedposttags + embed and script.
 */
add_action('admin_init','optionscheck_change_santiziation', 100);

function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}







/* 
 * Note: Options Typography is a child theme of Options Framework Theme
 * So all the functions from the parent theme are also inherited
 */
 
 /**
 * Returns an array of system fonts
 * Feel free to edit this, update the font fallbacks, etc.
 */

function options_typography_get_os_fonts() {
	// OS Font Defaults
	$os_faces = array(
		'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma'
	);
	return $os_faces;
}

/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */

function options_typography_get_google_fonts() {
	// Google Font Defaults
	$google_faces = array(
		'Arvo, serif' => 'Arvo',
		'Copse, sans-serif' => 'Copse',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Lobster, cursive' => 'Lobster',
		'Nobile, sans-serif' => 'Nobile',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Rokkitt, serif' => 'Rokkit',
		'PT Sans, sans-serif' => 'PT Sans',
		'Quattrocento, serif' => 'Quattrocento',
		'Raleway, cursive' => 'Raleway',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Francois One, sans-serif' => 'Francois One',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz',
		'Lora, serif' => 'Lora'
	);
	return $google_faces;
}

/* 
 * Outputs the selected option panel styles inline into the <head>
 */
 
function options_typography_styles() {
 	
 	// It's helpful to include an option to disable styles.  If this is selected
 	// no inline styles will be outputted into the <head>
 	
 	if ( !of_get_option( 'disable_styles' ) ) {
		$output = '';
		$input = '';
		
		/*
		if ( of_get_option( 'body_font' ) ) {
			$output .= options_typography_font_styles( of_get_option( 'body_font' ) , 'body');
		}
		
		if ( of_get_option( 'site_title_font' ) ) {
			$output .= options_typography_font_styles( of_get_option( 'site_title_font' ) , '#site-title');
		}
		
		if ( of_get_option( 'header_font' ) ) {
			$output .= options_typography_font_styles( of_get_option( 'header_font' ) , 'h1,h2,h3,h4,h5,h6');
		}
		
		if ( of_get_option( 'link_color' ) ) {
			$output .= 'a {color:' . of_get_option( 'link_color' ) . '}';
		}
		
		if ( of_get_option( 'link_hover_color' ) ) {
			$output .= 'a:hover {color:' . of_get_option( 'link_hover_color' ) . '}';
		}
		*/


		if ( of_get_option( 'font_system' ) == true ) {
			if ( of_get_option( 'selected_font_system' ) == "google_font" ) {
				if ( of_get_option( 'google_font' ) ) {
					$input = of_get_option( 'google_font' );
					$output .= options_typography_font_styles( of_get_option( 'google_font' ) , '.google-font, h1, h2, h3, h4, h5, .dropcap');
				}
			}
		}
		
		if ( $output != '' ) {
			$output = "\n<style>\n" . $output . "</style>\n";
			echo $output;
		}
	}
}
add_action('wp_head', 'options_typography_styles');

/* 
 * Returns a typography option in a format that can be outputted as inline CSS
 */
 
function options_typography_font_styles($option, $selectors) {
		$output = $selectors . ' {';
		//$output .= ' color:' . $option['color'] .'; ';
		$output .= 'font-family:' . $option['face'] . '; ';
		$output .= 'font-weight:' . $option['style'] . '; ';
		$output .= 'font-size:' . $option['size'] . '; ';
		$output .= '}';
		$output .= "\n";
		return $output;
}

/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
 
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$google_font = of_get_option('google_font', 'Rokkitt, serif');
		$google_mixed = of_get_option('google_mixed', false);
		$google_mixed_2 = of_get_option('google_mixed_2', 'Arvo, serif');
		// Get the font face for each option and put it in an array
		$selected_fonts = array(
			$google_font['face'],
			$google_mixed['face'],
			$google_mixed_2['face'] );
		// Remove any duplicates in the list
		$selected_fonts = array_unique($selected_fonts);
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		foreach ( $selected_fonts as $font ) {
			if ( in_array( $font, $all_google_fonts ) ) {
				options_typography_enqueue_google_font($font);
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

/**
 * Enqueues the Google $font that is passed
 */
 
function options_typography_enqueue_google_font($font) {
	$font = explode(',', $font);
	$font = $font[0];
	// Certain Google fonts need slight tweaks in order to load properly
	// Like our friend "Raleway"
	if ( $font == 'Raleway' )
		$font = 'Raleway:100';
	$font = str_replace(" ", "+", $font);
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}















?>