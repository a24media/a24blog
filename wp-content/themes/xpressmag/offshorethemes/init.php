<?php
/**
 * Main Custom admin functions area
 *
 * @since Offshore Themes
 *
 * @param xpressmag
 *
*/
if( !function_exists('xpressmag_file_directory') ){

    function xpressmag_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Custom functions that act independently of the theme header.
*/
require xpressmag_file_directory('offshorethemes/core/custom-header.php');

/**
 * Custom template tags for this theme.
*/
require xpressmag_file_directory('offshorethemes/core/template-tags.php');

/**
 * Functions which enhance the theme by hooking into WordPress.
*/
require xpressmag_file_directory('offshorethemes/core/template-functions.php');

/**
 * Customizer additions.
*/
require xpressmag_file_directory('offshorethemes/customizer/customizer.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {

	require xpressmag_file_directory('offshorethemes/core/jetpack.php');

}

/**
 * Load Custom Admin functions that act independently of the theme functions.
*/
require xpressmag_file_directory('offshorethemes/functions.php');

/**
 * Load Dynamic CSS file.
*/
require xpressmag_file_directory('offshorethemes/dynamic-css.php');

/**
 * Load Widget function file
 */
require xpressmag_file_directory('offshorethemes/widgets/xmag-widget-fields.php');

/**
 * Load Custom Widget File
*/
require xpressmag_file_directory('offshorethemes/widgets/xmag-social-media.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-multiple-block-posts.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-fullwidth-slider-posts.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-carousel-slider-posts.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-featured-block-posts.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-recent-random-posts.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-timeline-block-posts.php');
require xpressmag_file_directory('offshorethemes/widgets/xmag-tabbed.php');

/**
 * Load Dynamic Colors CSS File
 */
require xpressmag_file_directory('offshorethemes/dynamic-css.php');

/**
 * Load Breadcrumbs File
 */
require xpressmag_file_directory('offshorethemes/breadcrumbs.php');

/**
 * Load Admin info.
 */
if ( is_admin() ) {

	require get_theme_file_path('offshorethemes/admin/about-theme/class.info.php');
	require get_theme_file_path('offshorethemes/admin/about-theme/info.php');
	
}

/**
 * Load OCDI libraries.
 */
require get_theme_file_path('offshorethemes/xpressmagocdi.php');


/**
 * Load in customizer upgrade to pro
*/
require xpressmag_file_directory('offshorethemes/customizer/customizer-pro/class-customize.php');


