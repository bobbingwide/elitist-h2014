<?php 
function header_styles() {
	//Fonts
	 $font_content = of_get_option('content_typograpy');
	 $font_links = of_get_option('links_typograpy');

	 $textColor = $font_content["color"];
	 
	 $featured_color = of_get_option('featured_color');

	 $body_color = of_get_option('background_color');
	 $background_pattern = of_get_option('background_pattern');
	 $background_image = of_get_option('background_image');
	 $site_layout = of_get_option('site_layout');

  ?>
	<!-- Custom Styles -->
    <style type="text/css">
	body{
		font: <?php echo $font_content["style"].' '.stripslashes($font_content["face"]);?>;
		color: <?php echo $font_content["color"]; ?>;
		background-color: <?php echo $body_color; ?>;

		<?php if($background_image != ""){ ?>
		background:url(<?php echo $background_image; ?>) repeat;
		background-position:center top;
		background-attachment:fixed;
		<?php }elseif($background_pattern != "none"){ ?>
		background:url(<?php echo get_template_directory_uri(); ?>/images/grid-patterns/<?php echo $background_pattern; ?>) repeat <?php echo $body_color; ?>;
		<?php } ?>
		
	}

	<?php if($site_layout == "wrap"){ ?>
		body{
			background-color: #EEEEEE;
		}

		#wrap{
			display: table;
			margin: 0 auto;
			background-color:#fff;
			-webkit-box-shadow: 0 0px 3px rgba(0,0,0,.2);
     		-moz-box-shadow: 0 0px 3px rgba(0,0,0,.2);
          	box-shadow: 0 0px 3px rgba(0,0,0,.2);
		}
		#wrap > .container{
			margin:0 1.53846153846154em;
		}
	<?php } ?>

	.full_pattern{
	<?php
	if($background_pattern != "none"){ ?>
		background:url(<?php echo get_template_directory_uri(); ?>/images/grid-patterns/<?php echo $background_pattern; ?>) repeat;
		<?php } ?>
	}



	a{
		font: <?php echo $font_links["style"].' '.stripslashes($font_links["face"]);?>;
		color: <?php echo $font_links["color"]; ?>;
	}

	
	footer h4, #sidebar .widget h4, .masonry_item .masonry_desc, .title_underline,
	article,
	.page_title,
	.single .metadata,
	#footer h4,
	.ql_tagline,
	.ql_underline_title,
	#header,
	#sidebar .widget h4,
	.filter_list h4,
	.sub_footer_wrap{
		border-bottom-color: <?php echo $featured_color; ?>!important;
	}
	
	.entry,
	.metadata,
	#header-no,
	.portfolio_item .ql_hover .short_line,
	.portfolio_post,
	.portfolioItem_sidebar,
	.footer_wrap,
	.sub_footer_wrap{
		border-top-color: <?php echo $featured_color; ?>!important;
	}


	
	.service_item .service_icon i,
	.circle_service:hover .circle_icon,
	ul.fancy_tags li a,
	.pagination .active a,
	.pagination a:hover,
	.more-link,
	#respond input, #contact-form input,
	#respond .add-on, #contact-form .add-on,
	#respond #submit-respond, #contact-form #submit-form,
	.btn-cta,
	.simple_btn,
	.portfolio_item a .ql_hover .p_icon,
	ul.source li.active a,
	#sidebar .widget > ul li > a:hover,
	#sidebar .widget_tag ul li a{
		background-color: <?php echo $featured_color; ?>!important;
	}
	

	
	.service_item:hover .service_icon i,
	.circle_service:hover h3,
	.post_title h3 a:hover,
	.post_icon i,
	.metadata ul li:hover i,
	.metadata ul li a:hover,
	ul.fancy_tags li a:hover,
	.pagination a,
	.more-link:hover,
	#respond #submit-respond:hover, #contact-form #submit-form:hover,
	.widget_recent_posts ul li h6 a, .widget_popular_posts ul li h6 a,
	footer .twitter_widget ul li i,
	.contact_info .contact_info li i,
	footer .quick_contact .form input,
	footer .quick_contact .form textarea,
	.simple_btn:hover,
	h2.intro_line strong,
	#header .jqueryslidemenu > ul > li > a:hover,
	#header .jqueryslidemenu > ul > .current_page_item > a,
	#header .jqueryslidemenu > ul > .current_page_parent > a,
	.filter_list ul li a:hover,
	.filter_list ul li.active a,
	ul.source li a:hover,
	ul.source li.active a:hover,
	#sidebar .widget ul li > a:hover,
	#sidebar .twitter_widget ul li i,
	#sidebar .widget_recent_comments ul li:before,
	#sidebar .widget_recent_comments ul li i,
	#sidebar .widget_recent_comments ul li a:hover,
	#sidebar .widget_tag ul li a:hover,
	.widget_search i{
		color: <?php echo $featured_color; ?>!important;
	}
	
	
	
	#respond .add-on,
	.service_item .service_icon i,
	.pagination a,
	#respond input, #contact-form input,
	#respond textarea, #contact-form textarea,
	#respond .add-on, #contact-form .add-on,
	footer .quick_contact .form input:focus,
	footer .quick_contact .form textarea:focus,
	.portfolio_item a .ql_hover,
	.widget_search #s:focus,
	.widget_post_tabs .nav-tabs > .active > a:hover,
	.widget_post_tabs .tab-content{
		border-color: <?php echo $featured_color; ?>!important;
	}

	.widget_post_tabs .nav-tabs > .active > a{
		border-color: <?php echo $featured_color; ?>  <?php echo $featured_color; ?> transparent!important;
	}
	











	.logo_container h1 a,
	#footer h4,
	#footer ul li > a:hover, footer ol li > a:hover,
	.filter_list h4,
	.sub_footer_wrap,
	#footer p, #footer ul, #footer ol,
	#footer ul li > a, footer ol li > a,
	.metadata ul li strong,
	.portfolio_item .ql_hover h2{
		color: <?php echo $textColor; ?>!important;
	}









	.service_item:hover .service_icon i,
	ul.fancy_tags li a:hover,
	.more-link:hover,
	#sidebar .widget_tag ul li a:hover,
	.widget_search #s:focus,
	#respond input, #contact-form input,
	#respond textarea, #contact-form textarea,
	#respond #submit-respond:hover, #contact-form #submit-form:hover,
	footer .quick_contact .form input:focus,
	footer .quick_contact .form textarea:focus,
	.preloader,
	.portfolio_item a .ql_hover{
		background-color: <?php echo $body_color; ?>!important;
	}




	.service_item .service_icon i,
	.banner_cta > div a.btn,
	ul.fancy_tags li a,
	.pagination .active a,
	.pagination a:hover,
	.more-link,
	#sidebar .widget > ul li > a:hover,
	#sidebar .widget_tag ul li a,
	#respond .add-on, #contact-form .add-on,
	#respond #submit-respond, #contact-form #submit-form,
	.btn-cta,
	.btn-primary,
	.btn-primary:hover,
	.portfolio_item a .ql_hover .p_icon{
		color: <?php echo $body_color; ?>!important;
	}

    </style>

  <?php  
  
}

add_action( 'wp_head', 'header_styles' );
?>