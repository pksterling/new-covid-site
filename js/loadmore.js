jQuery(function($) {
	// use jQuery code inside this to avoid "$ is not defined" error
	$(".js-load-more").click(function() {
		var button = $(this),
			data = {
				action: "loadmore",
				query: posts_KP, // that's how we get params from wp_localize_script() function
        page: current_page_KP
			};
		$.ajax({
			// you can also use $.post here
			url: kp_loadmore_params.ajaxurl, // AJAX handler
			data: data,
			type: "POST",
			beforeSend: function(xhr) {
				button.text("Loading..."); // change the button text, you can also add a preloader image
			},
			success: function(data) {
				if (data) {
					button
						.html('<h2 class="col-xs-12"><a href="#" class="js-load-more"><span><svg style="position: relative; top: -5px;"class="mr-3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" viewBox="0 0 100 100" width="50" height="50"><defs><path d="M68.88 16.95C67.06 15.14 64.12 15.14 62.3 16.95C60.49 18.77 60.49 21.71 62.3 23.53C63.76 24.98 71.03 32.26 84.12 45.35C36.44 45.35 9.95 45.35 4.65 45.35C2.08 45.35 0 47.43 0 50C0 52.57 2.08 54.65 4.65 54.65C9.95 54.65 36.44 54.65 84.12 54.65C71.03 67.74 63.76 75.02 62.3 76.47C60.49 78.29 60.49 81.23 62.3 83.05C63.21 83.95 64.4 84.41 65.59 84.41C66.78 84.41 67.97 83.95 68.88 83.05C71.86 80.07 95.66 56.26 98.64 53.29C100.45 51.47 100.45 48.53 98.64 46.71C92.69 40.76 71.86 19.93 68.88 16.95Z" id="bY6fBgwgv"></path></defs><g><g><g><use xlink:href="#bY6fBgwgv" opacity="1" fill="#d30074" fill-opacity="1"></use><g><use xlink:href="#bY6fBgwgv" opacity="1" fill-opacity="0" stroke="#d30074" stroke-width="1" stroke-opacity="0"></use></g></g></g></g></svg></span>Load More</h2></a>');
						var items = $(data);
						$('.js-articles-container').append(items).masonry( 'appended', items); // insert new posts
					current_page_KP++;
          // console.log('data', data)
					if (current_page_KP == max_page_KP)
          button.remove(); // if last page, remove the button
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});
