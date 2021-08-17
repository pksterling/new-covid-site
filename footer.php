<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php get_template_part('partials/footer-main'); ?>
<?php get_template_part('partials/footer-kp'); ?>

</div><!-- keep this, linked to header -->

<?php wp_footer(); ?>

</body>

</html>

