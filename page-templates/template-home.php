<?php
/**
 * Template Name: KP TEMPLATE - Home
 * The template for displaying the home page
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<!-- Hero Slider -->
<div class="wrapper py-0" id="page-wrapper">

<?php get_template_part('partials/home-hero'); ?>
<?php get_template_part('partials/home-product-card-slider'); ?>
<?php get_template_part('partials/section-how-it-works'); ?>
<?php get_template_part('partials/section-got-a-question'); ?>


</div><!-- page wrapper -->

<?php get_footer();