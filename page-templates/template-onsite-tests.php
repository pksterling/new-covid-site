<?php
/**
 * Template Name: KP TEMPLATE - OnSite Tests
 * The template for displaying the OnSite Tests page
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<!-- Hero Slider -->
<div class="wrapper py-0" id="page-wrapper">

<?php get_template_part('partials/on-site-tests'); ?>
<?php get_template_part('partials/section-onsite-test'); ?>
<?php get_template_part('partials/section-got-a-question'); ?>

</div><!-- page wrapper -->

<?php get_footer();