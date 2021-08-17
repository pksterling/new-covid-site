<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-wrapper">

    <?php
 
    // checks if there are any posts that match the query
    if (have_posts()) :
    
    // If there are posts matching the query then start the loop
    while ( have_posts() ) : the_post();
    
        // the code between the while loop will be repeated for each post
        ?>
        <div class="container py-3 py-md-5">
            <h3 class="col-xs-12 pb-3"><?php echo get_the_title(); ?></h3>
            <div class="post-cat-date d-flex flex-row justify-content-start align-items-center col-xs-12 mb-3">
                <h6 class="post-category"><?php the_category(', '); ?></h6>
                <h6 class="mx-2">|</h6>
                <h6 class="post-date">Posted on <?php the_date(); ?> by <strong><?php the_author(); ?></strong></h6>
            </div>
            <?php the_content(); ?>
        </div>

        <div class="bullet bullet-right">
            <div data-aos="fade-left" class="bullet-title d-flex flex-row justify-content-start align-items-center ml-auto">
                <h4 class="ml-3">Share this page</h4>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( $current_url ) ;?>" target="_blank" class="d-flex justify-content-center align-items-center"><i class="fab fa-facebook my-3 mx-3"></i></a>
                <a href="http://twitter.com/share?text=<?php echo rawurlencode( get_the_title() ); ?>&url=<?php echo urlencode( $current_url ) ;?>" target="_blank" class="d-flex justify-content-center align-items-center"><i class="fab fa-twitter my-3 mr-3"></i></a>
            </div>
        </div>
    
        <?php
    
        // Stop the loop when all posts are displayed
    endwhile;
    
    // If no posts were found
    else :
    ?>
    <p>Sorry no posts matched your criteria.</p>
    <?php
endif;
?>

</div><!-- page wrapper -->
<?php get_footer();