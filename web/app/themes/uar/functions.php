<?php
/**
 * UAR functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UAR
 */

include (TEMPLATEPATH . '/inc/pt/toolbox-pt.php');
include (TEMPLATEPATH . '/inc/pt/publications-pt.php');
include (TEMPLATEPATH . '/inc/pt/best-practice-pt.php');
include (TEMPLATEPATH . '/inc/pt/news-cs-pt.php');
include (TEMPLATEPATH . '/inc/pt/events-courses-pt.php');
include (TEMPLATEPATH . '/inc/pt/working-groups-pt.php');
include (TEMPLATEPATH . '/inc/pt/media-library-pt.php');
include (TEMPLATEPATH . '/inc/pt/governance-policies-pt.php');
include (TEMPLATEPATH . '/inc/meta/events-meta.php');
include (TEMPLATEPATH . '/inc/meta/generic-meta.php');
/////////// disable comment functions ///////////////
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});
/////session////
function ur_theme_start_session()
{
    if (!session_id())
        session_start();
}
add_action("init", "ur_theme_start_session", 1);

/* ////////// Add Tags to pages */
function add_tags_to_pages() {
register_taxonomy_for_object_type( 'post_tag', 'page' );
}
add_action( 'init', 'add_tags_to_pages');
//////////////////
/* ////////// Add excerpt to pages */
function enable_page_excerpt() {
  add_post_type_support('page', array('excerpt'));
}
add_action('init', 'enable_page_excerpt');
//////tag posts per page/////
function wpa69774_limit_tags( $query ) {
 if ( $query->is_tag() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', -1 );
 }
}
add_action( 'pre_get_posts', 'wpa69774_limit_tags' );

//////////////////
////search posts per page
function nerm_modify_posts_per_page( $query ) {
if ( $query->is_search() ) {
$query->set( 'posts_per_page', '10' );
}
}
add_action( 'pre_get_posts', 'nerm_modify_posts_per_page' );



if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uar_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on UAR, use a find and replace
		* to change 'uar' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'uar', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'uar' ),
      'footer' => esc_html__( 'Footer', 'uar' ),
      'quicklinks' => esc_html__( 'Get Involved', 'uar' ),
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
			//'comment-form',
			//'comment-list',
			//'gallery',
			'caption',
			'style',
			'script',
		)
	);



	// Add theme support for selective refresh for widgets.
//	add_theme_support( 'customize-selective-refresh-widgets' );


}
add_action( 'after_setup_theme', 'uar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uar_content_width', 640 );
}
add_action( 'after_setup_theme', 'uar_content_width', 0 );



/////////tag stuff//////
function wpse28145_add_custom_types( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
       $post_types = array( 'post', 'toolbox' );

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );


/**
 * Enqueue scripts and styles.
 */
function uar_scripts() {

		wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery'), null, true );
	wp_enqueue_script('popper');

	wp_register_script( 'bstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script('bstrap');

	wp_enqueue_style( 'google-fonts-work-sans', 'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap', false );

	wp_enqueue_style('main-styles', get_template_directory_uri() . '/css/uar-main.css', array(), filemtime(get_template_directory() . '/css/uar-main.css'), false);

	wp_enqueue_style( 'uar-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'uar-style', 'rtl', 'replace' );

	wp_enqueue_script( 'uar-navigation', get_template_directory_uri() . '/js/nav-script.js', array(), filemtime(get_template_directory() . '/js/nav-script.js'), false);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uar_scripts' );

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('outline-style', get_template_directory_uri() . "/css/outline-style.css", array(), filemtime(get_template_directory() . '/css/outline-style.css'), false);
});

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
