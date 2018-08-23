<?php
	
	//=============================================================
	//Theme Scripts
	//=============================================================
	
	//Register JS Scripts for later use
	function ql_enqueue_scripts() {
  
    //bw_backtrace();
	
		
		//Sliders ==============================================================
			
			//Flex Slider ========================================
			wp_register_script('flexslider', THEME_JS . '/jquery.flexslider-min.js', array('jquery'), '1.0', true);
			wp_enqueue_script('flexslider');
			//=================================================================

			//Flex Slider Custom ========================================
			wp_register_script('flexslider-custom', THEME_JS . '/jquery.flexslider.custom.js', array('jquery', 'flexslider', 'theme-custom'), '1.0', true);
			wp_enqueue_script('flexslider-custom');
			 		//Send data to the Flex Custom Script File ==========================

				    $slider_animation_flex = of_get_option('slider_animation_flex');
				    $slider_animationspeed_flex = of_get_option('slider_animationspeed_flex');
				    $slider_slideshowspeed_flex = of_get_option('slider_slideshowspeed_flex');
					$slider_pauseonhover_flex = of_get_option('slider_pauseonhover_flex');
					$slider_controlnav_flex = of_get_option('slider_controlnav_flex');

				    wp_localize_script( 'flexslider-custom', 'WP_Flexslider', array(
				  			'animation' => $slider_animation_flex,
			                'animationSpeed' => $slider_animationspeed_flex,
			                'slideshowSpeed' => $slider_slideshowspeed_flex,
			                'pauseOnHover' => $slider_pauseonhover_flex,
			                'controlNav' => $slider_controlnav_flex
					));
					//===================================================================
			//=================================================================


			

		//=====================================================================
	

		//Flow Player ========================================================
		wp_register_script('flowplayer', THEME_JS . '/flowplayer.min.js', array('jquery'), '5.0', true );
		wp_enqueue_script('flowplayer');
		//=================================================================

		
		//jPlayer ========================================================
		wp_register_script('jplayer', THEME_JS . '/jquery.jplayer.min.js', array('jquery'), '2.1.0', true );
		wp_enqueue_script('jplayer');
		//=================================================================

		//debouncedresize =======================================================
		wp_register_script('debouncedresize', THEME_JS . '/jquery.debouncedresize.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script('debouncedresize');
		//=================================================================

		
		//hoverIntent Plugin ==============================================
		wp_register_script('hoverIntent', THEME_JS . '/jquery.hoverIntent.minified.js', array('jquery'), '6.0', true );
		wp_enqueue_script('hoverIntent');
		//=================================================================

		//Tiny Nav Plugin ==============================================
		wp_register_script('tinyNav', THEME_JS . '/tinynav.min.js', array('jquery'), '1.03', true );
		wp_enqueue_script('tinyNav');
		//=================================================================

		//jQuery UI Widgets ==============================================
		wp_enqueue_script('jquery-ui-widget');
		//=================================================================

		//audioPlayerV1 Plugin ==============================================
		wp_register_script('audioPlayerV1', THEME_JS . '/AudioPlayerV1.js', array('jquery', 'jquery-ui-widget'), '1.1.3', false );
		wp_enqueue_script('audioPlayerV1');
		//=================================================================
		
		//prettyPhoto Plugin ==============================================
		wp_register_script('prettyPhoto', THEME_JS . '/jquery.prettyPhoto.js', array('jquery'), '3.1.3', true );
		wp_enqueue_script('prettyPhoto');
		//=================================================================

		

		//jQuery UI for Before and After shortcode ========================
		wp_enqueue_script('jquery-ui-draggable');
		//=================================================================

		//jQuery UI touch for Before and After shortcode ==============================================
		wp_register_script('jquery-ui-touch', THEME_JS . '/beforeafter/jquery.ui.touch-punch.min.js', array('jquery', 'jquery-ui-draggable'), '1.0', true );
		wp_enqueue_script('jquery-ui-touch');
		//=================================================================

		//Before And After  ==============================================
		wp_register_script('beforeafter', THEME_JS . '/beforeafter/jquery.beforeafter-1.4.min.js', array('jquery', 'jquery-ui-draggable', 'jquery-ui-touch'), '1.4', true );
		wp_enqueue_script('beforeafter');
		//=================================================================

		//Before And After custom ==============================================
		wp_register_script('beforeafter-custom', THEME_JS . '/beforeafter/jquery.beforeafter-custom.js', array('jquery', 'debouncedresize', 'beforeafter'), '1.0', true );
		wp_enqueue_script('beforeafter-custom');
		//=================================================================		

		

		
		
		
		

		//jQuery Easing Plugin ============================================
		wp_register_script('easing', THEME_JS . '/jquery.easing.1.3.js', array('jquery'), '1.3', true);
		wp_enqueue_script('easing');
		//=================================================================
		
		
		//jQuery Gmap  ============================================
		wp_register_script('gmap-key', 'https://maps.google.com/maps/api/js?sensor=true', false);
		wp_register_script('gmap', THEME_JS . '/jquery.ui.map.min.js', array('jquery', 'gmap-key'), '3.0', false);

		wp_enqueue_script('gmap-key');
		wp_enqueue_script('gmap');
		//=================================================================

		
		//Bootstrap JS ========================================
		wp_register_script('bootstrap', THEME_JS . '/bootstrap.min.js', array(), '2.1.0', true);
		wp_enqueue_script('bootstrap');
		//=================================================================
		
		
		//Comment Reply ===================================================
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		//=================================================================


		wp_reset_query();
		if (is_page_template('page-portfolio.php') || is_page_template('page-portfolio2.php')) {

			//Isotope =======================================================
			wp_register_script('isotope', THEME_JS . '/jquery.isotope.min.js', array('jquery'), '1.5.19', true );
			wp_enqueue_script('isotope');
			//=================================================================

			//imagesloaded =======================================================
			wp_register_script('imagesloaded', THEME_JS . '/jquery.imagesloaded.min.js', array('jquery'), '1.0', true );
			wp_enqueue_script('imagesloaded');
			//=================================================================
			
			//Portfolios Script ========================================
			wp_register_script('portfolio-scripts', THEME_JS . '/portfolio-scripts.js', array('jquery', 'isotope', 'debouncedresize', 'imagesloaded',  'prettyPhoto'), '1.0', true);
			wp_enqueue_script('portfolio-scripts');
			//=================================================================
		}

    

		if (is_page_template('gallery-bootstrap.php') || ( is_single() && 'portfolio' == get_post_type() ) ) {
    

			//Bootstrap Gallery ========================================
			wp_register_script('load-image', THEME_JS . '/load-image.min.js', array('jquery', 'bootstrap'), '1.0', true);
			wp_enqueue_script('load-image');
			//=================================================================

			//Bootstrap Gallery ========================================
			wp_register_script('bootstrap-gallery', THEME_JS . '/bootstrap-image-gallery.min.js', array('jquery', 'bootstrap', 'load-image'), '1.0', true);
			wp_enqueue_script('bootstrap-gallery');
			//=================================================================
			
		}  



		if (is_page_template('gallery-fullscreen.php')) {

			//Supersized =============================================
			wp_register_script('supersized', THEME_JS . '/supersized.3.2.7.min.js', array('jquery'), '3.2.7', true);
			wp_enqueue_script('supersized');

			//Supersized Shutter =============================================
			wp_register_script('supersized-shutter-custom', THEME_JS . '/supersized.shutter.custom.js', array('jquery',  'supersized'), '1.1', true);
			wp_enqueue_script('supersized-shutter-custom');

		}




		//Customs Scripts =================================================
		wp_register_script('theme-custom', THEME_JS . '/script.js', array('jquery', 'bootstrap'), '1.0', true );
		wp_enqueue_script('theme-custom');
		//=================================================================
	}
	add_action('wp_enqueue_scripts', 'ql_enqueue_scripts');
?>