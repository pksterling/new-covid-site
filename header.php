<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="google-site-verification" content="z7m83KSYgQKBm9SKbkix9LXxPBKgmaUC8ari7yaOGgI" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- TikTok Pixel Code Start -->
	<script>
	!function (w, d, t) {
		w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++
	)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=i+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};
		ttq.load('C391E23521OS9I786200');
		ttq.page();
	}(window, document, 'ttq');
	</script>
	<!-- TikTok Pixel Code End -->
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

<div class="header-top position-relative shadow">
	<div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center py-3">
			<div class="logos d-flex flex-row justify-content-center justify-content-lg-start align-items-center pl-4">
				<?php the_custom_logo(); ?>
			</div>

		<nav id="main-nav" class="navbar navbar-expand-lg d-flex flex-column flex-lg-row justify-content-lg-center p-1 p-lg-0" aria-labelledby="main-nav-label">

			<?php if ( 'container' === $container ) : ?>
			<div class="d-flex justify-content-between align-items-center">
			<?php endif; ?>

				<div class="nav-right d-flex flex-column align-items-center justify-content-between">
					<div class="nav-menu-container d-flex align-items-end">
						<div class="nav-menu">
						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => '',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav flex-row',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
						</div>
					</div>
				</div>
				
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

			<?php if ( 'container' === $container ) : ?>
			<div class="d-flex justify-content-between align-items-center py-3 py-lg-0">
			<?php endif; ?>

				<div class="nav-right d-flex flex-column align-items-center justify-content-between">
					<div class="nav-menu-container d-flex align-items-end">
						<div class="nav-menu">
						<!-- The WordPress Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'secondary',
								'container_class' => '',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav flex-row',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
						</div>
					</div>
				</div>
				
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

			<div class="cart-icon-container d-flex flex-row justify-content-center align-items-center align-self-center align-self-lg-end">
				<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
					
					$count = WC()->cart->cart_contents_count;
					?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
					if ( $count > 0 ) {
							?>
							<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
							<?php
					}
							?></a>

				<?php } ?>
			</div>

		</nav><!-- .site-navigation -->
	</div>
	<div class="<?php the_field('show_discount_banner', 'option') ?>  discount-banner justify-content-center align-items-center flex-column px-4">
		<p class="mr-2 mb-0 pt-3 discount-text"><?php the_field('discount_banner_text', 'option') ?> </p>
		<p class="discount-text-bigger">Only available for the next <span class="discountString"></span></p>
	</div>
	<div class="<?php the_field('show_book_ref_banner', 'option') ?>  discount-banner book-ref-banner justify-content-center align-items-center flex-column p-4">
		<?php the_field('book_ref_banner_text', 'option') ?>
	</div>
</div>
