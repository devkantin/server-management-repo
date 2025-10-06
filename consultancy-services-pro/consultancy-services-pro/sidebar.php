<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package consultancy-services-pro
 */
?>
<div id="sidebar">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="archives" class="widget" role="complementary">
			<h3 class="widget-title"><?php _e( 'Archives', 'consultancy-services-pro' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>
		<aside id="meta" class="widget" role="complementary">
			<h3 class="widget-title"><?php _e( 'Meta', 'consultancy-services-pro' ); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</aside>
	<?php endif; // end sidebar widget area ?>
</div>