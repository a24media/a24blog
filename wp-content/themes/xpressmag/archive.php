<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xpressmag
 */

get_header(); 
	
	$block_archive_layout = get_theme_mod( 'xpressmag_archive_layout', 'classic' );

	$archive_sidebar = get_theme_mod( 'xpressmag_archive_sidebar', 'rightsidebar' );
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
								if( $archive_sidebar == 'leftsidebar' ) : 
						      
						    		get_sidebar('left');

						    	endif; 
						    ?>

                            <div class="<?php if( $archive_sidebar == 'nosidebar' ){ echo esc_attr( 'col-md-12' ); }else{ echo esc_attr( 'col-md-8' ); } ?> col-sm-12 col-xs-12 sticky_portion">
                                <div class="content_entry">
                                    <section class="list_page_iner">

                                        <div class="section_title">
                                        	<?php
												the_archive_title( '<h2 class="list_head">', '</h2>' );
												the_archive_description( '<div class="archive-description">', '</div>' );
											?>
                                        </div> <!-- // section_title -->

                                        <section class="<?php if( $block_archive_layout == 'classic'){ echo esc_attr( 'xp_post_widget_five' ); }else{ echo esc_attr( 'xp_post_widget_one' ); } ?> section_spacing"> 
											<div class="section_inner">
												<div class="<?php if( $block_archive_layout == 'grid'){ echo esc_attr( 'row' ); } ?> widget_one_bottom_posts">
			                                        <?php 

			                                        	if ( have_posts() ) : 

															while ( have_posts() ) : the_post();

																get_template_part( 'template-parts/archive/'. $block_archive_layout );

															endwhile;

														else :

															get_template_part( 'template-parts/content', 'none' );

														endif; 
													?>
												</div>
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
								if( $archive_sidebar == 'rightsidebar' ) : 
						      
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
