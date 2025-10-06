<?php
/**
 * The Template for displaying all single Services.
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
do_action('consultancy_services_pro_before_single_services'); 

$single_service_col1="";
$single_service_col2="";
if(get_theme_mod('consultancy_services_pro_service_single_page_sidebar',true)=='1')
{
    $single_service_col1="col-lg-8 col-md-7";
    $single_service_col2="col-lg-4 col-md-5";
    
}else
{
    $single_service_col1="col-lg-12 col-md-12";
    $single_service_col2="";
}

?>
<div class="container">
    <?php if (defined('BC_VERSION')){
        echo do_shortcode( '[breadcrumb]' );
    } ?>
    <div class="row">
        <div id="single-service" class="<?php echo esc_html($single_service_col1); ?>">
            <?php while ( have_posts() ) : the_post();
                $services_color="";
               if(get_post_meta($post->ID,'meta-service-color',true)) { 
                    $services_color= get_post_meta($post->ID,'meta-service-color',true);
               }
            ?>
            <div class="services-image text-lg-start text-md-start text-sm-center text-center">
                <?php if(has_post_thumbnail()){ ?>
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                <?php }else{ ?>
                    <div class="services-icon" style="background-color:<?php echo esc_attr($services_color); ?>">
                        <?php if(get_post_meta($post->ID,'service-meta-image',true)) { ?>
                            <img src="<?php echo esc_url(get_post_meta($post->ID,'service-meta-image',true)); ?>">
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="single-page-content text-lg-start text-md-start text-sm-center text-center"><?php the_content();?></div>              
            <div class="single-page-nav">
                <?php the_post_navigation( array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'consultancy-services-pro' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'consultancy-services-pro' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'consultancy-services-pro' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'consultancy-services-pro' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                ) );?>
            </div>
        </div>    
        <?php if(get_theme_mod('consultancy_services_pro_service_single_page_sidebar',true)=='1'){ ?>
            <div class="<?php echo esc_html($single_service_col2); ?>" id="sidebar">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div>  
        <?php } ?> 
        <div class="clearfix"></div>
        <?php endwhile; // end of the loop. ?> 
    </div>    
</div>
<?php get_footer(); ?>