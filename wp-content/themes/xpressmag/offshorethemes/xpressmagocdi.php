<?php
/**
 * OCDI support.
 *
 * @package Xpressmag Pro
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function xpressmag_ocdi_after_import() {

    // Assign front page and posts page (blog page).
    $front_page_id = null;

    $front_page = get_page_by_title( 'Home' );

    if ( $front_page ) {
        if ( is_array( $front_page ) ) {
            $first_page = array_shift( $front_page );
            $front_page_id = $first_page->ID;
        } else {
            $front_page_id = $front_page->ID;
        }
    }

    if ( $front_page_id && $blog_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
    }

    // Assign navigation menu locations.
    $menu_location_details = array(
        'menu-1'     => 'main-menu',
        'menu-2'     => 'top-menu',
        'menu-3'     => 'footer-menu',
    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();
        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations', $navigation_settings );
    }
}
add_action( 'pt-ocdi/after_import', 'xpressmag_ocdi_after_import' );


/**
 * Demo import
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Xpressmag
 */
if (!function_exists('xpressmag_ocdi_files')) :
    /**
     * OCDI files.
     *
     * @since 1.0.0
     *
     * @return array Files.
     */
    function xpressmag_ocdi_files() {

        return apply_filters( 'xpressmag_demo_import_files', array(
            
            array(

                'import_file_name'             => esc_html__( 'Xpressmag Default', 'xpressmag' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-content/default/xpressmag.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-content/default/xpressmag.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/default/xpressmag.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'demo-content/assets/xpressmagpro.jpg',
                'preview_url'                  => 'https://offshorethemes.com/demo/xpressmag/',
            ),
            array(

                'import_file_name'             => esc_html__( 'XpressmagPro Glamour', 'xpressmag' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'demo-content/assets/xpressmagpro-glamour.jpg',
                'preview_url'                  => '#',
            ),
            array(

                'import_file_name'             => esc_html__( 'XpressmagPro Technology', 'xpressmag' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'demo-content/assets/xpressmagpro-technology.jpg',
                'preview_url'                  => '#',
            ),
            array(

                'import_file_name'             => esc_html__( 'XpressmagPro Sport', 'xpressmag' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'demo-content/assets/xpressmagpro-sport.jpg',
                'preview_url'                  => '#',
            ),
            array(

                'import_file_name'             => esc_html__( 'XpressmagPro News', 'xpressmag' ),
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'demo-content/assets/xpressmagpro-news.jpg',
                'preview_url'                  => '#',
            ),

        ));
    }
endif;
add_filter( 'pt-ocdi/import_files', 'xpressmag_ocdi_files');