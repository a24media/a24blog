<?php
/**
 * Dynamic css
*/
if ( ! function_exists( 'xpressmag_dynamic_colors' ) ) {

    function xpressmag_dynamic_colors() {
        
        $primary_color = esc_attr( get_theme_mod('xpressmag_primary_theme_color_options', '#FF7D0E') );

        $xmag_colors = '';      
        
        //Background Color Options
        $xmag_colors .= "
        .primary_navigation>ul>li.current-menu-item,
        .primary_navigation>ul>li.current_page_item,
		
		#toTop,
        .calendar_wrap caption,

		.search-form input[type='submit'],

		.pagination .page-numbers.current,

		.post_tags a,

		.xmag-timeline .xmag-post-item:hover:after,

		button:hover, input[type='button']:hover, 
		input[type='reset']:hover, 
		input[type='submit']:hover, 
		button:focus, 
		input[type='button']:focus, 
		input[type='reset']:focus, 
		input[type='submit']:focus,
		button:active, 
		input[type='button']:active, 
		input[type='reset']:active, 
		input[type='submit']:active,

		#xmag-tags a:hover,

		.error_head h3::after,

        .owl-carousel .owl-nav button.owl-prev, 
        .owl-carousel .owl-nav button.owl-next{
            background-color: $primary_color;
        }\n";


        // Color Options
        $xmag_colors .= "
        a:hover,
        .xp_banner .post_title h2 a:hover,
        .xp_banner .post_meta li a:hover,
        .post_meta li a:hover,

        .copyright_section a:hover,

        .xp_post_page_lay_wrap .the_content blockquote:before,

        .the_content a,

        .comments-area .comment-metadata a,

        .comment-reply-link:hover,
        .comment-reply-title a:hover,

        .xp_archive_page h2.list_head span, 
        .xp_search_page h2.list_head span, 
        .xp_not_found_page h2.list_head span,

        .breadcrumb ul li:last-child span,
        .breadcrumb ul li a:hover,
        .breadcrumb ul li a:hover span,

        .xp_post_widget_one .post_title h2 a:hover, 
        .xp_post_widget_eleven .post_title h2 a:hover, 
        .trending_widget_carousel .post_title h2 a:hover, 
        .xp_post_widget_one .post_meta li a:hover, 
        .xp_post_widget_eleven .post_meta li a:hover, 
        .trending_widget_carousel .post_meta li a:hover,
        .copyrights .privacy-policy-link{
            color: $primary_color;
        }\n";

        // Border Color Options
        $xmag_colors .= "
        .primary_navigation,

        .pagination .page-numbers:hover,

        .post_sharing span::after, 
        .post_tags span::after,

        .comments-area h2::after, 
        .comment-respond h3::after,

        .xmag-tabs-wdt .ui-state-active,

        .menu_search form,

        .section_title h2::after,
        .widget_title h3::after{
            border-color: $primary_color;
        }\n";

        wp_add_inline_style( 'xpressmag-main-style', $xmag_colors );
    }
}
add_action( 'wp_enqueue_scripts', 'xpressmag_dynamic_colors', 99 );