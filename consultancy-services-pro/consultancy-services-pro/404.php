<?php
	/**
	 * The template for displaying 404 pages (Not Found).
	 *
	 * @package consultancy-services-pro
	 */
	$themes_array  = (array) get_option( 'themes_customization' );
	get_header();

	if( get_theme_mod('consultancy_services_pro_404_sec_bgcolor') ) {
		$back_img = 'background-color:'.esc_attr(get_theme_mod('consultancy_services_pro_404_sec_bgcolor')).';';
	}elseif( get_theme_mod('consultancy_services_pro_404_sec__bgimage') ){
		$back_img = 'background-image:url(\''.esc_url(get_theme_mod('consultancy_services_pro_404_sec__bgimage')).'\')';
	}else{
		$back_img = '';
	}
	get_template_part('template-parts/banner'); 
?>

<section id="main_eroor" class="pt-5 mt-5 pb-0">
	<div class="container" style="<?php echo esc_attr($back_img); ?>">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-12">
				<?php if (get_theme_mod("consultancy_services_pro_404_temp_img") != ""){?>
					<img src="<?php echo esc_html(get_theme_mod('consultancy_services_pro_404_temp_img')); ?>" class="about-us-image" alt="about-us-image">
				<?php } ?>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-12 error404 align-self-center">
				<h1 class="text-lg-start text-md-start text-sm-center text-center"><?php echo esc_html(get_theme_mod('404_page_title')); ?></h1>
				<p class="text-lg-start text-md-start text-sm-center text-center"><?php echo esc_html(get_theme_mod('404_page_content')); ?></p>
		        <div class="read-moresec text-lg-start text-md-start text-sm-center text-center">
					<a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-bounce-to-right">
						<?php echo esc_html(get_theme_mod('404_page_button_text')); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>