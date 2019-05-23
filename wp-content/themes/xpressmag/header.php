<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpressmag
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<?php wp_head(); ?>

 <style type="text/css">
        
        /* Page content */
.content {
  padding: 16px;
}

/* The sticky class is added to the navbar with JS when it reaches its scroll position */
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

/* Add some top padding to the page content to prevent sudden quick movement (as the navigation bar gets a new position at the top of the page (position:fixed and top:0) */
.sticky + .content 
{
  padding-top: 60px;
}

#header_banner
{
   width: 100%;
   height: 400px;
   background:no-repeat url("wp-content/uploads/2019/05/blogbest.png");
   background-size: cover;
   background-attachment: fixed;
   background-position: center;
}
    </style>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site page_wrap">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'xpressmag' ); ?></a>
	
	<header id="masthead" class="site-header general_header">
        <?php if( get_theme_mod( 'xpressmag_top_header_section_options', 'on' ) == 'on' ){ ?>
            <div class="header_top">
                <div class="xp_container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="header_top_left"  class="header_top_socical" style="float: right;">
                                   <ul>
                                        <li><a  href="#"><i class="fa fa-facebook" aria-hidden="true" style="color:#2f55a4"></i></a></li>
                                        <li><a  href="#"><i class="fa fa-twitter" aria-hidden="true" style="color:#00acee"></i></a></li>
                                        <li><a  href="#"><i class="fa fa-google-plus" aria-hidden="true" style="color:#DD4B39"></i></a></li>
                                        <li><a  href="#"><i class="fa fa-linkedin" aria-hidden="true" style="color:#0077B5"></i></a></li>
                                        <li><a  href="#"><i class="fa fa-instagram" aria-hidden="true" style="color:#3f729b"></i></a></li>

                                        </ul>
                                <?php
                                    if( has_nav_menu( 'menu-2' ) ){
                                        wp_nav_menu( array(
                                            'theme_location' => 'menu-2',
                                            'container'      => '',
                                        ) );
                                    }
                                ?>
                            <!-- </div>// top_left -->
                        <!-- </div>// col -->

                        <!-- <div class="col-md-4 col-sm-5 col-xs-12"> -->
                            <!-- <div class="header_top_socical"> -->
                            	<?php
                            		/**
                            		 * Social Media Link
                            		*/
                                    $facebook;
                            		do_action( 'xpressmag_social_media', 5 );
                            	?>
                            <!-- </div>// social -->
                        <!-- </div>// col -->
                     </div>
                 </div>

                    </div><!-- // row -->
                </div><!-- // xp_container -->
            </div><!-- // header_top -->
        <?php } ?>
        <div class="xp_container">
            <div class="logo_area">
                <div class="row" >
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        
                        <div class="logo site-branding">
					
						  <h1 class="site-title">
                                <?php the_custom_logo(); ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); 
                                    ?>

                                    <!-- This php block has been moved -->
                               <?php 
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() )
                                 { 
                                    ?>
                                    <p class="site-description" style="margin-top: -30px; margin-left: 150px ; font-weight: bold;">
                                        <?php echo $description; /* WPCS: xss ok. */ ?>
                                    </p>
                                  <?php 
                                    } 

                                    ?>  

                                </a>
							</h1>
							

						</div> <!-- .site-branding -->

                    </div> <!-- // col -->

                    <div class="col-md-8 col-sm-12 col-xs-12" >
                        <div class="adv_space">
                            <?php 
                            	if( is_active_sidebar( 'headerads' ) ){
							        dynamic_sidebar( 'headerads' );
							    }
							?>
							    
                        </div><!-- // adv_space -->
                    </div><!-- // col -->
                </div><!-- // row -->
            </div><!-- // logo_area -->


            <nav class="main_navigation" id="navbar" style="z-index: 10000;" class="content">

                <div id="main-nav" class="primary_navigation">
                    <?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container'      => '',
						) );
					?>
                </div> <!-- // primary_navigation -->

                <div class="menu_search">
                	<?php get_search_form(); ?>
                </div> <!-- // menu_search -->
            </nav>

            <script type="text/javascript">
                // When the user scrolls the page, execute myFunction 
                            window.onscroll = function() {myFunction()};

                            // Get the navbar
                            var navbar = document.getElementById("navbar");

                            // Get the offset position of the navbar
                            var sticky = navbar.offsetTop;

                            // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
                            function myFunction() {
                              if (window.pageYOffset >= sticky) {
                                navbar.classList.add("sticky")
                              } else {
                                navbar.classList.remove("sticky");
                              }
                            }

            </script>
<!-- Add the header -->

                <div class="container" id="header_banner">
                   <!-- <img src="wp-content/uploads/2019/05/blogbest.png" style="width: 100%; height: 400px;">-->
                    
                </div>
        </div><!-- // xp_container -->
    </header>

	<div id="content" class="site-content">
