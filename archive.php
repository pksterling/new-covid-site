<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">
	<main class="site-main" id="main">
		<div class="container newsfeed-container mb-5 py-5">
			<div class="js-articles-container">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="post-grid-item-container p-4 mx-2 mb-4 d-flex flex-column align-items-start justify-content-start" >
									<h6><?php the_category(', '); ?></h6>
									<h4><?php the_title(); ?></h4>
									<?php the_excerpt(); ?>
									<?php the_post_thumbnail(); ?>
									<p class="post-grid-author mt-3">Written by: <span><?php the_author(); ?></span> | Published: <?php the_date(); ?></p>
							</div>
					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</div>
		</div>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>
	</div><!-- #archive-wrapper -->

<?php get_footer();
