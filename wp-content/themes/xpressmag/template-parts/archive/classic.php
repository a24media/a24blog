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
	<div class="row boxes_holder">
		<?php if ( has_post_thumbnail() ) : ?>
		    <div class="col-md-5 col-sm-5 col-xs-12">
		        <div class="post_thumb imghover">
		            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		                <?php
		                    the_post_thumbnail( 'xpressmag-largegrid' );
		                ?>
		            </a>
		        </div>
		    </div> <!-- // col-->
		<?php endif; ?>
	    <div class="<?php if ( has_post_thumbnail() ){ echo esc_attr( 'col-md-7' ); }else{ echo esc_attr( 'col-md-12' ); } ?> col-sm-7 col-xs-12">
	        <div class="right_box">

	            <?php xpressmag_colors_category(); ?><!-- // entry_cats -->

	            <div class="post_title">
	                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	            </div>

	            <div class="the_content">
	                <?php the_excerpt(); ?>
	            </div> <!-- // the_content -->

	            <div class="meta">
	                <?php xpressmag_posted_on(); ?>
	            </div> <!-- // meta -->
	        </div><!-- // rightbox -->
	    </div><!-- // col-->
	</div>
</article>