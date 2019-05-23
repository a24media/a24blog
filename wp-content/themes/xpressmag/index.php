<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xpressmag
 */

get_header(); ?>
	
	<?php if( is_active_sidebar( 'home-1' ) ){ ?>
        <div class="xmag-top-fullwidth fullwidthsection">
            <div class="xp_container">
                <?php dynamic_sidebar( 'home-1' ); ?>               
            </div>
        </div> <!-- Full Width Top Widget Area -->
    <?php } ?>

	<div class="xp_container">
        <div class="inner_page_wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="xp_archive_page">
                        <div class="row">
							<div class="col-md-8 col-sm-12 col-xs-12 sticky_portion">
                                <div class="content_entry">
                                    <section class="list_page_iner">

                                        <section class="xp_post_widget_five section_spacing"> 
											<div class="section_inner">
		                                        <?php 

		                                        	if ( have_posts() ) : 

														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/content', get_post_type() );

														endwhile;

													else :

														get_template_part( 'template-parts/content', 'none' );

													endif; 
												?>
											</div>
										</section>

                                    </section> <!-- // section list -->
									
									<?php
										the_posts_pagination( 
						            		array(
											    'prev_text' => esc_html__( 'Prev', 'xpressmag' ),
											    'next_text' => esc_html__( 'Next', 'xpressmag' ),
											)
							            );
									?>

                                </div> <!-- // content_entry -->
                            </div>
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php get_footer();