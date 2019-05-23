<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package xpressmag
 */

get_header(); 

	$search_sidebar = get_theme_mod( 'xpressmag_search_sidebar', 'rightsidebar' );
?>

	<div class="xp_container">
        <div class="inner_page_wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="xp_archive_page">
                        
                        <?php
					    	/**
							*
							* @hooked xpressmag_breadcrumbs - 10
							*/
							do_action( 'xpressmag_breadcrumbs' );
					    ?>

                        <div class="row">
							
							<?php 
								if( $search_sidebar == 'leftsidebar' ) : 
						      
						    		get_sidebar('left');

						    	endif; 
						    ?>

                            <div class="<?php if( $search_sidebar == 'nosidebar' ){ echo esc_attr( 'col-md-12' ); }else{ echo esc_attr( 'col-md-8' ); } ?> col-sm-12 col-xs-12 sticky_portion">
                                <div class="content_entry">
                                    <section class="list_page_iner">

                                        <div class="section_title">
											<h2 class="list_head">
												<?php
													/* translators: %s: search query. */
													printf( esc_html__( 'Search Results for: %s', 'xpressmag' ), '<span>' . get_search_query() . '</span>' );
												?>
											</h2>
                                        </div> <!-- // section_title -->

                                        <section class="xp_post_widget_five section_spacing"> 
											<div class="section_inner">
		                                        <?php 

		                                        	if ( have_posts() ) : 

														while ( have_posts() ) : the_post();

															get_template_part( 'template-parts/content', 'search' );

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
                            
                            <?php 
								if( $search_sidebar == 'rightsidebar' ) : 
						      
						    		get_sidebar();

						    	endif; 
						    ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php get_footer();
