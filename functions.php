<?php
/**
 * Horizons 2015 functions and definitions
 *
 * @package Horizons 2015
 */

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( ! function_exists( 'horizons_2015_info' ) ) :

function horizons_2015_info( $key = null ) {
    static $theme_info;

    if ( null === $theme_info ) {
        $theme_info = wp_get_theme();
    }

    if ( ! $key )
        return $theme_info;

    if ( ! isset( $theme_info[ $key ] ) )
        return null;

    return $theme_info[ $key ];
}

endif;

if ( ! function_exists( 'horizons_2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function horizons_2015_setup() {

    Dotenv::load(__DIR__);

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Horizons 2015, use a find and replace
     * to change 'horizons-2015' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'horizons-2015', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    //add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'horizons-2015' ),
        'austin' => __( 'Primary Menu (Global)', 'horizons-2015' ),
        'london' => __( 'Primary Menu (Europe)', 'horizons-2015' ),
        'social' => __( 'Footer Menu (Social)', 'horizons-2015' ),
        'switcher' => __( 'Footer Menu (Switcher)', 'horizons-2015' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
}
endif; // horizons_2015_setup
add_action( 'after_setup_theme', 'horizons_2015_setup' );

/**
 * Enqueue scripts and styles.
 */
function horizons_2015_scripts() {
    if ( is_admin() ) {
        wp_enqueue_style( 'horizons-2015-style', get_stylesheet_uri() );
    } else {
        wp_register_style( 'avenir', getenv('PV_AVENIR_CSS'), array() );
        wp_enqueue_style( 'horizons-2015-style', get_stylesheet_directory_uri() . '/css/main.css',
            array('avenir'), horizons_2015_info( 'Version' ) );
    }

    wp_register_script( 'modernizr', get_stylesheet_directory_uri() .
        '/bower_components/modernizr/modernizr.js', array(), '2.8.3', false );
    wp_register_script( 'bootstrap', get_stylesheet_directory_uri() .
        '/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
        array('jquery'), '3.3.2', true );
    wp_register_script( 'stellar', get_stylesheet_directory_uri() .
        '/bower_components/stellar/jquery.stellar.min.js', array('jquery'), '0.6.2', true );
    wp_register_script( 'horizons-2015', get_stylesheet_directory_uri() .
        '/js/main.js', array('jquery', 'stellar'), horizons_2015_info( 'Version' ), true );
    wp_enqueue_script( 'bootstrap' );
    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'horizons-2015' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( WP_DEBUG ) {
        wp_enqueue_script( 'livereload', '//localhost:35729/livereload.js?snipver=1' );
    }
}
add_action( 'wp_enqueue_scripts', 'horizons_2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Register the custom fields that the theme needs
 */
require get_template_directory() . '/inc/custom-fields.php';

/**
 * Change the editor so it's nice and pretty
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Work some shortcode magic in the nav so we can use icons
 */
require get_template_directory() . '/inc/navs.php';

/**
 * The Bootstrap nav walker. I still use it everywhere
 */
require get_template_directory() . '/inc/nav-walker.php';

/**
 * Custom shortcodes. Mostly for icons
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * A bit of logic around the different countries
 */
require get_template_directory() . '/inc/countries.php';

/**
 * Page template goodies
 */
require get_template_directory() . '/inc/page.php';
