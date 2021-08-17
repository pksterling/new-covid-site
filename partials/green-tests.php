<div class="home-book-a-test d-flex justify-content-center align-items-center py-5" style="background-image: url('<?php the_field('gt_bg_image'); ?>');">
  <div class="container d-flex flex-column justify-content-center align-items-center py-0 pt-md-5 pb-md-3">
    <div class="ct-intro px-4">
      <?php the_field('gt_title'); ?>
      <!-- toggler switch -->
      <div class="to-from-toggler-container to-from-toggler-container-green position-relative d-flex flex-row justify-content-center align-items-center">
        <h5 class="mb-0 label-to label-from-to-green active px-4 py-1">TO</h5>
        <div class="checkbox">
            <div class="inner inner-green">
                <div class="toggle">
                </div>
            </div>
        </div>
        <h5 class="mb-0 label-from label-from-to-green px-4 py-1">FROM</h5>
      </div>

    </div>
    <!-- green TO-->
    <div class="bat-products bat-products-green active container flex-row flex-wrap justify-content-center align-items-center pt-0 pt-md-5 w-100">
      <?php  
        $args = array(
            'post_type'      => 'product',
            'product_cat'      => 'green+to-the-uk',
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
                    <p class="mb-0">
                      <!-- <img class="product-card-content-icon" src="<?php bloginfo('template_directory'); ?>/images/product-image-icon.png" alt="test tubes" /> -->
                      <?php the_sub_field('text'); ?></p>
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
    <!-- green FROM-->
    <div class="bat-products bat-products-green container flex-row flex-wrap justify-content-center align-items-center pt-0 pt-md-5 w-100">
      <?php  
        $args = array(
            'post_type'      => 'product',
            'product_cat'      => 'green+from-the-uk',
            'posts_per_page' => 12,
            'order' => 'ASC'
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
            global $product; ?>
            <div class="product-card d-flex flex-column justify-content-center align-items-center text-center mt-4 p-4 
            <?php if (has_term('green', 'product_cat')) { ?> 
              product-card-bg-green
            <?php } else if (has_term('amber', 'product_cat')) { ?>
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