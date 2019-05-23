<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xpressmag
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
	                <?php if ( 'post' === get_post_type() ) : xpressmag_posted_on(); endif; ?>
	            </div> <!-- // meta -->
	        </div><!-- // rightbox -->
	    </div><!-- // col-->
	</div>
</article>
