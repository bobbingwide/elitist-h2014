<?php
/**
 * Muestra un Menú de navegación del tipo Breadcrumbs
 *
 * @param array $args
 * @return string
 */
function breadcrumbs( $args = '' ) {

	$defaults = array(
		'prefix' => '',
		'suffix' => '',
		'home' => __('<i class="icon-home"></i>', 'eneaa'),
		'sep' => ' &raquo; ',
		'front_page' => false,
		'bold' => false,
		'blog' => __('Blog', 'eneaa'),
		'echo' => true
	);

	$r = wp_parse_args( $args, $defaults );

	if ( is_front_page()  )
		return apply_filters( 'breadcrumbs', false );

	global $wp_query, $post;

	function bold( $input, $lastbold ) {
		if ( $lastbold )
			return '<strong>'. $input . '</strong>';

		return $input;
	}

	function custom_get_category_parents( $id, $link = FALSE, $separator = '/', $nicename = FALSE, $bold ){
		$chain = '';
		$parent = &get_category( $id );

		if ( is_wp_error( $parent ) )
			return $parent;

		if ( $nicename )
			$name = $parent->slug;
		else
			$name = $parent->cat_name;

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) )
			$chain .= get_category_parents( $parent->parent, true, $separator, $nicename );

		$chain .= bold( $name, $bold );

		return $chain;
	}

	$on_front = get_option( 'show_on_front' );

	if ( $on_front == "page" ) {
		
		
		
		$queried_post_type = get_query_var('post_type');
		if($queried_post_type){
			$homelink = '<a class="breadcrumb_home" href="' . get_permalink( get_option( 'page_on_front' ) ) . '">' . $r['home'] . '</a>';
			$bloglink = $homelink . ' ' . $r['sep'] . ' <a href="javascript:history.back(1)">' . ucwords($queried_post_type) . '</a>';
		}else{//If not Post Type
			$homelink = '<a class="breadcrumb_home" href="' . get_permalink( get_option( 'page_on_front' ) ) . '">' . $r['home'] . '</a>';
			$bloglink = $homelink . ' ' . $r['sep'] . ' <a href="' . get_permalink( get_option( 'page_for_posts' ) ).'">' . $r['blog'] . '</a>';
		}
		
		
	} else {
		$homelink = '<a href="' . home_url( '/' ) . '" rel="home">' . $r['home'] . '</a>';
		$bloglink = $homelink;
	}

	if ( ( $on_front == "page" && is_front_page() ) || ( $on_front == "posts" && is_home() ) )
		$output = bold( $home, $r['bold'] );

	elseif ( $on_front == "page" && is_home() )
		$output = $homelink . ' ' . $r['sep'] . ' ' . bold( $r['blog'], $r['bold'] );
		
		
		

	elseif ( !is_page() ) {
		$output = $bloglink . ' ' . $r['sep'] . ' ';
		

		if ( is_single() ) {
			
			$cats = get_the_category();
			if($cats){
				$cat = $cats[0];
			
				if ( is_object( $cat ) ) {
					if ( $cat->parent != 0 )
						$output .= get_category_parents( $cat->term_id, true, " " . $r['sep'] . " " );
					else
						$output .= '<a href="' . get_category_link( $cat->term_id ) . '">' . $cat->name . '</a> ' . $r['sep'] . ' ';
				}
			}
		}

		if ( is_archive() ) {
			if ( is_category() ) {
				$cat = intval( get_query_var( 'cat' ) );
				$output .= custom_get_category_parents( $cat, false, " " . $r['sep'] . " ", false, $r['bold'] );

			} elseif ( is_tag() || is_tax() ) {
				$term = $wp_query->get_queried_object();
				$output .= bold( "Archives for " . $term->name, $r['bold'] );

			} elseif ( is_date() ) {
				$output .= bold( "Archives for " . single_month_title( ' ', false ), $r['bold'] );

			} elseif ( is_author() ) {
				$output .= bold( "Archives by " . get_the_author_meta( 'display_name', $wp_query->post->post_author ), $r['bold'] );
			}

		} elseif ( is_search() ) {
			$output .= bold( 'Search results for "' . stripslashes( strip_tags( get_search_query() ) ) . '"', $r['bold'] );

		} elseif ( is_404() ) {
			$output .= bold( 'Page Not Found', $r['bold'] );

		} else {
			$output .= bold( get_the_title(), $r['bold'] );

		}
	} else {
		$post = $wp_query->get_queried_object();

		if ( 0 == $post->post_parent ) {
			$output = $homelink. " " . $r['sep'] . " " . bold( get_the_title(), $r['bold'] );

		} else {
			if ( isset( $post->ancestors ) ) {

				if ( is_array( $post->ancestors ) )
					$ancestors = array_values( $post->ancestors );
				else
					$ancestors = array( $post->ancestors );

			} else
				$ancestors = array( $post->post_parent );

			$ancestors = array_reverse( $ancestors );
			$ancestors[] = $post->ID;

			$links = array();
			foreach ( ( array ) $ancestors as $ancestor ) {
				$tmp = array();
				$tmp['title'] = strip_tags( get_the_title( $ancestor ) );
				$tmp['url'] = get_permalink( $ancestor );
				$tmp['cur'] = false;

				if ( $ancestor == $post->ID )
					$tmp['cur'] = true;

				$links[] = $tmp;
			}

			$output = $homelink;
			foreach ( ( array ) $links as $link ) {
				$output .= ' ' . $r['sep'] . ' ';

				if ( !$link['cur'] )
					$output .= '<a href="' . $link['url'] . '">' . $link['title'] . '</a>';
				else
					$output .= bold( $link['title'], $r['bold'] );
			}
		}
	}

	$breadcrumb = $r['prefix'] . $output . $r['suffix'];
	$breadcrumb = apply_filters( 'breadcrumbs', $breadcrumb );

	if ( !$r['echo'] )
		return $breadcrumb;

	echo $breadcrumb;
}


?>