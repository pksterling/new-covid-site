<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}



$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/travel-countries.php',                // Load Travel Countries Array.
	'/order-meta-data.php',									// Load Order Meta Data
	'/check-out-form.php',									// Load Checkout Form Changes
	'/single-product-layout-changes.php',		// Load single-product layout changes
	'/arrivals-export.php',									// Load Arrivals Export Page
	'/kit-sales-report.php',								// Load Kit Sales Report Page
	'/email-changes.php',										// Load Email Changes
	'/pdf-print-form.php',									// Load PDF print function
	'/coupon-used-email.php',								// Send Email when coupon is used
);

function kp_scripts() {

	/* FONT AWESOME */
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css');

	/* Slick Slider CDN */
	wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
	
	/*AOS*/
	wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js');

	/*types.js*/
	wp_enqueue_script('typed-js', 'https://cdn.jsdelivr.net/npm/typed.js@2.0.12');
}

add_action( 'wp_enqueue_scripts', 'kp_scripts' );

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
};

// GOOGLE ANALYTICS

add_action('wp_head', 'wpb_add_googleanalytics');
function wpb_add_googleanalytics() { ?>

<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-203491894-1">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-203491894-1');
</script>

<?php }
// Removing apple/microsoft/samsung pay
add_filter( 'wc_stripe_hide_payment_request_on_product_page', '__return_true' );
add_action( 'init', 'remove_stripe_payment_request_from_cart_20200608', 99 );
function remove_stripe_payment_request_from_cart_20200608() {
remove_action( 'woocommerce_proceed_to_checkout', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_html' ), 1 );
remove_action( 'woocommerce_proceed_to_checkout', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_separator_html' ), 2 );
};

add_action( 'load_slider', 'activate_slider');
function activate_slider() {
	?>
	<script>
	jQuery(document).ready(function(){
		jQuery('.slick-slider').slick({ 
			infinite: true,
  		slidesToShow: 3,
  		slidesToScroll: 1
		});
	});
	</script>
	<?php
}
remove_filter ('acf_the_content', 'wpautop');
remove_filter ('the_excerpt', 'wpautop');
remove_filter('get_the_excerpt', 'wp_trim_excerpt');

?>
