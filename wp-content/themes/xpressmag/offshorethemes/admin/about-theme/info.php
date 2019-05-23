<?php
/**
 * Info setup
 *
 * @package Xpressmag
 */

if ( ! function_exists( 'xpressmag_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function xpressmag_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is an ultra-fast clean and best responsive free WordPress magazine theme, xpressmag specially designed for magazine, newspaper, news portals, and editorial style websites. xpressmag theme design flat, minimalist, magazine style homepage Design with full post banner and carousel slider with latest posts, and different custom widget design layout. multiple design layout categories, tags, archive pages with sidebars and Ads widgets. xpressmag full supports different 3rd party plugins and fully compatible with Jetpack, Contact Form 7, AccessPress Social Share, AccessPress Social Counter many more.','xpressmag' ), 'Xpressmag' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'xpressmag' ),
				'support'         => esc_html__( 'Support', 'xpressmag' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'xpressmag' ),
				'demo-content'    => esc_html__( 'Demo Content', 'xpressmag' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'xpressmag' ),
			),

			// Quick links.
			'quick_links' => array(

				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'xpressmag' ),
					'url'  => 'https://offshorethemes.com/wordpress-themes/xpressmag/',
				),

				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'xpressmag' ),
					'url'  => 'https://offshorethemes.com/demo/xpressmag/demos/',
				),

				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'xpressmag' ),
					'url'  => '#',
				),

				'rating_url' => array(
					'text' => esc_html__( 'Rate This Theme','xpressmag' ),
					'url'  => 'https://wordpress.org/support/theme/xpressmag/reviews/',
				),

				'upgrade_to_pro' => array(
					'text' => esc_html__( 'Buy Pro Themes','xpressmag' ),
					'url'  => 'https://offshorethemes.com/wordpress-themes/xpressmagpro/',
				)

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'xpressmag' ),
					'button_text' => esc_html__( 'View Documentation', 'xpressmag' ),
					'button_url'  => '#',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'xpressmag' ),
					'button_text' => esc_html__( 'Static Front Page', 'xpressmag' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'xpressmag' ),
					'button_text' => esc_html__( 'Customize', 'xpressmag' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Page Builder', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-admin-settings',
					'description' => esc_html__( 'Page Builder by SiteOrigin is integrated in the theme to achieve different layouts. Please make sure both Page Builder by SiteOrigin and SiteOrigin Widgets Bundle plugins are installed and activated.', 'xpressmag' ),
					),
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'xpressmag' ), esc_html__( 'One Click Demo Import', 'xpressmag' ) ),
					'button_text' => esc_html__( 'Demo Content', 'xpressmag' ),
					'button_url'  => admin_url( 'themes.php?page=xpressmag-info&tab=demo-content' ),
					'button_type' => 'secondary',
					),
				'six' => array(
					'title'       => esc_html__( 'Theme Preview', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'xpressmag' ),
					'button_text' => esc_html__( 'View Demo', 'xpressmag' ),
					'button_url'  => 'https://offshorethemes.com/demo/xpressmag/demos/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'xpressmag' ),
					'button_text' => esc_html__( 'Contact Support', 'xpressmag' ),
					'button_url'  => 'https://offshorethemes.com/forum/wordpress-themes/xpressmag/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'xpressmag' ),
					'button_text' => esc_html__( 'View Documentation', 'xpressmag' ),
					'button_url'  => '#',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'xpressmag' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'xpressmag' ),
					'button_text' => esc_html__( 'Learn More', 'xpressmag' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'xpressmag' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'xpressmag' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'xpressmag' ) . '</a>' ),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'xpressmag' ),
				'button_text' => esc_html__( 'Buy Pro Themes', 'xpressmag' ),
				'button_url'  => 'https://offshorethemes.com/wordpress-themes/xpressmagpro/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Xpressmag_Info::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'xpressmag_info_setup' );
