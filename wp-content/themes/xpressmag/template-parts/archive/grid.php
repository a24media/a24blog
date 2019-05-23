<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Offshore Themes
 * @subpackage xpressmag
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col-md-6 col-sm-6 col-xs-12 gutter watchheight">
        <article class="card">
            <div class="post_thumb">

                <?php
                    the_post_thumbnail( 'xpressmag-fullgrid' );
                ?>

                <div class="post_holder">

                    <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

                    <div class="post_title">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>

                    <div class="meta">
                        <?php xpressmag_posted_on(); ?>
                    </div><!-- // meta -->
                </div> <!-- // post_holder -->
            </div> <!-- // post_thumb -->

            <div class="mask"></div>

        </article> <!-- // card -->
    </div>
</article>