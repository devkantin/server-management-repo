<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
do_action('consultancy_services_pro_before_page'); 

?>
<?php do_action( 'consultancy_services_pro_after_page_header' ); ?>
<main id="maincontent" role="main"> 
	<div class="outer_dpage">
		<div class="container">
			<div class="middle-content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content();
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template(); }
				endwhile; // end of the loop. ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</main>
<?php do_action( 'consultancy_services_pro_before_page_footer' ); ?>

<?php get_footer(); ?>