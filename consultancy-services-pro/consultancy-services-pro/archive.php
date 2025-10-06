<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

get_header(); 
get_template_part('template-parts/banner');
do_action('consultancy_services_pro_before_archive'); 

?>

<main id="maincontent" role="main">
	<div class="container">
	<div class="middle-align">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post();
							get_template_part('template-parts/post/post-content');
						endwhile;
						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'consultancy-services-pro' ),
							'next_text'          => __( 'Next page', 'consultancy-services-pro' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'consultancy-services-pro' ) . ' </span>',
						));
					else :
						get_template_part( 'no-results', 'archive' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-12" id="sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</main>

<?php get_footer(); ?>