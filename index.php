<?php
/**
 * Template Name: Home Template
 * The template for displaying the home page
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<!-- Hero Slider -->
<div class="wrapper" id="page-wrapper">

<div class="container">
    <h1><?php the_title(); ?></h1>
    <p>This is the home page for the KP Studio 'Temp-Tings' Wordpress template.</p>
    <p>This template has a number of cool features already in place, such as Bootstrap and Gulp, that make it a perfect starting point for a KP Wordpress project.</p>
    <h4>Hints, Tips and Advice</h4>
    <p>Check if there is a <strong>plugin</strong> that will complete a task for you - there are literally thousands of plugins waiting to be used. Want to make your nav bar sticky? There's a plugin...Want to add a custom colour paletter for your client? There's a plugin!</p>
    <p>Almost all KP Wordpress sites use the Advanced Custom Fields plugin and, as such, KP actually have a license for the <strong>Advanced Custom Fields Pro</strong> version. You will add this plugin to almost every project as it increases your custom field options with things like 'repeaters'.</p>
    <p>Another plugin you will often use is the <strong>WP All In One Migration</strong>. This plugin allows you to import and export full WP files - this is something you will often do to take backups or if you are using a previous project as a template.</p>
    <p>One thing that a lot of clients want in a WP site is a <strong>blog</strong> or an area where they can make 'Posts' - click the blog page for an example. They will ideally want visitors to be able to share any given post easily and, with that in mind, we have the footer bar setup with <strong>sharer</strong> options - this code, found in the footer.php file, will direct users to their personal facebook, twitter and linkedin accounts to share the current page they are on.</p>

</div>

</div><!-- page wrapper -->

<?php get_footer();