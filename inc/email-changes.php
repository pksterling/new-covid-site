<?php
/**
 * Check out form
 *
 * @package UKHT
 * Last Updated: 9 July 2021
 * Last Author: James 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Customising appointment reminder email
add_action( 'woocommerce_email_before_order_table', 'bbloomer_add_content_specific_email', 20, 4 );
function bbloomer_add_content_specific_email( $order, $sent_to_admin, $plain_text, $email ) {
   // 2. Initialize $onsite_in_order variable
  $onsite_in_order = false;
	$delivery_in_order = false;
	$collection_in_order = false;
   // 3. Get order items and loop through them...
   // ... if product in category, edit $onsite_in_order
  $items = $order->get_items();   
  foreach ( $items as $item ) {      
		$product_id = $item->get_product_id();  
		if ( has_term( 'On Site', 'product_cat', $product_id) ) {
			$onsite_in_order = true;
		}else {
			$delivery_in_order = true;
		}
		if ( has_term( 'Collection', 'product_cat', $product_id)) {
			$collection_in_order = true;
		}
  }
	$on_site_rules_string = "<br /><p>Upon arrival please call 01604 800609 and state your car registration and reference number, and we will bring the tests out to you. </p><br /><p>Please bring your own pen to fill out the required forms. No pens will be provided.</p><br /><p>Please do NOT leave your vehicle at any point in time during your appointment.</p>";
   // 4. Echo image only if $onsite_in_order == true   
	if ($onsite_in_order && $delivery_in_order && $email->id == 'customer_completed_order') {
		echo "<p>Thank you for your delivery order and we hope to see you soon for the on-site tests. <br />You will receive an email about your dispatch shortly. </p>";
		echo $on_site_rules_string;
	} elseif ( $onsite_in_order && $email->id == 'customer_completed_order' ) {
		echo "<p>We hope to see you soon for your onsite tests.</p>"; 
		echo $on_site_rules_string;
  } elseif ($email->id == 'customer_completed_order') {
		"<p>Thank you for your order. You will receive an email about your dispatch shortly.</p>";
	};

	if ($collection_in_order && $email->id == 'customer_processing_order') {
		echo '<p>Upon arrival please call 01604 800609 and state your car registration and reference number, and we will bring the tests out to you. </p>';
	}
}

// Reminder in ALL email and cart START
$item_number = 0;
// add booking reference to email start
add_action( 'woocommerce_order_item_meta_start', 'adding_reminder_to_email', 12, 3 );
function adding_reminder_to_email( $item_id, $item, $order ) { 
	$output_text = '<br /><br /><span style="color: red; font-size: 0.9rem;">*PLEASE MAKE A NOTE OF THIS*</span>';
	echo ($output_text);
}