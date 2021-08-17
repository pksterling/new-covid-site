<?php do_action('load_slider'); ?>

<div id="home-product-card-slider" class="container-fluid d-flex py-5 bg-light">
  <div class="container-fluid px-5">
    <div class="row slick-slider">
      <?php  
        $args = array(
          'post_type'      => 'product',
          'product_cat'      => 'Most Popular',
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
          global $product;
      ?>
        <div class="card card-body border-0 shadow mx-4 bg-primary">
          <h3 class="product-card-title text-white mb-3">
            <?php the_title(); ?>
          </h3>
          <div class="d-flex">
            <div>
              <div class="product-card-text text-white mb-3">
                <?php the_excerpt(); ?>
              </div>
              <div>
                <a href="#" class="btn btn-light text-primary">More Info</a>
              </div>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-around h-100 pl-5">
              <div class="rounded-circle bg-success product-group-dot"></div>
              <p class="text-white mb-0">£65</p>
            </div>
          </div>  
        </div>
      <?php endwhile ?>
    </div>
  </div>
</div>