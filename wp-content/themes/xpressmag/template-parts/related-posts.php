<?php 
    $relatedpost = get_theme_mod( 'xpressmag_related_posts_title', 'Related posts' );
?> 
<section class="xp_post_widget_three related">
    <div class="section_inner">
        <div class="section_title">
            <h2><?php echo esc_attr( $relatedpost ); ?>  
            </h2>
        </div><!-- // section_title -->
        <?php
            $xpressmag_block_args = array(
                'no_found_rows'          => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
                'ignore_sticky_posts'    => true,
                'orderby'                => 'rand',
                'post__not_in'           => array( $post->ID ),
                'posts_per_page'         => 6
            );

            $xpressmag_block_query = new WP_Query( $xpressmag_block_args );

            if( $xpressmag_block_query->have_posts() ) { 

            echo '<div class="row">';

                while( $xpressmag_block_query->have_posts() ) { $xpressmag_block_query->the_post();
        ?>
            <div class="col-md-4 col-sm-6 col-xs-12 watchheight">
                <div class="card">

                    <div class="post_thumb imghover">
                        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                            <?php
                                the_post_thumbnail( 'xpressmag-grid' );
                            ?>
                        </a>
                    </div> <!-- // post_thumb -->

                    <div class="card_content">

                        <div class="post_title">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="meta">
                            <?php xpressmag_posted_on( array( 'date','comment' ) ); ?>
                        </div>

                    </div> <!-- // card_content -->
                </div> <!-- // card -->
            </div>

        <?php } echo '</div>'; } wp_reset_postdata(); ?>
    </div>
</section>