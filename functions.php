<?php
/**
 * Aliya Y. Robinson functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aliya_Y._Robinson
 */

require_once('custom_nav.php');

if ( ! function_exists( 'ayr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ayr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aliya Y. Robinson, use a find and replace
	 * to change 'ayr' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ayr', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ayr' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ayr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ayr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ayr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ayr_content_width', 640 );
}
add_action( 'after_setup_theme', 'ayr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ayr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ayr' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ayr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ayr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ayr_scripts() {
	wp_enqueue_style( 'ayr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ayr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ayr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery_2_2.js', array(), '2.2', true );

	wp_enqueue_script( 'd3', get_template_directory_uri() . '/js/d3.js', array(), '', true );

	wp_enqueue_script( 'ayr-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ayr_scripts' );




/**
 * ----------------------------------------------------------------------------------------
 * Define Site Variables
 * ----------------------------------------------------------------------------------------
 */
define( 'SITEROOT', get_site_url());
define( 'THEMEROOT', get_stylesheet_directory_uri());
define( 'IMAGES', THEMEROOT. '/img' );
define( 'FONTS', THEMEROOT. '/fonts' );
define( 'SCRIPTS', THEMEROOT. '/js' );



/**
 * ----------------------------------------------------------------------------------------
 * Include the generated CSS in the page header.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'load_css_head' ) ) {
	function load_css_head() {
		?>
		<style type="text/css">
		@font-face {
		    font-family: 'alex_brush';
		    src: url('<?php echo FONTS; ?>/alexbrush-regular-webfont.eot');
		    src: url('<?php echo FONTS; ?>/alexbrush-regular-webfont.eot?#iefix') format('embedded-opentype'),
		         url('<?php echo FONTS; ?>/alexbrush-regular-webfont.woff') format('woff'),
		         url('<?php echo FONTS; ?>/alexbrush-regular-webfont.ttf') format('truetype'),
		         url('<?php echo FONTS; ?>/alexbrush-regular-webfont.svg#alex_brush') format('svg');
		    font-weight: normal;
		    font-style: normal;
		}

		@font-face {
		    font-family: 'work_sans';
		    src: url('<?php echo FONTS; ?>/worksans-bold-webfont.eot');
		    src: url('<?php echo FONTS; ?>/worksans-bold-webfont.eot?#iefix') format('embedded-opentype'),
		         url('<?php echo FONTS; ?>/worksans-bold-webfont.woff') format('woff'),
		         url('<?php echo FONTS; ?>/worksans-bold-webfont.ttf') format('truetype'),
		         url('<?php echo FONTS; ?>/worksans-bold-webfont.svg#work_sans') format('svg');
		    font-weight: 800;
		    font-style: normal;
		}

		@font-face {
		    font-family: 'work_sans';
		    src: url('<?php echo FONTS; ?>/worksans-light-webfont.eot');
		    src: url('<?php echo FONTS; ?>/worksans-light-webfont.eot?#iefix') format('embedded-opentype'),
		         url('<?php echo FONTS; ?>/worksans-light-webfont.woff') format('woff'),
		         url('<?php echo FONTS; ?>/worksans-light-webfont.ttf') format('truetype'),
		         url('<?php echo FONTS; ?>/worksans-light-webfont.svg#work_sans') format('svg');
		    font-weight: 100;
		    font-style: normal;
		}

		@font-face {
		    font-family: 'work_sans';
		    src: url('<?php echo FONTS; ?>/worksans-regular-webfont.eot');
		    src: url('<?php echo FONTS; ?>/worksans-regular-webfont.eot?#iefix') format('embedded-opentype'),
		         url('<?php echo FONTS; ?>/worksans-regular-webfont.woff') format('woff'),
		         url('<?php echo FONTS; ?>/worksans-regular-webfont.ttf') format('truetype'),
		         url('<?php echo FONTS; ?>/worksans-regular-webfont.svg#work_sans') format('svg');
		    font-weight: 400;
		    font-style: normal;
		}

		@font-face {
		    font-family: 'work_sans';
		    src: url('<?php echo FONTS; ?>/worksans-semibold-webfont.eot');
		    src: url('<?php echo FONTS; ?>/worksans-semibold-webfont.eot?#iefix') format('embedded-opentype'),
		         url('<?php echo FONTS; ?>/worksans-semibold-webfont.woff') format('woff'),
		         url('<?php echo FONTS; ?>/worksans-semibold-webfont.ttf') format('truetype'),
		         url('<?php echo FONTS; ?>/worksans-semibold-webfont.svg#work_sans') format('svg');
		    font-weight: 600;
		    font-style: normal;
		}
		</style>

		<?php
	}
	add_action( 'wp_head', 'load_css_head' );
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<main class="site-content" role="main">';
}

function my_theme_wrapper_end() {
  echo '</main>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
