<?php
// Prevent loading this file directly - Busted!
if( ! class_exists('WP') ) 
{
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

if ( ! class_exists( 'RWMB_Shortcode_Field' ) ) 
{
	class RWMB_Shortcode_Field 
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field ) 
		{
			$std		 = isset( $field['disabled'] ) ? $field['disabled'] : false;
			$disabled	 = disabled( $std, true, false );

			$name		 = "name='{$field['field_name']}'";
			$id			 = " id='{$field['id']}'";
			$val		 = " value='{$meta}'";
			$size		 = isset( $field['size'] ) ? $field['size'] : '30';
			
			$url_path = get_template_directory_uri();
			$html		.= "<p>If you need help with shortcodes, please use the: <a class='button' onClick=\"window.open('".$url_path."/s_generator/index.html','','width=700,height=600,scrollbars=yes')\">Shortcode Generator</a></p>";


			return $html;
		}
	}
}