<div id="home-hero" class="container-fluid d-flex py-5 bg-light">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-6 d-flex flex-column pr-0">
        <?php the_field('home_title'); ?>
        <?php the_field('home_subtitle'); ?>
      </div>
      <div class="col-6 pl-0">
        <img class="home_hero-image" src="<?php the_field('home_hero_image') ?>">
      </div>
    </div>
  </div>
</div>