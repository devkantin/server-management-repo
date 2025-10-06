<?php
/**
 * The Template for displaying all single Testimonial.
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
do_action('consultancy_services_pro_before_single_testimnial'); 

$single_testimonial_col1="";
$single_testimonial_col2="";
if(get_theme_mod('consultancy_services_pro_testimonial_single_page_sidebar',true)=='1')
{
    $single_testimonial_col1="col-lg-8 col-md-7";
    $single_testimonial_col2="col-lg-4 col-md-5";
    
}else
{
    $single_testimonial_col1="col-lg-12 col-md-12";
    $single_testimonial_col2="";
}


?>
<div class="container">
    <div class="row">
        <div id="testimonial-single" class="<?php echo esc_html($single_testimonial_col1); ?>">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="testimonial-img text-lg-start text-md-start text-sm-center text-center">
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                    </div>
                <?php } ?>  
                <?php if(get_post_meta($post->ID,'meta-test-designation',true)!= ''){ ?>
                    <div class="single-testimonial-desig text-lg-start text-md-start text-sm-center text-center">
                        <?php echo esc_html(get_post_meta($post->ID,'meta-test-designation',true)); ?>
                    </div>
                <?php }?>  
                <div class="social-profiles">
                    <?php if(get_post_meta($post->ID,'meta-tes-facebookurl',true)) { ?>
                        <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-facebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                     <?php }
                    if(get_post_meta($post->ID,'meta-tes-twitterurl',true)) { ?>
                        <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-twitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php }
                    if(get_post_meta($post->ID,'meta-tes-googleplusurl',true)) { ?>
                        <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-googleplusurl',true)); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                     <?php }
                    if(get_post_meta($post->ID,'meta-tes-linkdenurl',true)) { ?>
                         <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-linkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php } 
                        if(get_post_meta($post->ID,'meta-tes-instagram',true)!= ''){ ?>
                        <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-instagram',true)); ?>">
                            <i class="fab fa-instagram align-middle" aria-hidden="true"></i>
                        </a>
                    <?php } if(get_post_meta($post->ID,'meta-tes-pinterest',true)!= ''){ ?>
                        <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tes-pinterest',true)); ?>">
                            <i class="fab fa-pinterest-p align-middle" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                </div>
                <div class="single-page-content text-lg-start text-md-start text-sm-center text-center">
                   <?php the_content();?>
                </div>                 
               
                <div class="clearfix"></div>
            <?php endwhile; // end of the loop. ?>
            
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
        <?php if(get_theme_mod('consultancy_services_pro_testimonial_single_page_sidebar',true)=='1'){ ?>
            <div class="<?php echo esc_html($single_testimonial_col2); ?>" id="sidebar">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </div> 
        <?php } ?>
    </div>    
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>