<div class="home-how-it-works py-5">
  <div class="container d-flex flex-column align-items-center justify-content center py-0 py-md-5">
    <!-- title -->
    <?php the_field('hiw_title', 'option'); ?>

    <!-- switcher DESKTOP / TAB -->
    <div class="hiw-switcher d-none d-md-flex flex-row justify-content-start align-items-start col-12 pt-5">

      <!-- LEFT -->
      <div class="hiw-switcher-left d-flex flex-column justify-content-center align-items-center col-6 pl-0 pr-5">
        <!-- button 1 -->
        <div id="hiw-switcher-button-1" class="hiw-switcher-button hiw-active d-flex flex-row justify-content-start align-items-center mb-4">
          <img class="hiw-switcher-button-icon" src="<?php the_field('hiw_button_icon_1', 'option'); ?>" alt="icon 1">
          <div class="hiw-switcher-button-title pl-4">
            <?php the_field('hiw_button_title_1', 'option'); ?>
          </div>
        </div>
        <!-- button 2 -->
        <div id="hiw-switcher-button-2" class="hiw-switcher-button d-flex flex-row justify-content-start align-items-center mb-4">
          <img class="hiw-switcher-button-icon" src="<?php the_field('hiw_button_icon_2', 'option'); ?>" alt="icon 1">
          <div class="hiw-switcher-button-title pl-4">
            <?php the_field('hiw_button_title_2', 'option'); ?>
          </div>
        </div>
        <!-- button 3 -->
        <div id="hiw-switcher-button-3" class="hiw-switcher-button d-flex flex-row justify-content-start align-items-center mb-4">
          <img class="hiw-switcher-button-icon" src="<?php the_field('hiw_button_icon_3', 'option'); ?>" alt="icon 1">
          <div class="hiw-switcher-button-title pl-4">
            <?php the_field('hiw_button_title_3', 'option'); ?>
          </div>
        </div>
      </div>

      <!-- RIGHT -->
      <div class="hiw-switcher-right d-flex justify-content-center align-items-center">
        <!-- Bullet points 1 -->
        <div id="hiw-switcher-bullets-1" class="hiw-switcher-bullets d-flex flex-column justify-content-center align-items-start">
          <?php if( have_rows('hiw_bullet_points_1', 'option') ):
            while( have_rows('hiw_bullet_points_1', 'option') ) : the_row(); ?>
              <div class="hiw-bullet-point d-flex flex-row justify-content-start align-items-center py-4">
                <i class="fas fa-plus pr-4"></i>
                <div class="hiw-bullet-point-text">
                  <?php the_sub_field('text'); ?>
                </div>
              </div>
            <?php endwhile;
          endif; ?>
        </div>
        <!-- Bullet points 2 -->
        <div id="hiw-switcher-bullets-2" class="hiw-switcher-bullets d-none flex-column justify-content-center align-items-start">
          <?php if( have_rows('hiw_bullet_points_2', 'option') ):
            while( have_rows('hiw_bullet_points_2', 'option') ) : the_row(); ?>
              <div class="hiw-bullet-point d-flex flex-row justify-content-start align-items-center py-4">
                <i class="fas fa-plus pr-4"></i>
                <div class="hiw-bullet-point-text">
                  <?php the_sub_field('text'); ?>
                </div>
              </div>
            <?php endwhile;
          endif; ?>
        </div>
        <!-- Bullet points 3 -->
        <div id="hiw-switcher-bullets-3" class="hiw-switcher-bullets d-none flex-column justify-content-center align-items-start">
          <?php if( have_rows('hiw_bullet_points_3', 'option') ):
            while( have_rows('hiw_bullet_points_3', 'option') ) : the_row(); ?>
              <div class="hiw-bullet-point d-flex flex-row justify-content-start align-items-center py-4">
                <i class="fas fa-plus pr-4"></i>
                <div class="hiw-bullet-point-text">
                  <?php the_sub_field('text'); ?>
                </div>
              </div>
            <?php endwhile;
          endif; ?>
        </div>
      </div>

    </div><!-- switcher -->

    <!-- MOBILE -->

    <!-- button 1 -->
    <div class="d-block d-md-none">
    <div class="hiw-switcher-button d-flex flex-row justify-content-start align-items-center my-4">
      <img class="hiw-switcher-button-icon" src="<?php the_field('hiw_button_icon_1', 'option'); ?>" alt="icon 1">
      <div class="hiw-switcher-button-title pl-4">
        <?php the_field('hiw_button_title_1', 'option'); ?>
      </div>
    </div>
    <div class="hiw-switcher-bullets d-flex flex-column justify-content-center align-items-start">
      <?php if( have_rows('hiw_bullet_points_1', 'option') ):
        while( have_rows('hiw_bullet_points_1', 'option') ) : the_row(); ?>
          <div class="hiw-bullet-point d-flex flex-row justify-content-start align-items-center py-4">
            <i class="fas fa-plus pr-4"></i>
            <div class="hiw-bullet-point-text">
              <?php the_sub_field('text'); ?>
            </div>
          </div>
        <?php endwhile;
      endif; ?>
    </div>

    <!-- button 2 -->
    <div class="hiw-switcher-button d-flex flex-row justify-content-start align-items-center my-4">
      <img class="hiw-switcher-button-icon" src="<?php the_field('hiw_button_icon_2', 'option'); ?>" alt="icon 1">
      <div class="hiw-switcher-button-title pl-4">
        <?php the_field('hiw_button_title_2', 'option'); ?>
      </div>
    </div>
    <div class="hiw-switcher-bullets d-flex flex-column justify-content-center align-items-start">
      <?php if( have_rows('hiw_bullet_points_2', 'option') ):
        while( have_rows('hiw_bullet_points_2', 'option') ) : the_row(); ?>
          <div class="hiw-bullet-point d-flex flex-row justify-content-start align-items-center py-4">
            <i class="fas fa-plus pr-4"></i>
            <div class="hiw-bullet-point-text">
              <?php the_sub_field('text'); ?>
            </div>
          </div>
        <?php endwhile;
      endif; ?>
    </div>

    <!-- button 2 -->
    <div class="hiw-switcher-button d-flex flex-row justify-content-start align-items-center my-4">
      <img class="hiw-switcher-button-icon" src="<?php the_field('hiw_button_icon_3', 'option'); ?>" alt="icon 1">
      <div class="hiw-switcher-button-title pl-4">
        <?php the_field('hiw_button_title_3', 'option'); ?>
      </div>
    </div>
    <div class="hiw-switcher-bullets d-flex flex-column justify-content-center align-items-start">
      <?php if( have_rows('hiw_bullet_points_3', 'option') ):
        while( have_rows('hiw_bullet_points_3', 'option') ) : the_row(); ?>
          <div class="hiw-bullet-point d-flex flex-row justify-content-start align-items-center py-4">
            <i class="fas fa-plus pr-4"></i>
            <div class="hiw-bullet-point-text">
              <?php the_sub_field('text'); ?>
            </div>
          </div>
        <?php endwhile;
      endif; ?>
    </div>
    </div>

  </div>
</div>