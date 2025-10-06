<?php

/**
 * consultancy-services-pro functions and definitions
 *
 * @package consultancy-services-pro
 */

if ( ! function_exists( 'consultancy_services_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function consultancy_services_pro_setup() {
  $GLOBALS['content_width'] = apply_filters( 'consultancy_services_pro_content_width', 640 );
  if ( ! isset( $content_width ) ) $content_width = 640;
  load_theme_textdomain( 'consultancy-services-pro', get_template_directory() . '/languages' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'woocommerce' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'wc-product-gallery-zoom' ); 
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

  add_theme_support( 'custom-logo', array(
    'height'      => 240,
    'width'       => 240,
    'flex-height' => true,
  ) );
  add_image_size('consultancy-services-pro-homepage-thumb',240,145,true);
  register_nav_menus( array(
    'primary'   => __( 'Primary Menu', 'consultancy-services-pro' ),
    'footer'   => __( 'Footer Menu', 'consultancy-services-pro' ),
    'footer-widgets'   => __( 'Footer Widgets', 'consultancy-services-pro' )
  ) );
  add_theme_support( 'custom-background', array(
    'default-color' => 'f1f1f1'
  ) );
  add_editor_style();
}
endif;
add_action( 'after_setup_theme', 'consultancy_services_pro_setup' );

/* ----------- Amp Style ------------ */

if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {

   add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
    
    /**
     * Dequeue JavaScript or Stylesheet.
     */
    add_action( 'wp_enqueue_scripts', 'consultancy_services_pro_child_deregister_styles', 11 );
    function consultancy_services_pro_child_deregister_styles() {
      wp_dequeue_style( 'amp-default' );        
    }

    //woocommerce block style
    remove_action( 'enqueue_block_assets', 'wp_enqueue_registered_block_scripts_and_styles' );
    
}

/* ----------- Theme enqueue scripts  ---------- */
if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
    /**
     * Dequeue JavaScript or Stylesheet.
     */
    wp_dequeue_style( 'amp-default' );
    remove_action( 'enqueue_block_assets', 'wp_enqueue_registered_block_scripts_and_styles' );
}
function consultancy_services_pro_scripts() {
    wp_enqueue_style( 'consultancy-services-pro-font', consultancy_services_pro_font_url(), array() );
    wp_enqueue_style( 'consultancy-services-pro-basic-style', get_stylesheet_uri() );

    /* -------- Inline style sheet --------- */
    require get_parent_theme_file_path( '/inline_style.php' );
    wp_add_inline_style( 'consultancy-services-pro-basic-style',$custom_css );

    if(is_rtl()){
    wp_enqueue_style( 'rtl-style', get_template_directory_uri().'/rtl.css',true, null,'all');
    wp_add_inline_style( 'rtl-style',$custom_css );
  }else{
    // ---------- CSS Enqueue -----------
    if(is_front_page() || is_home()){
      wp_enqueue_style( 'home-page-style', get_template_directory_uri() . '/assets/css/main-css/home-page.css',true, null,'all');
      wp_add_inline_style( 'home-page-style',$custom_css );
    }else{
      wp_enqueue_style( 'other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css',true, null,'all');
      wp_add_inline_style( 'other-page-style',$custom_css );
    }
    if('post' == get_post_type() && is_home()){
      wp_enqueue_style( 'other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css',true, null,'all');
      wp_add_inline_style( 'other-page-style',$custom_css );
    }
    wp_enqueue_style( 'header-footer-style', get_template_directory_uri().'/assets/css/main-css/header-footer.css',true, null,'all' );

    wp_enqueue_style( 'responsive-style', get_template_directory_uri().'/assets/css/main-css/mobile-main.css',true, null,'screen and (max-width: 2000px) and (min-width: 0px)' );

    wp_add_inline_style( 'header-footer-style',$custom_css );
    wp_add_inline_style( 'responsive-media-style',$custom_css );

  }
  if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
    wp_enqueue_style( 'amp-style', get_template_directory_uri().'/assets/css/main-css/amp-style.css',true, null,'all' );
  }else{
    wp_enqueue_style( 'animation-wow',get_template_directory_uri().'/assets/css/animate.css' );
    wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );
  }

  /* ---------- CSS Enqueue -----------  */

  wp_enqueue_style( 'custom_controls_css',get_template_directory_uri().'/assets/css/customizer.css');
  wp_enqueue_style( 'effect', get_template_directory_uri().'/assets/css/effect.css' );
  
  
  wp_enqueue_style( 'font-awesome',get_template_directory_uri().'/assets/css/fontawesome-all.min.css' );
  wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
