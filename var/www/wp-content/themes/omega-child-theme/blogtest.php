<?php
/**
 * Template Name: Blog test
 *
 * @package Omega
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.7.3
 */

get_header();
oxy_blog_header();
?>
<style>
#swatch_social-2 {
display: none;
}
</style>
<?php
global $post;
oxy_page_header( $post->ID, array( 'heading_type' => 'page' ) );
$allow_comments = oxy_get_option( 'site_comments' );
?>
<section class="section swatch-yellow">
    <div class="container">
        <div class="row element-normal-top">
            <div class="col-md-9">
                <div id="masthead" class="navbar navbar-static-top oxy-mega-menu <?php echo implode( ' ', $classes ); ?>" role="banner">
    <div class="<?php echo $container_class; ?>">

        <div class="navbar-header" style="background: rgba(255, 255, 255, 0.5);">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php oxy_create_logo(); ?>
        </div>

        <nav class="collapse navbar-collapse main-navbar" role="navigation" style="background: rgba(255, 255, 255, 0.5);">

            <?php
                $primary_menu = wp_get_nav_menu_items( $slug );
                if ( !empty( "cat" ) ) {
                    wp_nav_menu( array(
                        'menu' => 'cat',
                        'menu_class' => 'nav navbar-nav',
                        'depth' => 4,
                        'walker' => new FrontendBootstrapMegaMenuWalker(),
                    ));
                }
            ?>

        </nav>
    </div>
</div>
<br>
<div style="clear:both;"></div>
<?php
$args = array(
	'posts_per_page'   => 50,
	'offset'           => 0,
	'category'         => '90, 107, 109',
	'category_name'    => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true );
	
	
$lastposts = get_posts( $args );

foreach ( $lastposts as $post ) :

  setup_postdata( $post ); ?>

 <?php 

  global $post;
$extra_post_class = oxy_get_option('blog_post_icons') === 'on' ? 'post-showinfo' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class ); ?>>
  
  
  <div class="post-media">
  
        <?php
        $image_link         = is_single() ? '' : get_permalink( $post->ID );
        $image_link_type    = is_single() && oxy_get_option( 'blog_fancybox' ) === 'on' ? 'magnific' : 'item';
        $image_overlay_icon = is_single() ? 'plus' : 'link';
        $image_overlay      = oxy_get_option( 'blog_fancybox' ) === 'on' ? 'icon' : 'none';

        echo oxy_section_vc_single_image( array(
            'image'          => get_post_thumbnail_id( $post->ID ),
            'size'           => 'full',
            'link'           => '',
            'link_target'    => '_blank',
            'item_link_type' => '',
            'overlay_icon'   => '',
            'margin_top'     => 'no-top',
            'overlay'        => 'none'
        ));
        ?>
    </div>
    
  <header class="post-head">
        <h2 class="post-title">

                <?php the_title(); ?>

        </h2>
        <small>
            <?php _e( 'by', 'omega-td' );  ?>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php the_author(); ?>
            </a>
            <?php _e( 'on', 'omega-td' ); ?>
            <?php the_time(get_option('date_format')); ?>
            <?php if (oxy_get_option('blog_comment_count') == 'on') {
                echo ', ';
                comments_popup_link( _x( 'No comments', 'comments number', 'omega-td' ), _x( '1 comment', 'comments number', 'omega-td' ), _x( '% comments', 'comments number', 'omega-td' ) );
            } ?>
        </small>

        <?php if( oxy_get_option( 'blog_post_icons' ) == 'on') : ?>
            <span class="post-icon">
                <?php oxy_post_icon( $post->ID, true ); ?>
            </span>
        <?php endif; ?>
    </header>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	
	</article>
<?php endforeach; ?>
            </div>
            <div class="col-md-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php if( $allow_comments === 'pages' || $allow_comments === 'all' ) : ?>
<section class="section <?php echo oxy_get_option( 'page_comments_swatch' ); ?>">
    <div class="container">
        <div class="row element-normal-top element-normal-bottom">
            <?php comments_template( '', true ); ?>
        </div>
    </div>
</section>
<?php
endif;
get_footer();
