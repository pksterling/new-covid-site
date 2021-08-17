<div class="container-full tests-got-a-question-container d-flex flex-column flex-md-row justify-content-center align-items-center">
  <!-- left -->
  <div class="gaq-content col-12 col-md-6 px-4 py-5">
    <?php the_field('gaq_title'); ?>
    <div class="py-4">
      <?php the_field('gaq_content'); ?>
    </div>
    <div class="gaq-button d-flex justify-content-center align-items-center">
      <a class="px-4 py-2" href="<?php the_field('gaq_button_link'); ?>"><?php the_field('gaq_button_text'); ?></a>
    </div>
  </div>
  <!-- right -->
  <div class="gaq-image col-12 col-md-6 px-0" style="background-image: url('<?php the_field('gaq_image'); ?>');"></div>
</div>