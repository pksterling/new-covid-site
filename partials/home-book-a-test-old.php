<div class="home-book-a-test d-flex justify-content-center align-items-center py-5">
  <div class="container d-flex flex-column justify-content-center align-items-center py-0">
    <div class="bat-intro px-4">
      <?php the_field('bat_title'); ?>
      <div id="other-tests" class="bat-products container d-flex flex-row flex-wrap justify-content-center align-items-center pt-0 product-card-container">
      <?php  
        $args = array(
            'post_type'      => 'product',
            'product_cat'      => 'Most Popular',
            'posts_per_page' => 4,
            'order' => 'ASC'
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
            global $product; ?>
            <div class="mp-product-card product-card d-flex flex-column justify-content-center align-items-center text-center p-4 
            <?php if (has_term('green', 'product_cat') || has_term('green', 'parent')) { ?> 
              product-card-bg-green
            <?php } else if (has_term('amber', 'product_cat') || has_term('amber', 'parent')) { ?>
              product-card-bg-amber
              <?php } else if (has_term('on-site', 'product_cat')){ ?>
							product-card-bg-onsite
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
    <?php the_field('bat_subtitle'); ?>
      <div class="nrtt-text <?php the_field('show_nrtt_text') ?>">
        <?php the_field('nrtt_text') ?>
      </div>
    </div>
    <!-- <a class="bat-more-tests-btn d-none d-md-block mt-5 mb-4 mb-md-0 px-5 py-3 text-center" href="<?php the_field('bat_more_tests_btn_link'); ?>"><?php the_field('bat_more_tests_btn_text'); ?></a> -->
    <!-- <a class="bat-more-tests-btn d-block d-md-none mt-5 mb-4 mb-md-0 px-5 py-3 text-center" href="<?php the_field('bat_more_tests_btn_link_mob'); ?>"><?php the_field('bat_more_tests_btn_text'); ?></a> -->
    <div class="bat-products d-flex flex-row flex-wrap justify-content-center align-items-center mb-5 pt-0 pt-md-5 w-100">
      <!-- box 1 -->
      <div class="product-card d-flex flex-column justify-content-center align-items-center text-center mt-4 p-4 product-card-bg-green ?>
      ">
        <div class="product-card-info-box product-card-info-box-green d-flex flex-column justify-content-center align-items-start">
          <div class="product-card-info-box-title product-card-info-box-title-green d-flex justify-content-center align-items-center py-4">
            <?php the_field('bat_box_title_1'); ?>
          </div>
          <?php if( have_rows('bat_box_items_1') ):
            while( have_rows('bat_box_items_1') ) : the_row(); ?>
              <div class="product-card-info-box-item d-flex flex-row justify-content-start align-items-center px-3">
                <div class="product-card-info-box-item-image pr-3">
                  <img src="<?php the_sub_field('icon'); ?>" alt="">
                </div>
                <div class="product-card-info-box-item-text text-left"><?php the_sub_field('text'); ?></div>
              </div>
            <?php endwhile;
          endif; ?>
        </div>
        <div class="product-card-book-now d-flex flex-column justify-content-center align-items-center mt-4">
          <p class="green-price-text"><?php the_field('bat_box_above_button_text_1'); ?></p>
          <a class="px-4 py-2" href="<?php the_field('bat_box_button_link_1'); ?>"><?php the_field('bat_box_button_text_1'); ?></a>
        </div>
      </div>
      <!-- box 2 -->
      <div class="product-card d-flex flex-column justify-content-center align-items-center text-center mt-4 p-4 product-card-bg-amber ?>
      ">
        <div class="product-card-info-box product-card-info-box-amber d-flex flex-column justify-content-center align-items-start">
          <div class="product-card-info-box-title product-card-info-box-title-amber d-flex justify-content-center align-items-center py-4">
            <?php the_field('bat_box_title_2'); ?>
          </div>
          <?php if( have_rows('bat_box_items_2') ):
            while( have_rows('bat_box_items_2') ) : the_row(); ?>
              <div class="product-card-info-box-item d-flex flex-row justify-content-start align-items-center px-3">
                <div class="product-card-info-box-item-image pr-3">
                  <img src="<?php the_sub_field('icon'); ?>" alt="">
                </div>
                <div class="product-card-info-box-item-text text-left"><?php the_sub_field('text'); ?></div>
              </div>
            <?php endwhile;
          endif; ?>
        </div>
        <div class="product-card-book-now d-flex flex-column justify-content-center align-items-center mt-4">
          <p class="amber-price-text"><?php the_field('bat_box_above_button_text_2'); ?></p>
          <a class="px-4 py-2" href="<?php the_field('bat_box_button_link_2'); ?>"><?php the_field('bat_box_button_text_2'); ?></a>
        </div>
      </div>
      <!-- box 3 -->
      <div class="product-card d-flex flex-column justify-content-center align-items-center text-center mt-4 p-4 product-card-bg-grey ?>
      ">
        <div class="product-card-info-box product-card-info-box-grey d-flex flex-column justify-content-center align-items-start">
          <div class="product-card-info-box-title d-flex justify-content-center align-items-center py-4">
            <?php the_field('bat_box_title_3'); ?>
          </div>
          <?php if( have_rows('bat_box_items_3') ):
            while( have_rows('bat_box_items_3') ) : the_row(); ?>
              <div class="product-card-info-box-item d-flex flex-row justify-content-start align-items-center px-3">
                <div class="product-card-info-box-item-image pr-3">
                  <img src="<?php the_sub_field('icon'); ?>" alt="">
                </div>
                <div class="product-card-info-box-item-text text-left"><?php the_sub_field('text'); ?></div>
              </div>
            <?php endwhile;
          endif; ?>
        </div>
        <div class="product-card-book-now d-flex flex-column justify-content-center align-items-center mt-4">
          <p class="other-price-text"><?php the_field('bat_box_above_button_text_3'); ?></p>
          <a class="px-4 py-2" href="<?php the_field('bat_box_button_link_3'); ?>"><?php the_field('bat_box_button_text_3'); ?></a>
        </div>
      </div>

    </div>
    
  </div>
</div>
