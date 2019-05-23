<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package xpressmag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xpressmag_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	//Web Page Layout
	if( get_theme_mod( 'xpressmag_website_layout_options', 'boxed_layout' ) == 'boxed_layout') {
		$classes[] = 'boxed';
	}

	return $classes;
}
add_filter( 'body_class', 'xpressmag_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function xpressmag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'xpressmag_pingback_header' );


/**
 * Define font awesome social media icons
 *
 * @return array();
 * @since 1.0.0
 */
if( ! function_exists( 'xpressmag_font_awesome_social_icon_array' ) ) :
    function xpressmag_font_awesome_social_icon_array(){
        return array(
                "fa fa-facebook-f","fa fa-facebook","fa fa-twitter","fa fa-yahoo",	"fa fa-google-wallet","fa fa-instagram","fa fa-linkedin","fa fa-pinterest-p","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus","fa fa-youtube","fa fa-vimeo",
            );
    }
endif;
