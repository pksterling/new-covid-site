
<div class="container-full onsite-test-container d-flex flex-column flex-md-row justify-content-center align-items-center">
  <!-- left -->
	<div class="wiot-content col-12 col-md-6 px-5">
		<?php the_field('wiot_title', 'option'); ?>
    <div class="py-4">
			<?php the_field('wiot_text', 'option'); ?>
    </div>
  </div>
	<!-- right -->
	<div class="wiot-image col-12 col-md-6 px-4 py-5" style="background-image: url('<?php the_field('wiot_image', 'option'); ?>');"></div>
</div>