/* ---------- JS Enqueue -----------  */

  wp_enqueue_script( 'animation-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'tether', get_template_directory_uri() . '/assets/js/tether.js', array( 'jquery' ) );
  wp_enqueue_script( 'amp-sidebar', get_template_directory_uri() . '/assets/js/amp-sidebar-0.1.js', array( 'jquery' ) );
   wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20160816', true );
  wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ) );
  wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/assets/js/SmoothScroll.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery-progressbar-js', get_template_directory_uri() . '/assets/js/jquery-progressbar.js', array( 'jquery' ) );
  wp_enqueue_script( 'customscripts', get_template_directory_uri() . '/assets/js/custom.js');
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'consultancy_services_pro_scripts' );

/* Implement the Custom Header feature. */
require get_parent_theme_file_path('/inc/custom-header.php' );
/* Custom template tags for this theme. */
require get_parent_theme_file_path('/inc/template-tags.php' );
/* Customizer additions. */
require get_parent_theme_file_path('/inc/customize/customizer.php' );
/* TGM. */
//require get_parent_theme_file_path('/inc/tgm/tgm.php' );
/* Google Fonts */
require get_parent_theme_file_path('/inc/google-fonts.php' );
/* Widget Sidebar */
require get_parent_theme_file_path('/inc/widget-sidebar.php' );
//social widget file
require get_parent_theme_file_path('/inc/widget/socail-widget.php' );
//Contact Widget file
require get_parent_theme_file_path('/inc/widget/contact-widget.php' );
require get_parent_theme_file_path('/inc/posttype/demo-posttype.php' );


// -------- Setup Wizard -----------
require get_template_directory() . '/theme-wizard/config.php';
require get_parent_theme_file_path('/theme-wizard/plugin-activation.php' );

/* URL DEFINES */
define('consultancy_services_pro_SITE_URL','https://www.revolutionwp.com/');
/* Theme Credit link */
function consultancy_services_pro_credit_link() {
	echo esc_html_e(' Designed & Developed by','consultancy-services-pro'). "<a href=".esc_url(consultancy_services_pro_SITE_URL)." target='_blank'> Revolutionwp</a>";
}
/*Radio Button sanitization*/
function consultancy_services_pro_sanitize_choices( $input, $setting ) {
	global $wp_customize;
	$control = $wp_customize->get_control( $setting->id );
	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

 /* Breadcrumb Begin */
function consultancy_services_pro_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url(home_url());
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(', ');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			the_title();
		}
	}
}
function consultancy_services_pro_home_call_button(){
  if(get_theme_mod('consultancy_services_pro_topbar_contact_options') == 'Call' ) {
    return true;
  }
  return false;
}
function consultancy_services_pro_home_whatsapp_call_button(){
  if(get_theme_mod('consultancy_services_pro_topbar_contact_options') == 'Whatsapp' ) {
    return true;
  }
  return false;
}
/* ----------- Excerpt Limit Begin ---------- */
function consultancy_services_pro_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/* Excerpt Read more overwrite */
function consultancy_services_pro_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'consultancy-services-pro' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'consultancy_services_pro_excerpt_more' );

define( 'IBTANA_THEME_LICENCE_ENDPOINT', 'https://preview.revolutionwpdemo.com/old_website/wp-json/ibtana-licence/v2/' );
define( 'SHOPIFY_THEME_LICENCE_ENDPOINT', 'https://license.revolutionwp.com/api/public/' );

//main theme sections
define( 'CUSTOMIZER_ADDON_THEME','1.0');
//theme setting
define( 'CONSULTANCY_SERVICES_PRO_VERSION', '1.0' );

