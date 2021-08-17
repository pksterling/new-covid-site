<?php
/**
 * Search results partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article class="col-12" id="post-<?php the_ID(); ?>">

	<header class="entry-header mt-3">

		<?php
		the_title(
			sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h4>'
		);
		?>

	</header><!-- .entry-header -->

	<div class="search-entry-summary entry-summary">
		<?php the_excerpt(); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="search-result-type-date d-flex flex-row justify-content-start col-xs-12">
				<p><?php the_category(", "); ?></p><p class="ml-3">|</p><p class="ml-3"><?php the_date(); ?></p>
			</div>

		</div><!-- .entry-meta -->

		<?php endif; ?>

	</div><!-- .entry-summary -->

	

</article><!-- #post-## -->
