<?php
/**
 * Template Name: Xpressmag - Builder Page
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xpressmag
 */
get_header();  ?>

<div id="xmag-pagebuilder" class="xmag-pagebuilder  xmag-pagebuildersection">
	<div class="xp_container">
		<div class="row">
			<?php

				while ( have_posts() ) : the_post();

				    the_content();

				endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>

<?php get_footer();