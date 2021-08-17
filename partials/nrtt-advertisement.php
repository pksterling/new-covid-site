<div class="position-relative nrtt-hero d-flex justify-content-center align-items-center py-5" style="background-image: url('<?php the_field('nrtt_bg_image'); ?>');">
	<div class="position-absolute nrtt-overlay"></div>
	<div class="container nrtt-container d-flex flex-column justify-content-center align-items-center py-0 py-md-5">
		<div class="nrtt-logo pb-4">
			<img src="<?php the_field('nrtt_logo') ?>" alt="nrtt">
		</div>	
		<div class="nrtt-intro px-4">
			<?php the_field('nrtt_title'); ?>
		</div>
		<a class="nrtt-btn d-none d-md-block mt-5 mb-4 mb-md-0 px-5 py-3 text-center" href="<?php the_field('nrtt_link'); ?>"><?php the_field('nrtt_btn_text'); ?></a>
	</div>
</div>