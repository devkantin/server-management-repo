<?php
/**
 * The template for displaying image attachments.
 *
 * @package consultancy-services-pro
 */

$page_title_style="";
if(get_theme_mod('consultancy_services_pro_page_title_content_option')=='Center'){
    $page_title_style='text-align:center;';
}else if(get_theme_mod('consultancy_services_pro_page_title_content_option')=='Left')
{
	$page_title_style='text-align:left;';
}else if(get_theme_mod('consultancy_services_pro_page_title_content_option')=='Right')
{
	$page_title_style='text-align:right;';
}else{
	$page_title_style='';
}

get_header(); ?>
<main id="maincontent"  role="main">
	<div class="container">
	<?php the_title( '<h1 class="entry-title" style="'.$page_title_style.'">', '</h1>' ); ?>
	<div class="row">
		<div class="col-lg-8 col-md-7 content_page">
			<div class="site-main" id="sitemain">
				<?php while ( have_posts() ) : the_post(); ?>    
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<div class="entry-meta">
								<?php
									$metadata = wp_get_attachment_metadata();
									printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
										esc_attr( get_the_date( 'c' ) ),
										esc_html( get_the_date() ),
										esc_url( wp_get_attachment_url() ),
										$metadata['width'],
										$metadata['height'],
										esc_url( get_permalink( $post->post_parent ) ),
										esc_html( get_the_title( $post->post_parent ) )
									);
									edit_post_link( __( 'Edit', 'consultancy-services-pro' ), '<span class="edit-link">', '</span>' );
								?>
							</div>    
							<nav role="navigation" id="image-navigation" class="image-navigation">
								<div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'consultancy-services-pro' ) ); ?></div>
								<div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'consultancy-services-pro' ) ); ?></div>
							</nav>
						</header>    
						<div class="entry-content">
							<div class="entry-attachment">
								<div class="attachment">
									<?php consultancy_services_pro_the_attached_image(); ?>
								</div>
								<?php if ( has_excerpt() ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div>
								<?php endif; ?>
							</div>    
							<?php
								the_content();
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'consultancy-services-pro' ),
									'after'  => '</div>',
								) );
							?>
						</div>    
						<?php edit_post_link( __( 'Edit', 'consultancy-services-pro' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
					</article>    
					<?php
						// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template(); }
					?>    
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
		<div id="sidebar" class="col-lg-4 col-md-5">
			<?php get_sidebar();?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</main>

<?php get_footer(); ?>