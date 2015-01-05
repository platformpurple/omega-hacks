<?php
/**
 * Main functions file
 *
 * @package Omega
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.7.3
 */

// create defines
define( 'THEME_NAME', 'Omega' );
define( 'THEME_SHORT', 'omega' );

define( 'OXY_THEME_DIR', get_template_directory() . '/' );
define( 'OXY_THEME_URI', get_template_directory_uri() . '/' );

// include extra theme specific code
include OXY_THEME_DIR . 'inc/frontend.php';
include OXY_THEME_DIR . 'inc/woocommerce.php';
include OXY_THEME_DIR . 'bbpress/oxygenna/OxygennaBBPress.php';
include OXY_THEME_DIR . 'inc/OmegaBBPress.php';
include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-framework/inc/OxygennaTheme.php';
include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-mega-menu/oxygenna-mega-menu.php';

global $oxy_theme;
$oxy_theme = new OxygennaTheme(
    array(
        'text_domain'       => 'omega-td',
        'admin_text_domain' => 'omega-admin-td',
        'min_wp_ver'        => '3.4',
        'sidebars' => array(
            'sidebar' => array( 'Sidebar', '' ),
        ),
        'widgets' => array(
            'Swatch_twitter' => 'swatch_twitter.php',
            'Swatch_social'   => 'swatch_social.php',
            'Swatch_wpml_language_selector'  => 'swatch_wpml_language_selector.php',
        ),
        'shortcodes' => false,
    )
);

include OXY_THEME_DIR . 'inc/custom-posts.php';
include OXY_THEME_DIR . 'inc/options/shortcodes/shortcodes.php';
include OXY_THEME_DIR . 'inc/options/widgets/default_overrides.php';

if( is_admin() ) {
    include OXY_THEME_DIR . 'inc/backend.php';
    include OXY_THEME_DIR . 'inc/options/shortcodes/create-shortcode-options.php';
    include OXY_THEME_DIR . 'inc/theme-metaboxes.php';
    include OXY_THEME_DIR . 'inc/visual-composer-extend.php';
    include OXY_THEME_DIR . 'inc/visual-composer.php';
    include OXY_THEME_DIR . 'inc/install-plugins.php';
    include OXY_THEME_DIR . 'inc/one-click-import.php';
    include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-one-click/inc/OxygennaOneClick.php';
    include OXY_THEME_DIR . 'vendor/oxygenna/oxygenna-typography/oxygenna-typography.php';
}

// MOVE THIS FUNCTION INTO THEME SWITCHER
function oxy_check_for_blog_switcher( $name ) {
    if( isset( $_GET['blogstyle'] ) ) {
        $name = $_GET['blogstyle'];
    }
    return $name;
}
add_filter( 'oxy_blog_type', 'oxy_check_for_blog_switcher' );

function loadHTMLpopContent(){
    $post_id = $_POST["post_id"];

    $content_post = get_post($post_id);
    $content = $content_post->post_content;
    ?>
    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    <h2><?php echo get_the_title( $post_id ) ?></h2>
    <div><?php echo $content ?></div>
    <?php
    die();
}

add_action( 'wp_ajax_loadHTMLpopContent', 'loadHTMLpopContent' );
add_action( 'wp_ajax_nopriv_loadHTMLpopContent', 'loadHTMLpopContent' );

