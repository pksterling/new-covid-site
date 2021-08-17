<div class="footer py-5">
  <div class="container d-flex flex-column flex-md-row justify-content-start align-items-start w-100">
    <div class="footer-logo col-12 col-md-3">
      <img src="<?php the_field('footer_logo', 'option'); ?>" alt="">
    </div>
    <div class="footer-center col-12 col-md-3">
      <h6 class="my-4 mt-md-0 mb-md-5"><?php the_field('footer_menu_header', 'option'); ?></h6>
      <?php wp_nav_menu(
          array(
            'theme_location'  => 'footer_menu',
            'menu_class'      => 'navbar-nav',
            'fallback_cb'     => '',
            'menu_id'         => 'footer_menu',
            'depth'           => 1,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
          )
        ); ?>
    </div>
    <div class="footer-right col-12 col-md-3">
      <h6 class="my-4 mt-md-0  mb-md-5" id="contact-us"><?php the_field('footer_middle_header', 'option'); ?></h6>
      <p class="mb-0"><?php the_field('footer_tel', 'option'); ?></p>
      <a href="mailto:<?php the_field('footer_email', 'option'); ?>" class="mb-0"><?php the_field('footer_email', 'option'); ?></a>
      <p class="mb-0"><?php the_field('footer_opening_times', 'option'); ?></p>
      <p class="mb-0"><?php the_field('footer_address', 'option'); ?></p>
    </div>
    <div class="footer-right col-12 col-md-3">
      <h6 class="my-4 mt-md-0  mb-md-5" id="our-socials"><?php the_field('footer_right_header', 'option'); ?></h6>
      <a href="<?php the_field('footer_social_first_link', 'option'); ?>" class="mb-0" target="_blank"><i class="fab <?php the_field('footer_social_first', 'option'); ?>"></i></a>
      <a href="<?php the_field('footer_social_second_link', 'option'); ?>" class="mb-0" target="_blank"><i class="fab <?php the_field('footer_social_second', 'option'); ?>"></i></a>
      <a href="<?php the_field('footer_social_third_link', 'option'); ?>" class="mb-0" target="_blank"><i class="fab <?php the_field('footer_social_third', 'option'); ?>"></i></a>

    </div>
  </div>
</div>