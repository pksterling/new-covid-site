<?php

/**
 * Coupon used send email
 *
 * @package UKHT
 * Last Updated: 29 July 2021
 * Last Author: James 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// Add a custom field to Admin coupon settings pages
add_action( 'woocommerce_coupon_options', 'add_coupon_text_field', 10 );
function add_coupon_text_field() {
    woocommerce_wp_text_input( array(
        'id'                => 'email_recipients',
        'label'             => __( 'Email recipients', 'woocommerce' ),
        'placeholder'       => '',
        'description'       => __( 'Send an email notification to defined recipients, split by ","' ),
        'desc_tip'    => true, // Or false

    ) );
}

// Save the custom field value from Admin coupon settings pages
add_action( 'woocommerce_coupon_options_save', 'save_coupon_text_field', 10, 2 );
function save_coupon_text_field( $post_id, $coupon ) {
    if( isset( $_POST['email_recipients'] ) ) {
        $coupon->update_meta_data( 'email_recipients', sanitize_text_field( $_POST['email_recipients'] ) );
        $coupon->save();
    }
}

// For all Woocommerce versions (since 3.0)
add_action( 'woocommerce_checkout_update_order_meta', 'custom_email_for_orders_with_applied_coupon' );
function custom_email_for_orders_with_applied_coupon( $order_id ){
    $order = wc_get_order( $order_id );

    $used_coupons = $order->get_coupon_codes();
		$order_number = $order->get_id();

    if( ! empty($used_coupons) ){
        foreach ( $used_coupons as $coupon_code ) {
            $coupon    = new WC_Coupon( $coupon_code ); // WC_Coupon Object
						$recipients = explode(',', $coupon->get_meta('email_recipients'));
            if( ! empty($recipients) ) {
							$subject = sprintf( __('Coupon "%s" has been applied'), $coupon_code );
							$content = sprintf( __('The coupon code "%s" has been applied by a customer'), $coupon_code ) . ". On order #". $order_number;
							foreach($recipients as $recipient) {
								wp_mail( $recipient, $subject, $content ); // Send email
							}
            }
        }
    }
}
