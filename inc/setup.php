<?php
/**
 * Theme basic setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists( 'understrap_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'understrap' ),
			'secondary' => __( 'Secondary Menu', 'understrap' ),
			'footer_menu' => __( 'Footer Menu', 'understrap' ),
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
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		understrap_setup_theme_default_settings();

	}
}


add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			$post_excerpt = $post_excerpt . ' <p>
			<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" class="learn-more px-3">' . __( 'Read More','understrap' ) . '
			</a></p>';
		}
		return $post_excerpt;
	}
}


function kp_my_load_more_scripts() {

	global $wp_query; 

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );

	// now the most interesting part
	// we have to pass parameters to loadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'kp_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
	wp_enqueue_script( 'my_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'kp_my_load_more_scripts' );

function kp_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	$args['posts_per_page'] = 8;

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post();
		?>
			<div class="post-grid-item-container col-xs-10 col-md-5 p-4 mx-2 mb-4 d-flex flex-column align-items-start justify-content-start">
					<h6><?php the_category(', '); ?></h6>
					<h4><?php the_title(); ?></h4>
					<p><?php echo get_the_excerpt(); ?></p><p><a href="<?php esc_url( get_permalink( get_the_ID() ) ) ?>" class="learn-more d-flex flex-row align-items-center justify-content-start">Read More
					<svg class="ml-2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" viewBox="0 0 100 100" width="30" height="30"><defs><path d="M68.88 16.95C67.06 15.14 64.12 15.14 62.3 16.95C60.49 18.77 60.49 21.71 62.3 23.53C63.76 24.98 71.03 32.26 84.12 45.35C36.44 45.35 9.95 45.35 4.65 45.35C2.08 45.35 0 47.43 0 50C0 52.57 2.08 54.65 4.65 54.65C9.95 54.65 36.44 54.65 84.12 54.65C71.03 67.74 63.76 75.02 62.3 76.47C60.49 78.29 60.49 81.23 62.3 83.05C63.21 83.95 64.4 84.41 65.59 84.41C66.78 84.41 67.97 83.95 68.88 83.05C71.86 80.07 95.66 56.26 98.64 53.29C100.45 51.47 100.45 48.53 98.64 46.71C92.69 40.76 71.86 19.93 68.88 16.95Z" id="bY6fBgwgv"></path></defs><g><g><g><use xlink:href="#bY6fBgwgv" opacity="1" fill="#d30074" fill-opacity="1"></use><g><use xlink:href="#bY6fBgwgv" opacity="1" fill-opacity="0" stroke="#d30074" stroke-width="1" stroke-opacity="0"></use></g></g></g></g></svg>
					</a></p>
					<?php the_post_thumbnail(); ?>
					<p class="post-grid-author mt-3">Written by: <span><?php the_author(); ?></span> | Published: <?php the_date(); ?></p>
			</div>
		<?php
		endwhile;
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}

add_action('wp_ajax_loadmore', 'kp_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'kp_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}