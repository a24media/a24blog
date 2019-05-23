<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all widgets included in homepage widget area.
 *
 * @package Offshore Themes
 *
 * @subpackage Xpressmag
 *
 * @since 1.0.0
 */

get_header(); ?>

    <?php if( is_active_sidebar( 'home-1' ) ){ ?>
        <div class="xmag-top-fullwidth fullwidthsection">
            <div class="xp_container">
                <?php dynamic_sidebar( 'home-1' ); ?>               
            </div>
        </div> <!-- Full Width Top Widget Area -->
    <?php } ?>
    
    <?php if( is_active_sidebar( 'home-2' ) || is_active_sidebar( 'home-sidebar' ) ){ ?>
        <div class="xmag-home-middle middlesection">
            <div class="xp_container">
                <div class="left_and_right_layout_divider">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 sticky_portion">
                            <div id="primary" class="content-area">
                                <main id="main" class="site-main">
                                    <?php dynamic_sidebar( 'home-2' ); ?>
                                </main>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-sm-12 col-xs-12 sticky_portion">
                            <aside id="secondary" class="widget-area">
                                <?php dynamic_sidebar( 'home-sidebar' ); ?>
                            </aside>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if( is_active_sidebar( 'home-3' ) ){ ?>
        <div class="xmag-button-fullwidth fullwidthsection">
            <div class="xp_container">
                <?php dynamic_sidebar( 'home-3' ); ?>               
            </div>
        </div> <!-- Full Width Top Widget Area -->
    <?php } ?>

<?php get_footer();