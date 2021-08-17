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

// CHECKOUT FORM START

add_filter('woocommerce_default_address_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($address_fields) {
	$address_fields['address_2']['priority'] = 45;
	unset($address_fields['county']['shipping_country']);
	return $address_fields;
}

add_filter( 'default_checkout_country', 'change_default_checkout_country' );
add_filter( 'default_checkout_shipping_country', 'change_default_checkout_country' );

function change_default_checkout_country() {
	return 'GB'; // country code
}

add_filter( 'default_checkout_shipping_state', 'change_default_checkout_state' );
function change_default_checkout_state() {
    return ''; //set state code if you want to set it otherwise leave it blank.
}



// CHECKOUT FORM END