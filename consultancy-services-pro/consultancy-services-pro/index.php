<?php
/**
 * The template for displaying index page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package consultancy-services-pro
 */
get_header();
?>
<?php do_action( 'consultancy_services_pro_after_defaulttitle' ); ?>
<div class="post-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php while ( have_posts() ) : the_post();
							get_template_part('template-parts/post/post-content');
					endwhile; ?>
				</div>
			  <div class="navigation text-center">
				<?php // Previous/next page navigation.
				  the_posts_pagination( array(
					  'prev_text'          => __( 'Previous page', 'consultancy-services-pro' ),
					  'next_text'          => __( 'Next page', 'consultancy-services-pro' ),
					  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'consultancy-services-pro' ) . ' </span>',
				  )); ?>
			  </div>
			</div>
			<div class="col-md-4" id="sidebar"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>