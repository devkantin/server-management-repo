<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package consultancy-services-pro
 */
?>
<div class="container">
	<header>
		<h3 class="entry-title"><?php esc_html_e( 'Nothing Found', 'consultancy-services-pro' ); ?></h3>
	</header>
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'consultancy-services-pro' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'consultancy-services-pro' ); ?></p><br />
			<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Don\'t worry &hellip; it happens to the best of us.', 'consultancy-services-pro' ); ?></p>
		<br />
		<div class="read-moresec">
			<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button hvr-sweep-to-right"><?php _e( 'Back to Home Page', 'consultancy-services-pro' ); ?></a></div>
		</div>
	<?php endif; ?>
</div>