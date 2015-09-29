<?php
/**
 * Paul Component Engineering functions and definitions
 *
 * @package Paul Component Engineering
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'paulcomp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function paulcomp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Paul Component Engineering, use a find and replace
	 * to change 'Paul Component Engineering' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'paulcomponents', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'paulcomponents' ),
		'footer-utility' => __( 'Footer Utility', 'paulcomponents' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // paulcomp_setup
add_action( 'after_setup_theme', 'paulcomp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function paulcomp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'paulcomponents' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'paulcomp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function paulcomp_scripts() {
	wp_enqueue_style( 'paulcomp-style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css') );

	wp_enqueue_script( 'paulcomp-site-scripts', get_template_directory_uri() . '/js/site-scripts.js', array(), '20130115', true );

	wp_enqueue_script( 'paulcomp-jQuery', '//code.jquery.com/ui/1.11.4/jquery-ui.js', false, true );

	wp_enqueue_script( 'paulcomp-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '20130115', true );

	wp_enqueue_script( 'paulcomp-pictureFill', get_template_directory_uri() . '/js/pictureFill.js', array(), '20130115', true );

	wp_enqueue_script( 'paulcomp-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20130115', true );

	wp_enqueue_script( 'paulcomp-matchHeight', get_template_directory_uri() . '/js/matchHeight.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'paulcomp_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Paul Logo on login
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/paul_black_flag_logo.svg) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Paul Component Engineering';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Declare Woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_image_size( 'portal-mobile', '480', '360', 'true' );
add_image_size( 'portal-tablet', '768', '576', 'true' );
add_image_size( 'portal-desktop', '1280', '960', 'true' );
add_image_size( 'portal-retina', '2400', '1800', 'true' );

add_image_size( 'page-banner-mobile', '480', '400', 'true' );
add_image_size( 'page-banner-tablet', '768', '356', 'true' );
add_image_size( 'page-banner-desktop', '1280', '580', 'true' );
add_image_size( 'page-banner-retina', '2400', '800', 'true' );

add_image_size( 'story-banner-mobile', '480', '480', 'true' );
add_image_size( 'story-banner-tablet', '768', '556', 'true' );
add_image_size( 'story-banner-desktop', '1280', '780', 'true' );
add_image_size( 'story-banner-retina', '2400', '900', 'true' );

add_image_size( 'mailing-banner-mobile', '768', '460', 'true' );
add_image_size( 'mailing-banner-desktop', '1280', '380', 'true' );

add_image_size( 'category-banner-mobile', '480', '300', 'true' );
add_image_size( 'category-banner-desktop', '1280', '150', 'true' );
add_image_size( 'category-banner-retina', '2400', '300', 'true' );

/**
 * TypeKit Fonts
 */
function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/bpk6lyp.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
  	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );

// Disable reviews on products
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

// Remove Woo styling
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_role('dealer', 'Dealer', array(
    'read' => true, // True allows that capability
    'edit_posts' => true,
    'delete_posts' => false, // Use false to explicitly deny
));

// Force price to show on variation products
add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
if ($value['price_html'] == '') {
$value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
}
return $value;
}, 10, 3);

/* Reset status of new orders from "on-hold" to "processing" */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) {
    global $woocommerce;
     if ( !$order_id )
        return;
    $order = new WC_Order( $order_id );
    $order->update_status( 'processing' );
}

/**
 * Apply a different tax rate based on the user role.
 */
function wc_diff_rate_for_user( $tax_class, $product ) {
	if ( is_user_logged_in() && current_user_can( 'dealer' ) ) {
		$tax_class = 'Zero Rate';
	}

	return $tax_class;
}
add_filter( 'woocommerce_product_tax_class', 'wc_diff_rate_for_user', 1, 2 );
