<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bladzijde
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area sidebar-footer clear" role="complementary">
	<div class="sidebar-footer-wrap">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
</div><!-- #secondary -->