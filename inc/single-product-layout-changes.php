<?php
/**
 * Single Product Layout Changes
 *
 * @package UKHT
 * Last Updated: 9 July 2021
 * Last Author: James 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// FIXING SINGLE PRODUCT LAYOUT START

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_price', 40 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_excerpt', 50 );

// Creating flex box around description
add_action( 'woocommerce_before_single_product_summary', 'open_flex_column', 25 );
function open_flex_column() {
	printf('<div class="d-flex flex-column">');
}
add_action( 'woocommerce_before_single_product_summary', 'close_flex_box', 65 );
function close_flex_box() {
	printf('</div>');
}

// adding in scroll down button
// add_action('woocommerce_single_product_summary', 'scroll_to_contact_form_btn', 24); 
add_action( 'woocommerce_before_single_product_summary', 'scroll_to_contact_form_btn', 51 );
function scroll_to_contact_form_btn() {
	printf('
		<div class="scroll-to-form d-flex flex-column align-items-start justify-content-start mb-5">
			<a href="#productForm" class="btn btn-standard btn-outline-primary">Select Test</a>
		</div>
	');
}

// Moving the description tag
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 25 );


// FIXING SINGLE-PRODUCT LAYOUT END