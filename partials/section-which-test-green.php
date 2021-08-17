<!-- desktop -->
<div id="which-tests" class="d-none d-md-flex which-tests-green-container py-5">
  <div class="container py-5">
    <h1><?php the_field('wtg_title', 'option'); ?></h1>
    <h2><?php the_field('wtg_subtitle', 'option'); ?></h2>
    <!-- table -->
    <div class="which-tests-table">

    <div class="table-responsive py-5"> 
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_1', 'option'); ?></th>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_2', 'option'); ?></th>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_3', 'option'); ?></th>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_4', 'option'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_1_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_1_col_2', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if (get_field('wtg_row_1_col_3', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if (get_field('wtg_row_1_col_4', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_2_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_2_col_2', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if (get_field('wtg_row_2_col_3', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if (get_field('wtg_row_2_col_4', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_3_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_3_col_2', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if (get_field('wtg_row_3_col_3', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
            <td class="text-center">
              <?php if (get_field('wtg_row_3_col_4', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr class="table-bottom-row">
            <th class="text-center" scope="row"></th>
            <td class="text-center align-middle">
              <a class="which-tests-button which-tests-button-green" href="<?php the_field('wtg_table_header_col_2_package_link', 'option'); ?>"><?php the_field('wtg_table_header_col_2_package_button_text', 'option'); ?></a>
            </td>
            <td class="text-center align-middle">
              <a class="which-tests-button which-tests-button-green" href="<?php the_field('wtg_table_header_col_3_package_link', 'option'); ?>"><?php the_field('wtg_table_header_col_3_package_button_text', 'option'); ?></a>
            </td>
            <td class="text-center align-middle">
              <a class="which-tests-button which-tests-button-green" href="<?php the_field('wtg_table_header_col_4_package_link', 'option'); ?>"><?php the_field('wtg_table_header_col_4_package_button_text', 'option'); ?></a>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

    </div>
  </div>
</div>

<!-- mobile -->
<div class="d-flex d-md-none which-tests-green-container py-5">
  <div class="container">
    <h1 id="which-tests-mob"><?php the_field('wtg_title', 'option'); ?></h1>
    <h2><?php the_field('wtg_subtitle', 'option'); ?></h2>
    <!-- table -->
    <div class="which-tests-table">

    <div class="table-responsive pt-5"> 
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_1', 'option'); ?></th>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_2', 'option'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_1_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_1_col_2', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_2_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_2_col_2', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_3_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_3_col_2', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr class="table-bottom-row">
            <th class="text-center" scope="row"></th>
            <td class="text-center align-middle">
              <a class="which-tests-button which-tests-button-green" href="<?php the_field('wtg_table_header_col_2_package_link', 'option'); ?>"><?php the_field('wtg_table_header_col_2_package_button_text', 'option'); ?></a>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

      <div class="table-responsive pt-5"> 
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_1', 'option'); ?></th>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_3', 'option'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_1_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_1_col_3', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_2_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_2_col_3', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_3_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_3_col_3', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr class="table-bottom-row">
            <th class="text-center" scope="row"></th>
            <td class="text-center align-middle">
              <a class="which-tests-button which-tests-button-green" href="<?php the_field('wtg_table_header_col_3_package_link', 'option'); ?>"><?php the_field('wtg_table_header_col_3_package_button_text', 'option'); ?></a>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

      <div class="table-responsive pt-5"> 
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_1', 'option'); ?></th>
            <th class="text-center" scope="col"><?php the_field('wtg_table_header_col_4', 'option'); ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_1_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_1_col_4', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_2_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_2_col_4', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr>
            <th class="text-center" scope="row"><?php the_field('wtg_row_3_col_1', 'option'); ?></th>
            <td class="text-center">
              <?php if (get_field('wtg_row_3_col_4', 'option') == 'yes') { ?>
                <i class="fas fa-check"></i>
              <?php } else { ?>
                no
              <?php } ?>
            </td>
          </tr>
          <tr class="table-bottom-row">
            <th class="text-center" scope="row"></th>
            <td class="text-center align-middle">
              <a class="which-tests-button which-tests-button-green" href="<?php the_field('wtg_table_header_col_4_package_link', 'option'); ?>"><?php the_field('wtg_table_header_col_4_package_button_text', 'option'); ?></a>
            </td>
          </tr>
        </tbody>
      </table>
      </div>

    </div>
  </div>
</div>