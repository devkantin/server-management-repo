<?php

/**
 * The Template for displaying all single posts.
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
do_action('consultancy_services_pro_before_single'); 

$postcol1="";
$postcol2="";

if(get_theme_mod('consultancy_services_pro_post_general_settings_post_sidebar')=='OneFourth'){
    $postcol1="col-lg-8 col-md-7";
	$postcol2="col-lg-4 col-md-5";
}else if(get_theme_mod('consultancy_services_pro_post_general_settings_post_sidebar')=='OneThered')
{
    $postcol1="col-lg-9 col-md-7";
	$postcol2="col-lg-3 col-md-5";
}else if(get_theme_mod('consultancy_services_pro_post_general_settings_post_sidebar')=='NoSidebar')
{
    $postcol1="col-lg-12 col-md-12";
	$postcol2="d-none";
}else{
    $postcol1="col-lg-8 col-md-7";
	$postcol2="col-lg-4 col-md-5";
}
?>
<main id="maincontent" role="main">
	<div class="container">
		<div class="row">
			<div class="content_page <?php echo esc_html($postcol1); ?>">
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="content_boxes">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="feature-box">
							<img src="<?php the_post_thumbnail_url( 'full' ); ?>">
						</div>
					<?php } ?>
					<div class="metabox">
						<?php if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_date',true) == "1" ) { ?>
						<span class="entry-date">
							<i class="far fa-calendar-alt"></i>
							<?php echo esc_html( get_the_date() ); ?>
						</span>
						<?php } ?>
						
						<?php if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_author',true) == "1" ) { ?>
						<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
							<i class="fas fa-user"></i>
							<?php the_author(); ?></a></span>
						<?php } ?>
						
						<?php if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_comments',true) == "1" ) { ?>
						<span class="entry-comments">
							<i class="far fa-comments"></i>
							<?php comments_number( __( '0 Comments','consultancy-services-pro' ), __( '1 Comments','consultancy-services-pro' ), __( '0 % Comments','consultancy-services-pro' ) ); ?></span>
						<?php } ?>
					</div>
					<div class="single-post-content">
						<?php the_content();?>
					</div>
					<?php if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_share',true) == "1" ) { ?>
					<?php do_action('consultancy_services_pro_before_blog_sharing'); ?>
					<div class="share_icon row"> 
	                    <p class="socila_share col-md-12 bounceme">
	                    	<?php if(get_theme_mod('consultancy_services_pro_post_general_settings_post_share_facebook',true)==1 || get_theme_mod('consultancy_services_pro_post_general_settings_post_share_linkedin',true)==1 || get_theme_mod('consultancy_services_pro_post_general_settings_post_share_twitter',true)==1){ ?>
	                    		<b><?php _e('Share: ','consultancy-services-pro'); ?></b>

	                    	<?php } if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_share_facebook',true) == "1" ) { ?>
	                    		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
	                    	<?php } if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_share_linkedin',true) == "1" ) { ?>
	                    		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php the_title(); ?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
	                    	<?php }if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_share_twitter',true) == "1" ) { ?>
	                    		<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo the_title(); ?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
	                    	<?php } ?>
	                	</p>
	                	<?php if ( get_theme_mod('consultancy_services_pro_post_general_settings_post_tags',true) == "1" ) { ?>
		                    <p class="post_tag">
		                    	<?php
		                        if( $tags = get_the_tags() ) { ?>
		                            <span class="meta-sep"><?php esc_html_e('Tags :','consultancy-services-pro'); ?></span>
		                            <?php foreach( $tags as $tag ) {
		                              $sep = ( $tag === end( $tags ) ) ? '' : ' ';
		                              echo '<a href="' . esc_url(get_term_link( $tag, $tag->taxonomy )) . '">#' . esc_html($tag->name) . '</a>' . esc_html($sep);
		                            }
			                    } ?>
			                </p>
			            <?php } ?>
	                </div>
	                <?php } ?>
	                <?php if(get_theme_mod('consultancy_services_pro_post_general_settings_post_category',true)=="1"){ ?>
		                <div class="post_ctg font-weight-bold"><span><?php _e('Categories: ','consultancy-services-pro'); ?></span><?php the_category();?></div>
					<?php } if(get_theme_mod('consultancy_services_pro_post_general_settings_author_details',true)=="1"){ ?>
						<!-- author section -->
						<div class="authordetails">
							<div class="authordescription">
								<?php 
								$author_details="";
								$user_posts=get_author_posts_url( get_the_author_meta( 'ID' ) );
								global $post;
								$content ='';
		                        // Detect if it is a single post with a post author
								if ( is_single() && isset( $post->post_author ) ) {
		                                            // Get author's display name 
									$display_name = get_the_author_meta( 'display_name', $post->post_author );  
		                                            // Get author's biographical information or description
									$user_description = get_the_author_meta( 'user_description', $post->post_author );
									if ( ! empty( $user_description ) )
										$author_details .= '<p class="author_links"><a href="'. $user_posts .'"> ' . esc_html($display_name) . '</a>';
		                                            // Author avatar and bio
									$author_details .= '<div class="clear"></div><div class="row"><div class="col-md-2 col-lg-2 author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ).'</div><div class="col-md-10 col-lg-10 b-content">' . nl2br( $user_description ). '</div>';
									
									$author_details .= '</div>';
									
		                                            // Pass all this info to post content  
									$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
								}
								echo $content;
								?>
							</div>
							<ul class ="social-profile">
								<?php 
								$tumbler_url = get_the_author_meta( 'tumbler_url' );
								if ( $tumbler_url && $tumbler_url != '' ) {
									echo '<li class="tumbler">
									<a href="' . esc_url($tumbler_url) . '" target="_blank"><i class="fab fa-tumblr"></i></a></li>';
								}
								$pinterest_profile = get_the_author_meta( 'pinterest_profile' );
								if ( $pinterest_profile && $pinterest_profile != '' ) {
									echo '<li class="google">
									<a href="' . esc_url($pinterest_profile) . '" rel="author" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>';
								}
								$twitter_profile = get_the_author_meta( 'twitter_profile' );
								if ( $twitter_profile && $twitter_profile != '' ) {
									echo '<li class="twitter">
									<a href="' . esc_url($twitter_profile) . '" target="_blank"> <i class="fab fa-twitter"></i></a></li>';
								}
								$facebook_profile = get_the_author_meta( 'facebook_profile' );
								if ( $facebook_profile && $facebook_profile != '' ) {
									echo '<li class="facebook">
									<a href="' . esc_url($facebook_profile) . '" target="_blank"> <i class="fab fa-facebook-f"></i></a></li>';
								}
								?>
							</ul>
						</div>
					<?php }if(get_theme_mod('consultancy_services_pro_single_page_comments_hide_show',true)=="1"){ // If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template();
					} }?>
					<div class="clearfix"></div>
					<div class="single-page-nav">
						<?php the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'consultancy-services-pro' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'consultancy-services-pro' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'consultancy-services-pro' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'consultancy-services-pro' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) ); ?>
					</div>
				<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<div class="<?php echo esc_html($postcol2); ?>" id="sidebar">
	          <?php dynamic_sidebar('sidebar-1'); ?>
	        </div>
			<div class="clearfix"></div>
		</div>
	</div>
</main>
<?php get_footer(); ?>


