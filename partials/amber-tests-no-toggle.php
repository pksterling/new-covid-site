<div class="home-book-a-test d-flex justify-content-center align-items-center py-5" style="background-image: url('<?php the_field('at_bg_image'); ?>');">
  <div class="container d-flex flex-column justify-content-center align-items-center py-0 py-md-5">
  <div class="ct-intro px-4">
      <?php the_field('at_title'); ?>
    </div>
    
  
    <!-- amber -->
    <div id="amber-tests" class="bat-products container d-flex flex-row flex-wrap justify-content-center align-items-center pt-0 pt-md-5 w-100">
      <?php  
        $args = array(
            'post_type'      => 'product',
            'product_cat'      => 'amber',
            'posts_per_page' => 12,
            'order' => 'ASC'
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
            global $product; ?>
            <div class="product-card d-flex flex-column justify-content-center align-items-center text-center mt-4 p-4 
            <?php if (has_term('green', 'product_cat') || has_term('green', 'parent')) { ?> 
              product-card-bg-green
            <?php } else if (has_term('amber', 'product_cat') || has_term('amber', 'parent')) { ?>
              product-card-bg-amber
            <?php } else { ?>
              product-card-bg-grey
            <?php } ?>
            ">
              <div class="product-card-title d-flex justify-content-center align-items-center px-4">
                <?php the_title(); ?>
              </div>
              <div class="product-card-content d-flex flex-column justify-content-center px-4">
                <?php if( have_rows('product_contents') ):
                  while( have_rows('product_contents') ) : the_row(); ?>
                    <p class="mb-0"><?php the_sub_field('text'); ?></p>
                  <?php endwhile;
                endif; ?>
              </div>
              <div class="product-card-price d-flex justify-content-center align-items-center">
                £<?php echo $product->get_price(); ?>
              </div>
              <div class="product-card-book-now d-flex justify-content-center align-items-center">
                <a class="px-4 py-2" href="<?php the_permalink(); ?>">Book Now</a>
              </div>
            </div>
        <?php endwhile;

        wp_reset_query();
      ?>
    </div>
  </div>
</div>