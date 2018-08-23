<?php
$theme_data = wp_get_theme();
return array(
	'theme_name' => $theme_data['Name'], 
	'theme_slug' => sanitize_title($theme_data['Name']),
	'theme_author' => $theme_data['Author'],
	'theme_author_uri' => $theme_data['AuthorURI'],
	'theme_version' => $theme_data['Version'],
	'required_wp_version' => '3.1'
);