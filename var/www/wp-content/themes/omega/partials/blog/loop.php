<?php
/**
 * Main Blog loop
 *
 * @package Omega
 * @subpackage Frontend
 * @since 1.4
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.7.3
 */ ?>
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
<?php
if( have_posts() ) {
    $post_count = 1;
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    if( $page > 1 ) {
        $post_count = ((int) ($page - 1) * (int) get_query_var('posts_per_page')) + 1;
    }
    while( have_posts() ) {
        the_post();
        $name = is_search() ? 'search' : get_post_format();
        // add - if not empty to match get_template_part functionality
        if( !empty( $name ) ) {
            $name = '-' . $name;
        }
        include( locate_template( 'partials/blog/posts/normal/post' . $name . '.php' ) );
        $post_count++;
    }
    oxy_pagination($wp_query->max_num_pages);
}
else {
    get_template_part( 'partials/blog/posts/normal/post', 'no-posts' );
}

if( is_single() ) {
    // show post navigation at the bottom of single post
    get_template_part( 'partials/blog/posts/normal/nav', 'single' );
    // add related posts
    get_template_part( 'partials/blog/posts/normal/post', 'related' );
    // show comments below that
    $allow_comments = oxy_get_option( 'site_comments' );
    if( $allow_comments == 'posts' || $allow_comments == 'all' ) {
        comments_template( '', true );
    }
}
