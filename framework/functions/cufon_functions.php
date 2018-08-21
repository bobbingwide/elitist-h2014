<?php
	//=============================================================
	//Cufon Settings
	//=============================================================
	if(!is_admin()){

	

	
		$selected_font_system = of_get_option('selected_font_system');

	$cufon_font = of_get_option('cufon_font');
			 		
	
		if($selected_font_system == "cufon"){
			if (of_get_option( 'font_system' ) == true ) {
	
			   function cufon_method() {
				 		
				 		$cufon_font = of_get_option('cufon_font');
						$cufon_font_name = theme_cufon_get_font_name($cufon_font);
				 		
				 		
				 		//Load Cufon JS ==============================================
					   // register your script location, dependencies and version
					   wp_register_script('cufon-yui', get_template_directory_uri() . '/js/cufon-yui.js', array('jquery'), '1.09' );
					   wp_enqueue_script('cufon-yui');
					   //===================================================================
					   
					   
					   //Load Font JS =================================
					   wp_register_script('cufon_font', //Name
					       get_template_directory_uri() . '/js/fonts/'.$cufon_font, //File
					       array('cufon-yui'), //Dependency
					       '1.0' ); //Version
					   wp_enqueue_script('cufon_font');
					   //===================================================================
					   
					   
					   //Load Custom Cufon JS =================================
					   wp_register_script('cufon_custom', //Name
					       get_template_directory_uri() . '/js/jquery.cufon-yui.custom.js', //File
					       array('jquery', 'cufon-yui'), //Dependency
					       '1.0' ); //Version
					   wp_enqueue_script('cufon_custom');
					  
					   //Send data to the Cufon Custom Script File ==========================
					   //Envia parametros al JS
					    wp_localize_script( 'cufon_custom', 'WP_Cufon', array(
					  			'cufon_font_name' => $cufon_font_name
						));
						//===================================================================
					}
					add_action('wp_enqueue_scripts', 'cufon_method');

			}//font_system
	
		}else{
			function no_cufon_method() {
				 	?>
					<script type='text/javascript'>
					/* <![CDATA[ */
					var cufon_enable = false;
					/* ]]> */
					</script>
					<?php	
		
			}
			add_action('wp_enqueue_scripts', 'no_cufon_method');
	
		}//else cufon enable
	}//if is_admin





//=============================================================
//Cufon Back End for Admin Panel
//=============================================================
if(is_admin()){
	if (! function_exists("theme_cufon_get_fonts")){
		function theme_cufon_get_fonts(){
			$fonts = array();
			foreach(glob(TEMPLATEPATH ."/js/fonts/*.js") as $font_file){
				$file_content = file_get_contents($font_file);
				if(preg_match('/font-family":"(.*?)"/i',$file_content,$match)){
					$fonts[$match[1]] = basename($font_file);
				}
			}
			return $fonts;
		}
	}
	
	
	if(isset($_GET['page']) && $_GET['page']=='options-framework'){
		if (! function_exists("theme_cufon_add_script_option")){
			function theme_cufon_add_script_option(){
				wp_enqueue_script( 'cufon-yui', get_template_directory_uri() .'/js/cufon-yui.js');
				
				$cufon_scripts = "<script type='text/javascript'>\njQuery(document).ready(function($) {\n";
				$count = 1;
				foreach(theme_cufon_get_fonts() as $font_name => $file_name){
					wp_enqueue_script( $font_name, get_template_directory_uri() .'/js/fonts/'.$file_name);
					$cufon_scripts .= stripslashes("Cufon('#cufon-$count', { fontFamily: '$font_name' });\n");
					$count ++;
				}
				do_action('admin_print_scripts');
				echo $cufon_scripts."});\n</script>";
			}
			add_filter('admin_enqueue_scripts', 'theme_cufon_add_script_option');
		}
	}
}//is is_admin

if (! function_exists("theme_cufon_get_font_name")){
		function theme_cufon_get_font_name($font_file_name){
				$fonts = array();
	
				$file_content = file_get_contents(TEMPLATEPATH ."/js/fonts/$font_file_name");
				if(preg_match('/font-family":"(.*?)"/i',$file_content,$match)){
					return $match[1];
				}
			
			return $match[1];
		}
	}
?>