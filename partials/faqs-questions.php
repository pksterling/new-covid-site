<div class="container-full container-faq-questions py-5" style="background-image: url('<?php the_field('faqs_bg_image'); ?>');">
  <div class="container py-5">

  <?php the_field('faqs_title'); ?>

  <?php
  if( have_rows('faqs_questions') ):
	$i = 1; ?>
	
	<div id="accordion" class="pt-5">
 	
 	
    <?php while ( have_rows('faqs_questions') ) : the_row();
		
      $header = get_sub_field('question');
      $content = get_sub_field('answer');

    ?>
		
		<div class="card pl-3">
      <div class="card-header" id="heading-<?php echo $i;?>">
        <div class="card-question mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo $i;?>" aria-expanded="true" aria-controls="collapse-<?php echo $i;?>">
            <?php echo $header; ?>
          </button>
        </div>
      </div>
		
      <div id="collapse-<?php echo $i;?>" class="collapse" aria-labelledby="heading-<?php echo $i;?>" data-parent="#accordion">
        <div class="card-body pl-4">
          <?php echo $content; ?>
        </div>
      </div>
    </div>    
		
		
	<?php $i++;
		
	endwhile; ?>
	
	</div>

  <?php endif; ?>

    
  </div>
</div>