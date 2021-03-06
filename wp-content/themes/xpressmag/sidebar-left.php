<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xpressmag
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div class="col-md-4 col-sm-12 col-xs-12 sticky_portion">
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </aside>
</div><!-- #secondary -->
