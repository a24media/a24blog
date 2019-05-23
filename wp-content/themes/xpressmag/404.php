<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package xpressmag
 */
get_header(); ?>

	<div class="xp_container">
        <div class="inner_page_wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="xp_post_page_lay_wrap xp_classic_page">
                        
                        <?php
                            /**
                            *
                            * @hooked xpressmag_breadcrumbs - 10
                            */
                            do_action( 'xpressmag_breadcrumbs' );
                        ?>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sticky_portion">

                            	<div class="content_entry">

                            		<header class="page-header">
										<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'xpressmag' ); ?></h2>
									</header><!-- .page-header -->

                                    <div class="error_page">
                                        <div class="error_head">
                                            <h3><?php esc_html_e('404','xpressmag'); ?></h3>
                                            <h4><?php esc_html_e('Page not found!','xpressmag'); ?></h4>
                                        </div>

                                        <div class="error_body">
                                        	<p><?php esc_html_e('It looks like nothing was found at this location.','xpressmag'); ?></p>
											<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Click Here','xpressmag'); ?></a> <?php esc_html_e('to go back to homepage.','xpressmag'); ?></p>
										</div>
                                        
                                    </div> <!-- // error_page -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php get_footer();