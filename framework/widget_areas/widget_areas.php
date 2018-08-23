<?php
//Footer and Sidebar Widgets
	    
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '<i></i></h4>'
    	));
		register_sidebar(array(
    		'name' => 'First Footer Widgets Area',
    		'id'   => 'first-footer-widgets',
    		'description'   => 'These are widgets for the first footer area.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '<i></i></h4>'
    	));
		register_sidebar(array(
    		'name' => 'Second Footer Widgets Area',
    		'id'   => 'second-footer-widgets',
    		'description'   => 'These are widgets for the second footer area.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '<i></i></h4>'
    	));
		register_sidebar(array(
    		'name' => 'Third Footer Widgets Area',
    		'id'   => 'third-footer-widgets',
    		'description'   => 'These are widgets for the third footer area.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '<i></i></h4>'
    	));
		register_sidebar(array(
    		'name' => 'Fourth Footer Widgets Area',
    		'id'   => 'fourth-footer-widgets',
    		'description'   => 'These are widgets for the fourth footer area.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '<i></i></h4>'
    	));
		register_sidebar(array(
    		'name' => 'Post Widgets',
    		'id'   => 'post-widgets',
    		'description'   => 'These are widgets for a single Post.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h4>',
    		'after_title'   => '</h4>'
    	));
		register_sidebar(array(
    		'name' => 'Home Widgets',
    		'id'   => 'home-widgets',
    		'description'   => 'These are widgets for the Home page.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="line_title">',
    		'after_title'   => '</h2>'
    	));
    }
	//End

?>