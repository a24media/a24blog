<?php
/**
 * xpressmag Theme Customizer
 *
 * @package xpressmag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xpressmag_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'xpressmag_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'xpressmag_customize_partial_blogdescription',
		) );

	}


	$wp_customize->get_section( 'title_tagline' )->panel = 'xpressmag_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';

    $wp_customize->get_section( 'colors' )->panel    = 'xpressmag_general_settings_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';

    $wp_customize->get_section( 'background_image' )->panel = 'xpressmag_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';

    $wp_customize->get_section( 'static_front_page' )->panel = 'xpressmag_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->priority = '20';

    $wp_customize->get_section( 'header_image' )->panel = 'xpressmag_general_settings_panel';
    $wp_customize->get_section( 'header_image' )->priority = '21';

    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
    */
    $wp_customize->add_panel(
	    'xpressmag_general_settings_panel',
	    array(
	        'priority'       => 5,
	        'theme_supports' => '',
	        'title'          => esc_html__( 'General Settings', 'xpressmag' ),
	    )
    );


    /**
     * Website layout section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'xpressmag_website_layout_section',

        array(
            'title'         => esc_html__( 'Website Layout', 'xpressmag' ),
            'priority'      => 55,
            'panel'         => 'xpressmag_general_settings_panel',
        )
    );
    
    $wp_customize->add_setting(
        'xpressmag_website_layout_options',

        array(
            'default'           => 'boxed_layout',
            'sanitize_callback' => 'xpressmag_sanitize_website_layout',
        )       
    );

    $wp_customize->add_control(
        'xpressmag_website_layout_options',

        array(
            'type'          => 'radio',
            'label'         => esc_html__( 'WebSite Page Layout', 'xpressmag' ),
            'section'       => 'xpressmag_website_layout_section',
            'choices'       => array(
                'fullwidth_layout' => esc_html__( 'FullWidth Layout', 'xpressmag' ),
                'boxed_layout'     => esc_html__( 'Boxed Layout', 'xpressmag' )
            ),
        )
    );


    /**
     * Theme Primary Color Options
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'xpressmag_primary_theme_color_section',

        array(
            'title'         => esc_html__( 'Themes Colors Settings', 'xpressmag' ),
            'priority'      => 6,
        )
    );

    $wp_customize->add_setting(
        'xpressmag_primary_theme_color_options',

        array(
            'default'     => '#FF7D0E',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    ); 

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'xpressmag_primary_theme_color_options',

            array(
                'label'      => esc_html__( 'Theme Primary Colors', 'xpressmag' ),
                'section'    => 'xpressmag_primary_theme_color_section',
            )
        )
    );


    /**
     * Add Header Section Panel
     *
     * @since 1.0.0
    */
    $wp_customize->add_panel(
	    'xpressmag_header_settings_panel',

	    array(
	        'priority'       => 7,
	        'title'          => esc_html__( 'Main Header Settings', 'xpressmag' ),
	    )
    );


	/**
     * Top Header Section
     */
    $wp_customize->add_section(
        'xpressmag_top_header_section',

        array(
            'title'     => esc_html__( 'Top Header Section', 'xpressmag' ),
            'panel'     => 'xpressmag_header_settings_panel'
        )
    );

    /**
     * Enable/Disable option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
    	'xpressmag_top_header_section_options', 

    	array(
			'sanitize_callback' => 'xpressmag_sanitize_on_off',
			'default' => 'on'
		) 
	);

	$wp_customize->add_control( new Xpressmag_Switch_Control( 
		$wp_customize, 
			'xpressmag_top_header_section_options', 

			array(
				'settings'		=> 'xpressmag_top_header_section_options',
				'section'		=> 'xpressmag_top_header_section',
				'label'			=> esc_html__( 'Top Header Section', 'xpressmag' ),
				'description'   => esc_html__( 'Enable/Disable option for top header section.', 'xpressmag' ),
				'on_off_label' 	=> array(
					'on'  => esc_html__( 'Enable', 'xpressmag' ),
					'off' => esc_html__( 'Disable', 'xpressmag' )
				)	
			) 
		) 
	);


	/**
   	 * Category Color Section
   	 *
   	 * @since 1.0.0
   	 */
    $wp_customize->add_section(
        'xpressmag_categories_color_section',

        array(
            'title'         => esc_html__( 'Categories Colors Options', 'xpressmag' ),
            'priority'      => 10,
        )
    );

    $i = 1;

    $args = array(
       'orderby' => 'id',
       'hide_empty' => 0
    );

    $categories = get_categories( $args );

    $wp_category_list = array();

    foreach ($categories as $category_list ) {

        $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

        $wp_customize->add_setting('xpressmag_category_color_'.get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), 

            array(
                'default' => '',
                'sanitize_callback'    => 'xpressmag_color_option_hex_sanitize',
                'sanitize_js_callback' => 'xpressmag_color_escaping_option_sanitize'
            )
        );

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize, 

            'xpressmag_category_color_'.get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), 
                array(
                    'label' => sprintf( '%1$s', $wp_category_list[ $category_list->cat_ID ] ),
                    'section' => 'xpressmag_categories_color_section',
                    'settings' => 'xpressmag_category_color_'.get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
                    'priority' => $i
                )
            )
        );

        $i++;
    }


	/**
	 * Register the radio image control class as a JS control type.
	*/
    $wp_customize->register_control_type( 'Xpressmag_Customize_Control_Radio_Image' );

	/**
     * Add Design Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'xpressmag_design_settings_panel',

	    array(
	        'priority'       => 11,
	        'title'          => esc_html__( 'Design Layout Settings', 'xpressmag' ),
	    )
    );

	/**
     * Archive/Category Settings
     *
     * @since 1.0.0
    */

    $wp_customize->add_section(
        'xpressmag_archive_settings_section',

        array(
            'title'     => esc_html__( 'Archive/Category Settings', 'xpressmag' ),
            'panel'     => 'xpressmag_design_settings_panel',
        )
    );      

    /**
     * Image Radio field for archive/category sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'xpressmag_archive_sidebar',

        array(
            'default'           => 'rightsidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );

    $wp_customize->add_control( new Xpressmag_Customize_Control_Radio_Image(
        $wp_customize,
        'xpressmag_archive_sidebar',

            array(
                'label'    => esc_html__( 'Archive/Category Sidebars', 'xpressmag' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'xpressmag' ),
                'section'  => 'xpressmag_archive_settings_section',
                'choices'  => array(
                        'leftsidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/left-sidebar.png'
                        ),
                        'rightsidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/right-sidebar.png'
                        ),
                        'nosidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/no-sidebar.png'
                        )
                )
            )
        )
    );

    /**
     * Image Radio field for archive/category layout
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'xpressmag_archive_layout',

        array(
            'default'           => 'classic',
            'sanitize_callback' => 'sanitize_key',
        )
    );

    $wp_customize->add_control( new Xpressmag_Customize_Control_Radio_Image(
        $wp_customize,
        'xpressmag_archive_layout',

            array(
                'label'    => esc_html__( 'Archive/Category Layouts', 'xpressmag' ),
                'description' => esc_html__( 'Choose layout from available layouts', 'xpressmag' ),
                'section'  => 'xpressmag_archive_settings_section',
                'choices'  => array(
                        'classic' => array(
                            'label' => esc_html__( 'Classic Layouts', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/block-layout4.png'
                        ),
                        'grid' => array(
                            'label' => esc_html__( 'Grid Layouts', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/feature-post1.png'
                        )
                )
            )
        )
    );


    /**
     * Page Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'xpressmag_page_settings_section',

        array(
            'title'     => esc_html__( 'Page Layout Settings', 'xpressmag' ),
            'panel'     => 'xpressmag_design_settings_panel',
        )
    );      

    /**
     * Image Radio for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'xpressmag_default_page_sidebar',

        array(
            'default'           => 'rightsidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );

    $wp_customize->add_control( new Xpressmag_Customize_Control_Radio_Image(
        $wp_customize,
        'xpressmag_default_page_sidebar',

            array(
                'label'    => esc_html__( 'Page Sidebars', 'xpressmag' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'xpressmag' ),
                'section'  => 'xpressmag_page_settings_section',
                'choices'  => array(
                        'leftsidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/left-sidebar.png'
                        ),
                        'rightsidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/right-sidebar.png'
                        ),
                        'nosidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/no-sidebar.png'
                        )
                )
            )
        )
    );

    /**
     * Post Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'xpressmag_post_settings_section',

        array(
            'title'     => esc_html__( 'Single Post Layout Settings', 'xpressmag' ),
            'panel'     => 'xpressmag_design_settings_panel',
        )
    );      

    /**
     * Image Radio for post sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'xpressmag_default_post_sidebar',

        array(
            'default'           => 'rightsidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );

    $wp_customize->add_control( new Xpressmag_Customize_Control_Radio_Image(
        $wp_customize,
        'xpressmag_default_post_sidebar',

            array(
                'label'    => esc_html__( 'Post Sidebars', 'xpressmag' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'xpressmag' ),
                'section'  => 'xpressmag_post_settings_section',
                'choices'  => array(
                        'leftsidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/left-sidebar.png'
                        ),
                        'rightsidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/right-sidebar.png'
                        ),
                        'nosidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/no-sidebar.png'
                        )
                )
            )
        )
    );

    /**
     * Enable/Disable Option for Related posts
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'xpressmag_author_posts_option', 

        array(
            'sanitize_callback' => 'xpressmag_sanitize_on_off',
            'default' => 'on'
        ) 
    );

    $wp_customize->add_control( new Xpressmag_Switch_Control( 
        $wp_customize, 
            'xpressmag_author_posts_option', 

            array(
                'settings'      => 'xpressmag_author_posts_option',
                'section'       => 'xpressmag_post_settings_section',
                'label'         => esc_html__( 'Post Author Option', 'xpressmag' ),
                'description'   => esc_html__( 'Enable/Disable option for Author Post.', 'xpressmag' ),
                'on_off_label'  => array(
                    'on'  => esc_html__( 'Enable', 'xpressmag' ),
                    'off' => esc_html__( 'Disable', 'xpressmag' )
                )   
            ) 
        ) 
    );

    /**
     * Enable/Disable Option for Related posts
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
    	'xpressmag_related_posts_option', 

    	array(
			'sanitize_callback' => 'xpressmag_sanitize_on_off',
			'default' => 'on'
		) 
	);

	$wp_customize->add_control( new Xpressmag_Switch_Control( 
		$wp_customize, 
			'xpressmag_related_posts_option', 

			array(
				'settings'		=> 'xpressmag_related_posts_option',
				'section'		=> 'xpressmag_post_settings_section',
				'label'			=> esc_html__( 'Related Post Option', 'xpressmag' ),
				'description'   => esc_html__( 'Enable/Disable option for Related Post.', 'xpressmag' ),
				'on_off_label' 	=> array(
					'on'  => esc_html__( 'Enable', 'xpressmag' ),
					'off' => esc_html__( 'Disable', 'xpressmag' )
				)	
			) 
		) 
	);

    /**
     * Text field for related post section title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'xpressmag_related_posts_title',
        array(
            'default'    => '',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'xpressmag_related_posts_title',

        array(
            'type'      => 'text',
            'label'     => esc_html__( 'Related Post Section Title', 'xpressmag' ),
            'section'   => 'xpressmag_post_settings_section',
        )
    );

    /**
     * Search Settings
     *
     * @since 1.0.0
    */

    $wp_customize->add_section(
        'xpressmag_search_settings_section',

        array(
            'title'     => esc_html__( 'Search Page Settings', 'xpressmag' ),
            'panel'     => 'xpressmag_design_settings_panel',
        )
    );      

    /**
     * Image Radio field for archive/category sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'xpressmag_search_sidebar',

        array(
            'default'           => 'rightsidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );

    $wp_customize->add_control( new Xpressmag_Customize_Control_Radio_Image(
        $wp_customize,
        'xpressmag_search_sidebar',

            array(
                'label'    => esc_html__( 'Search Page Sidebars', 'xpressmag' ),
                'description' => esc_html__( 'Choose sidebar from available layouts', 'xpressmag' ),
                'section'  => 'xpressmag_search_settings_section',
                'choices'  => array(
                        'leftsidebar' => array(
                            'label' => esc_html__( 'Left Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/left-sidebar.png'
                        ),
                        'rightsidebar' => array(
                            'label' => esc_html__( 'Right Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/right-sidebar.png'
                        ),
                        'nosidebar' => array(
                            'label' => esc_html__( 'No Sidebar', 'xpressmag' ),
                            'url'   => '%s/assets/dist/images/no-sidebar.png'
                        )
                )
            )
        )
    );

    /**
	 * Social Media Icons Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'xpressmag_social_icons_section',

        array(
            'title'		=> esc_html__( 'Social Media Links Settings', 'xpressmag' ),
            'priority'  => 15,
        )
    );

    /**
     * Repeater field for social media links icons
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'xpressmag_social_media_icons',

        array(
            'sanitize_callback' => 'xpressmag_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'social_icon_class' => 'fa fa-facebook-f',
                    'social_icon_url' => '',
                )
            ))
        )
    );

    $wp_customize->add_control( new Xpressmag_Repeater_Controler(
        $wp_customize, 
            'xpressmag_social_media_icons', 

            array(
                'label'   => esc_html__( 'Sociala Media Link Settings', 'xpressmag' ),
                'section' => 'xpressmag_social_icons_section',
                'settings' => 'xpressmag_social_media_icons',
                'xpressmag_box_label'       => esc_html__( 'Social Media Icon','xpressmag' ),
                'xpressmag_box_add_control' => esc_html__( 'Add Icon','xpressmag' )
            ),

            array(
                'social_icon_class' => array(
                    'type'        => 'social_icon',
                    'label'       => esc_html__( 'Social Media Logo', 'xpressmag' ),
                    'description' => esc_html__( 'Choose social media icon.', 'xpressmag' )
                ),

                'social_icon_url' => array(
                    'type'        => 'url',
                    'label'       => esc_html__( 'Social Meida URL', 'xpressmag' ),
                    'description' => esc_html__( 'Enter social media url.', 'xpressmag' )
                )
            )
        ) 
    );


    /**
	 * Footer Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
		'xpressmag_footer_section',

		array(
			'title' => esc_html__( 'Main Footer Settings', 'xpressmag' ),
			'priority' => 20,
		)
	);


	/**
     * Enable/Disable Option for Main Footer Widget Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
    	'xpressmag_footer_widget_area_option', 

    	array(
			'sanitize_callback' => 'xpressmag_sanitize_on_off',
			'default' => 'on'
		) 
	);

	$wp_customize->add_control( new Xpressmag_Switch_Control( 
		$wp_customize, 
			'xpressmag_footer_widget_area_option', 

			array(
				'settings'		=> 'xpressmag_footer_widget_area_option',
				'section'		=> 'xpressmag_footer_section',
				'label'			=> esc_html__( 'Footer Widgert Area Option', 'xpressmag' ),
				'description'   => esc_html__( 'Enable/Disable option for footer widget section.', 'xpressmag' ),
				'on_off_label' 	=> array(
					'on'  => esc_html__( 'Enable', 'xpressmag' ),
					'off' => esc_html__( 'Disable', 'xpressmag' )
				)	
			) 
		) 
	);

	$wp_customize->add_setting(
		'xpressmag_footer_section_options', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'xpressmag_footer_section_options',

		array(
			'type' => 'textarea',
			'label' => esc_html__('Footer Content (Copyright Text)', 'xpressmag'),
			'section' => 'xpressmag_footer_section',
			'settings' => 'xpressmag_footer_section_options'
		) 
	);


    /**
	 * On/Off Sanitization Function
	 *
	 * @since 1.0.0
	 */
    function xpressmag_sanitize_on_off($input) {

       $valid_keys = array(
          	'on'  => esc_html__( 'Enable', 'xpressmag' ),
			'off' => esc_html__( 'Disable', 'xpressmag' )
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }

    }


    /**
	 * WebPage Layout Sanitization Function
	 *
	 * @since 1.0.0
	 */
    function xpressmag_sanitize_website_layout($input) {

       $valid_keys = array(
          	'fullwidth_layout' => esc_html__( 'FullWidth Layout', 'xpressmag' ),
            'boxed_layout'     => esc_html__( 'Boxed Layout', 'xpressmag' )
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }

    }

    /**
     * Category Colors Sanitization
     *
     * @since 1.0.0
     */
    function xpressmag_color_option_hex_sanitize( $color ) {

      if ( $unhashed = sanitize_hex_color_no_hash( $color ) )

         return '#' . $unhashed;
     
      return $color;
    }

    function xpressmag_color_escaping_option_sanitize( $input ) {

      $input = esc_attr($input);

      return $input;
    }

    /**
	 * Sanitize repeater value
	 *
	 * @since 1.0.0
	 */
	function xpressmag_sanitize_repeater( $input ){

	    $input_decoded = json_decode( $input, true );
	        
	    if( !empty( $input_decoded ) ) {
	        foreach ( $input_decoded as $boxes => $box ){
	            foreach ( $box as $key => $value ){
	                $input_decoded[$boxes][$key] = wp_kses_post( $value );
	            }
	        }
	        return json_encode( $input_decoded );
	    }
	    
	    return $input;
	}



}
add_action( 'customize_register', 'xpressmag_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function xpressmag_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function xpressmag_customize_partial_blogdescription() {

	bloginfo( 'description' );
	
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 *
 */
function xpressmag_customize_backend_scripts() {

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/dist/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
    
    wp_enqueue_style( 'xpressmag-customizer-style', get_template_directory_uri() . '/assets/dist/css/xmag-customizer-style.css' );

    wp_enqueue_script( 'xpressmag-customizer-controls', get_template_directory_uri() . '/assets/dist/js/xmag-customizer-controls.js', array( 'jquery', 'customize-controls' ), '20180910', true );
	
}
add_action( 'customize_controls_enqueue_scripts', 'xpressmag_customize_backend_scripts' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xpressmag_customize_preview_js() {

	wp_enqueue_script( 'xpressmag-customizer', get_template_directory_uri() . '/assets/dist/js/customizer.js', array( 'customize-preview' ), '20151215', true );

}
add_action( 'customize_preview_init', 'xpressmag_customize_preview_js' );
