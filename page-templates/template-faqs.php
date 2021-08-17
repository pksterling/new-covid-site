<?php
/**
 * Template Name: KP TEMPLATE - FAQs
 * The template for displaying the FAQs page
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<!-- Hero Slider -->
<div class="wrapper py-0" id="page-wrapper">

<?php get_template_part('partials/faqs-questions'); ?>

</div><!-- page wrapper -->

<?php get_footer();