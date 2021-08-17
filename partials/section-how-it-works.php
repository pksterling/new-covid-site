<div id="section-how-it-works" class="container-fluid py-5">
  <div class="container">
    <h2 class="text-center mb-4">
      <?php the_field('hiw_title', 'option'); ?>
    </h2>
    <p class="text-center mb-5">
      <?php the_field('hiw_text', 'option'); ?>
    </p>
    <div class="container d-flex flex-wrap flex-row">
      <?php while( have_rows('hiw_point', 'option') ) : the_row(); ?>
        <div class="d-flex flex-column align-items-center col-4 px-5">
          <div class="hiw-icon-wrapper mb-5">
            <img src="<?php the_sub_field('icon', 'option'); ?>">
          </div>
          <p class="text-center">
            <?php the_sub_field('text'); ?>
          </p>
        </div>
      <?php endwhile;?>
    </div>
  </div>
</div>