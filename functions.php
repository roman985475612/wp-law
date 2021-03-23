<?php
/**
 * Law functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Law
 */

require_once get_template_directory() . '/LawHeaderMenu.php';
require_once get_template_directory() . '/helpers.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'law_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function law_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Law, use a find and replace
		 * to change 'law' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'law', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'header-menu' => esc_html__( 'Header menu', 'law' ),
				'footer-menu' => esc_html__( 'Footer menu', 'law' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'law_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'law_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function law_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'law_content_width', 640 );
}
add_action( 'after_setup_theme', 'law_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function law_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'law' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'law' ),
			'before_widget' => '<div class="col-md-3">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'law_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function law_scripts() {
	wp_enqueue_style( 'law-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'law-googlefonts', 'https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800' );
	wp_enqueue_style( 'law-animate-css', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'law-icomoon-css', get_template_directory_uri() . '/assets/css/icomoon.css' );
	wp_enqueue_style( 'law-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'law-magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	wp_enqueue_style( 'law-caurosel-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
	wp_enqueue_style( 'law-theme-css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'law-flexslider-css', get_template_directory_uri() . '/assets/css/flexslider.css' );
	wp_enqueue_style( 'law-style-css', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'law-custom-css', get_template_directory_uri() . '/assets/css/custom.css' );

	wp_style_add_data( 'law-style', 'rtl', 'replace' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js' );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'law-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-modernizr-script', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'law-jquery-easing-script', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-jquery-waypoints-script', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-jquery-stellar-script', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-carousel-script', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-jquery-flexslider-script', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-jquery-countto-script', get_template_directory_uri() . '/assets/js/jquery.countTo.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-jquery-magnific-popup-script', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-jquery-magnific-popup-options-script', get_template_directory_uri() . '/assets/js/magnific-popup-options.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'law-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'law_scripts' );

function law_setup_phpmailer_init( $phpmailer )
{
    $phpmailer->IsSMTP();
    $phpmailer->Host        = SMTP_HOST;
    $phpmailer->Port        = SMTP_PORT;
    $phpmailer->Username    = SMTP_USER;
    $phpmailer->Password    = SMTP_PASS;
    $phpmailer->SMTPAuth    = SMTP_AUTH;
    $phpmailer->SMTPSecure  = SMTP_SECURE;
    $phpmailer->From        = SMTP_FROM;
    $phpmailer->FromName    = SMTP_NAME;
}
add_action( 'phpmailer_init', 'law_setup_phpmailer_init' );

/**
 * Custom post type
 */
require get_template_directory() . '/inc/custom-posttype.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
