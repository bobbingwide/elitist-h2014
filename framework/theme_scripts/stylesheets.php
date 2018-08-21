<?php
	
	//=============================================================
	//Theme Sstylesheets
	//=============================================================
	
	function ql_enqueue_stylesheets() {
		
		//Bootstrap =======================================================
		wp_register_style('bootstrap', THEME_CSS . '/bootstrap.css', array(), '2.0', 'all');  
		wp_enqueue_style('bootstrap');  
		//=================================================================

		//Shortcodes ======================================================
		wp_register_style('shortcodes', THEME_CSS . '/shortcodes.css', array(), '1.0', 'all');  
		wp_enqueue_style('shortcodes');  
		//=================================================================

		//Audio Skin =====================================================
		wp_register_style('audioPlayerV1-skin', THEME_CSS . '/audio_skin/style.css', array(), '1.0', 'all');  
		wp_enqueue_style('audioPlayerV1-skin');  
		//=================================================================

		//prettyPhoto =====================================================
		wp_register_style('prettyPhoto', THEME_CSS . '/prettyPhoto.css', array(), '3.1.3', 'all');  
		wp_enqueue_style('prettyPhoto');  
		//=================================================================

		//FlexSlider ======================================================
		wp_register_style('flexSlider', THEME_CSS . '/flexslider.css', array(), '1.8', 'all');  
		wp_enqueue_style('flexSlider');  
		//=================================================================

		//FlowPlayer ======================================================
		wp_register_style('flowplayer', THEME_CSS . '/video_skin/minimalist.css', array(), '5.0', 'all');  
		wp_enqueue_style('flowplayer');  
		//=================================================================

		if(is_page_template('page-portfolio.php')){

			//Isotope ================================================
			wp_register_style('isotope', THEME_CSS . '/isotope.min.css', array(), '1.0', 'all');  
			wp_enqueue_style('isotope');  
			//=================================================================
		}



	  // if(is_page_template('gallery-bootstrap.php')){
    
		if (is_page_template('gallery-bootstrap.php') || ( is_single() && 'portfolio' == get_post_type() ) ) {

			//Bootstrap Gallery ================================================
			wp_register_style('bootstrap-gallery', THEME_CSS . '/bootstrap-image-gallery.min.css', array(), '1.0', 'all');  
			wp_enqueue_style('bootstrap-gallery');  
			//=================================================================
		}



		if (is_page_template('gallery-fullscreen.php')) {

			//Supersized ======================================================
			wp_register_style('supersized', THEME_CSS . '/supersized.css', array(), '1.8', 'all');  
			wp_enqueue_style('supersized');  
			//=================================================================

			//Supersized ======================================================
			wp_register_style('supersized-shutter', THEME_CSS . '/supersized.shutter.css', array(), '1.8', 'all');  
			wp_enqueue_style('supersized-shutter');  
			//=================================================================

		}

		//Main Stylesheet =================================================
		wp_register_style('main-stylesheet', get_bloginfo('stylesheet_url'), array('bootstrap'), '1.0', 'all');  
		wp_enqueue_style('main-stylesheet');  
		//=================================================================


	}
	add_action('wp_enqueue_scripts', 'ql_enqueue_stylesheets');
?>