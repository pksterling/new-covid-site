<?php

/**
 * Order Meta Data
 *
 * @package UKHT
 * Last Updated: 9 July 2021
 * Last Author: James 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


 // Adding PRINT box to Meta container admin shop_order pages
add_action( 'add_meta_boxes', 'mv_add_meta_boxes' );
if ( ! function_exists( 'mv_add_meta_boxes' ) )
{
    function mv_add_meta_boxes()
    {
        add_meta_box( 'mv_other_fields', __('Download PDF forms','woocommerce'), 'mv_add_other_fields_for_packaging', 'shop_order', 'side', 'core' );
    }
}

// Adding link ref in the meta container admin shop_order pages
if ( ! function_exists( 'mv_add_other_fields_for_packaging' ) )
{
	
	function mv_add_other_fields_for_packaging()
	{

	global $post;
	$order = new WC_Order($post->ID);
	$order_id = $order->get_id();
	echo "<a href='" . get_site_url() . "/lab-return-sheet/?" . $order_id . "' target=\"_blank\">Print PDFs</a>";
		
	}
}