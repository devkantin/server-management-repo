<?php
/**
 * The Template for displaying all single team.
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
do_action('consultancy_services_pro_before_single_team'); 

$single_team_col1="";
$single_team_col2="";
if(get_theme_mod('consultancy_services_pro_team_single_page_sidebar',true)=='1')
{
    $single_team_col1="col-lg-8 col-md-7";
    $single_team_col2="col-lg-4 col-md-5";
    
}else
{
    $single_team_col1="col-lg-12 col-md-12";
    $single_team_col2="";
}

?>
<div class="container">
    <div id="single-team">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="<?php echo esc_html($single_team_col1); ?>">
                    <div class="single-team-info text-lg-start text-md-start text-sm-center text-center"> 
                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>">
                        <?php if(get_post_meta($post->ID,'meta-designation',true)) { ?>
                            <p>
                                <i class="fas fa-user"></i>
                                <?php echo esc_html(get_post_meta($post->ID,'meta-designation',true)); ?></p>
                        <?php } ?>
                        <?php if(get_post_meta($post->ID,'meta-team-email',true)) { ?>
                            <p class="email ">
                                <i class="far fa-envelope"></i>
                                <?php echo esc_html(get_post_meta($post->ID,'meta-team-email',true)); ?>
                            </p>
                        <?php } if(get_post_meta($post->ID,'meta-team-phone',true)) { ?>
                            <p class="phone">
                                <i class="fas fa-phone"></i>
                                <?php echo esc_html(get_post_meta($post->ID,'meta-team-phone',true)); ?>
                            </p>
                        <?php } ?>
                        <div class="social-profiles">
                            <?php if(get_post_meta($post->ID,'meta-tfacebookurl',true)) { ?>
                                <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tfacebookurl',true)); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                             <?php }
                            if(get_post_meta($post->ID,'meta-ttwitterurl',true)) { ?>
                                <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-ttwitterurl',true)); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            <?php }
                            if(get_post_meta($post->ID,'meta-tgoogleplusurl',true)) { ?>
                                <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tgoogleplusurl',true)); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                             <?php }
                            if(get_post_meta($post->ID,'meta-tlinkdenurl',true)) { ?>
                                 <a class="" href="<?php echo esc_html(get_post_meta($post->ID,'meta-tlinkdenurl',true)); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <?php } 
                                if(get_post_meta($post->ID,'meta-tinstagram',true)!= ''){ ?>
                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-tinstagram',true)); ?>">
                                    <i class="fab fa-instagram align-middle" aria-hidden="true"></i>
                                </a>
                            <?php } if(get_post_meta($post->ID,'meta-pinterest',true)!= ''){ ?>
                                <a href="<?php echo esc_html(get_post_meta($post->ID,'meta-pinterest',true)); ?>">
                                    <i class="fab fa-pinterest-p align-middle " aria-hidden="true"></i>
                                </a>
                            <?php } ?>
                        </div>
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

                <?php if(get_theme_mod('consultancy_services_pro_team_single_page_sidebar',true)=='1'){ ?>
                    <div class="<?php echo esc_html($single_team_col2); ?>" id="sidebar">
                      <?php dynamic_sidebar('sidebar-1'); ?>
                    </div>
                <?php } ?>
            <?php endwhile; // end of the loop. ?>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php get_footer(); ?>