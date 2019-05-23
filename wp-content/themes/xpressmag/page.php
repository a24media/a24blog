<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xpressmag
 */
get_header(); 

	$page_sidebar = get_theme_mod( 'xpressmag_default_page_sidebar', 'rightsidebar' );
?>

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
							
							<?php 
								if( $page_sidebar == 'leftsidebar' ) : 
						      
						    		get_sidebar('left');

						    	endif; 
						    ?>

                            <div class="<?php if( $page_sidebar == 'nosidebar' ){ echo esc_attr( 'col-md-12' ); }else{ echo esc_attr( 'col-md-8' ); } ?> col-sm-12 col-xs-12 sticky_portion">
                                <div class="content_entry">

                                    <div class="section_title">
                                    	<?php
											the_title( '<h2 class="list_head">', '</h2>' );
										?>
                                    </div> <!-- // section_title -->

                                	<div class="the_content">
	                                    <?php 

	                                    	if ( have_posts() ) : 

												while ( have_posts() ) : the_post();

													get_template_part( 'template-parts/content', 'page' );

													// If comments are open or we have at least one comment, load up the comment template.
													if ( comments_open() || get_comments_number() ) :
														comments_template();
													endif;

												endwhile;

											else :

												get_template_part( 'template-parts/content', 'none' );

											endif; 
										?>
									</div>
                                  
                                </div> <!-- // content_entry -->
                            </div>
                            
                            <?php 
								if( $page_sidebar == 'rightsidebar' ) : 
						      
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