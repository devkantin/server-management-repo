<?php
/**
 * The template for displaying Search Results pages.
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
do_action('consultancy_services_pro_before_search'); 

?>
<div class="container">
	<h1 class="entry-title result-page"><?php printf( __( 'Results For : %s', 'consultancy-services-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</div>
<div class="container">
	<div class="middle-align">
    	<main id="maincontent" class="middle-align" role="main">
			<div class="row">
				<div class="col-lg-8 col-sm-6 col-md-12">
					<div class="row search-result">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post();
								get_template_part('template-parts/post/post-content');
							endwhile; ?>
							<div class="navigation text-center" id="search-page-nav">
								<?php // Previous/next page navigation.
								  the_posts_pagination( array(
									  'prev_text'          => __( 'Previous page', 'consultancy-services-pro' ),
									  'next_text'          => __( 'Next page', 'consultancy-services-pro' ),
									  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'consultancy-services-pro' ) . ' </span>',
								  )); ?>
							</div>
						<?php else : ?>
							<?php get_template_part( 'no-results', 'search' ); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-6" id="sidebar">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</main>
	</div>
</div>
<?php get_footer(); ?>