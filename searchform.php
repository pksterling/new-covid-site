<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<h3>Search results for:</h3>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
	<div class="input-group">
		<input class="w-75 form-control" id="s" name="s" type="text"
		placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>" value="<?php the_search_query(); ?>">
	</div>
	<h4><?php global $wp_query; echo $wp_query->found_posts.' results found'; ?></h4>
	<h5 class="mb-3">Filter by:</h5>
	<div class="input-group">
		<input type="hidden" name="category_name" class="js-category-hidden" value="<?php 
		$searched_categories = urldecode($_GET['category_name']);
		echo $searched_categories;?>">
		<?php $categories = get_categories();
			$category_index = 0;
			foreach($categories as $category) { ?>
			<div class="custom-checkbox">
				<label for="category_name_temp<?php echo $category_index;?>"><?php echo $category->name; ?>
					<input class="js-category-checkboxes mr-3" type="checkbox" name="category_name_temp<?php echo $category_index;?>" id="category_name_temp<?php echo $category_index;?>" value="<?php echo $category->slug; ?>"
					<?php if(strpos($searched_categories, $category->slug) !== FALSE) {
						echo 'checked="checked"';
					} ?>>
					<span class="checkmark"></span>
				</label>
			</div>
		<?php 
		$category_index++;
		}?>
		
	</div>
</form>