/*===================================================================================
* Add Author Links
* =================================================================================*/
function add_to_author_profile( $contactmethods ) {

$contactmethods['tumbler_url'] = 'Tumbler URL';
$contactmethods['pinterest_profile'] = 'Pinterest Profile URL';
$contactmethods['twitter_profile'] = 'Twitter Profile URL';
$contactmethods['facebook_profile'] = 'Facebook Profile URL';

return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);
Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
   function widget($args, $instance) {
           if ( ! isset( $args['widget_id'] ) ) {
           $args['widget_id'] = $this->id;
       }
       $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'consultancy-services-pro' );
       /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
       $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
       $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
       if ( ! $number )
           $number = 5;
       $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
       /**
        * Filter the arguments for the Recent Posts widget.
        *
        * @since 3.4.0
        *
        * @see WP_Query::get_posts()
        *
        * @param array $args An array of arguments used to retrieve the recent posts.
        */
       $r = new WP_Query( apply_filters( 'widget_posts_args', array(
           'posts_per_page'      => $number,
           'no_found_rows'       => true,
           'post_status'         => 'publish',
           'ignore_sticky_posts' => true
       ) ) );
       if ($r->have_posts()) :
       ?>
       <?php echo $args['before_widget']; ?>
       <?php if ( $title ) {
           echo $args['before_title'] . esc_html($title) . $args['after_title'];
       } ?>
       <ul>
         <?php while ( $r->have_posts() ) : $r->the_post(); ?>
             <li>
                 <div class="row recent-post-box">
                   <div class="post-thumb <?php if(has_post_thumbnail()) { echo 'col-md-4 col-sm-4 col-12'; } ?> ">
                       <?php the_post_thumbnail(); ?>
                   </div>
                   <div class="post-content <?php if(has_post_thumbnail()) { echo 'col-md-8 col-sm-8 col-12'; } else { echo 'col-md-12 col-sm-12 col-12'; }?>">
                       <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                     <?php if ( $show_date ) : ?>
                         <p class="post-date"><?php the_time(get_option('date_format')); ?></p>
                     <?php endif; ?>
                   </div>
                 </div>
             </li>
         <?php endwhile; 
         wp_reset_postdata(); ?>
       </ul>

       <?php echo $args['after_widget'];
       
       endif;
   }
}
function my_recent_widget_registration() {
 unregister_widget('WP_Widget_Recent_Posts');
register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

add_action('switch_theme', 'consultancy_services_pro_deactivate');
function consultancy_services_pro_deactivate() {
  ThemeWhizzie::remove_the_theme_key();
  ThemeWhizzie::set_the_validation_status('false');
}

define('CUSTOM_TEXT_DOMAIN', 'consultation');
/*function wc_hide_selected_terms( $terms, $taxonomies, $args ) {
    $new_terms = array();
    if ( in_array( 'product_cat', $taxonomies ) && !is_admin() && is_shop()  && is_home() ) {
        foreach ( $terms as $key => $term ) {
              if ( ! in_array( $term->slug, array( 'uncategorized' ) ) ) {
                $new_terms[] = $term;
              }
        }
        $terms = $new_terms;
    }
    return $terms;
}
add_filter( 'get_terms', 'wc_hide_selected_terms', 10, 3 );*/

/*function remove_uncategorized_links( $categories ){

  foreach ( $categories as $cat_key => $category ){
    if( 1 == $category->term_id ){
      unset( $categories[ $cat_key ] );
    }
  }

  return $categories;
  
} add_filter('get_the_categories', 'remove_uncategorized_links', 1);
*/


if( !function_exists( 'ywcca_add_product_categories_args')) {
  add_filter( 'ywcca_wc_product_categories_widget_args', 'ywcca_add_product_categories_args', 10, 1 );

  function ywcca_add_product_categories_args( $args ) {

    $uncategorized = get_categories( array( 'taxonomy' => 'product_cat', 'slug' => 'uncategorized' ) );

    if ( $uncategorized ) {

      $excluded_id = array();

      foreach ( $uncategorized as $category ) {
        $excluded_id[] = $category->term_id;
      }
      $args['exclude'] = $excluded_id;
    }

    return $args;
  }
}
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}




register_post_type( 'Project',
array(
    'labels' => array(
      'name' => __( 'Project','consultancy-services-pro-custom-posttype' ),
      'singular_name' => __( 'Project','consultancy-services-pro-custom-posttype' )
    ),

    // 'taxonomies'      => array( 'case_studies_cat' ),
    'capability_type' =>  'post',
    'menu_icon'  => 'dashicons-video-alt',
    'public' => true,
    'supports' => array(
    'title',
    'editor',
    'thumbnail',
    'page-attributes',
    'comments'
    )
)
);


register_post_type( 'Testimonials',
array(
    'labels' => array(
      'name' => __( 'Testimonials','consultancy-services-pro-custom-posttype' ),
      'singular_name' => __( 'Testimonials','consultancy-services-pro-custom-posttype' )
    ),

    // 'taxonomies'      => array( 'case_studies_cat' ),
    'capability_type' =>  'post',
    'menu_icon'  => 'dashicons-video-alt',
    'public' => true,
    'supports' => array(
    'title',
    'editor',
    'thumbnail',
    'page-attributes',
    'comments'
    )
)
);



register_post_type( 'Teams',
array(
    'labels' => array(
      'name' => __( 'Teams','consultancy-services-pro-custom-posttype' ),
      'singular_name' => __( 'Teams','consultancy-services-pro-custom-posttype' )
    ),

    // 'taxonomies'      => array( 'case_studies_cat' ),
    'capability_type' =>  'post',
    'menu_icon'  => 'dashicons-video-alt',
    'public' => true,
    'supports' => array(
    'title',
    'editor',
    'thumbnail',
    'page-attributes',
    'comments'
    )
)
);



register_post_type( 'Services',
array(
    'labels' => array(
      'name' => __( 'Services','consultancy-services-pro-custom-posttype' ),
      'singular_name' => __( 'Services','consultancy-services-pro-custom-posttype' )
    ),

    // 'taxonomies'      => array( 'case_studies_cat' ),
    'capability_type' =>  'post',
    'menu_icon'  => 'dashicons-video-alt',
    'public' => true,
    'supports' => array(
    'title',
    'editor',
    'thumbnail',
    'page-attributes',
    'comments'
    )
)
);
