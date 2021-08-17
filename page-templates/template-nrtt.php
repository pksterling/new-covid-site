<?php
/**
 * Template Name: KP TEMPLATE - NRTT
 * The template for displaying the NRTT page
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<!-- Hero Slider -->
<div class="wrapper py-0" id="page-wrapper">

<?php get_template_part('partials/nrtt-advertisement'); ?>
<?php get_template_part('partials/section-got-a-question'); ?>

</div><!-- page wrapper -->

<?php get_footer();