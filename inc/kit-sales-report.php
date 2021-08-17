<?php
/**
 * Check out form
 *
 * @package UKHT
 * Last Updated: 9 July 2021
 * Last Author: David 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Register a custom menu page.
 * Used for exporting reports
 */
function kit_sales_report_menu_page() {
	add_menu_page( 
		__( 'Kit Sales Count', 'kit_sales_report_menu_page' ),
		__( 'Kit Sales Count', 'kit_sales_report_menu_page' ), 
		'edit_posts', 
		'kit-sales-count', 
		'kit_sales_handler', 
		'dashicons-search', 
		6 
	) ;
}


function kit_sales_handler() {
	global $wpdb;
	?>
    <style>
    .kp-table {
        border-collapse: collapse;
        border: 1px solid #888;
    }

    .kp-table th {
        padding: 5px;
        border: 1px solid #ccc;
        border-collapse: collapse;
    }

    .kp-table td {
        border: 1px solid #ccc;
        padding: 5px 10px;
    }
    </style>
	<div class="wrap">
        <h1>Kit Sales Count</h1>
        <form method="POST" action="?page=kit-sales-count">
            <div style="margin-bottom: 10px;">
                <label>Start Date: </label><input type="date" name="start_date" value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : "");?>" required title="Please use format 'yyyy-mm-dd'." pattern="^(19\\d\\d|20\\d\\d)-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\\d|3[0-1])$" /><br />
            </div>
            <div style="margin-bottom: 10px;">
                <label>End Date: </label><input type="date" name="end_date" value="<?php echo (isset($_POST['end_date']) ? $_POST['end_date'] : "");?>" required title="Please use format 'yyyy-mm-dd'." pattern="^(19\\d\\d|20\\d\\d)-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\\d|3[0-1])$" /><br />
            </div>
            <div style="margin-bottom: 10px;">
                <input type="submit" value="Submit" name="btnSubmit" class="button button-primary button-large" />
            </div>
        </form>
	<?php

		$total_kits = 0;
		$total_orders = 0;
		if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
			$start_date = strtotime($_POST['start_date']);
			$start_date = strtotime("today", $start_date);
			$end_date = strtotime($_POST['end_date']);
			$end_date = strtotime("tomorrow", $end_date) - 1;

			$statuses = array( 
			'wc-order-confirmed',
			'wc-order-dispatched',
			'wc-test-received',
			'wc-test-received-pre',
			'wc-test-received-d2',
			'wc-test-received-d8',
			'wc-test-received-d5',
			'wc-lab-received',
			'wc-lab-received-pre',
			'wc-lab-received-d2',
			'wc-lab-received-d8',
			'wc-lab-received-d5',
			'wc-order-complete',
			// 'wc-failed',
			// 'wc-refunded',
			// 'wc-cancelled',
			'wc-completed',
			'wc-on-hold',
			'wc-processing',
			'wc-pending'
			);

			$data = (object)[];

			$current = $start_date;
			$stepVal = '+1 day';
			while( $current <= $end_date ) {
				$data->{date($format, $current)} = [0, 0, 0];
				$current = strtotime($stepVal, $current);
			}

			$args = array(
				'status' => $statuses,
				'limit' => -1
			);
			$date_format = 'd-m-Y';
			$orders = wc_get_orders( $args );

			foreach($orders as $order_id) {
				$order = wc_get_order($order_id);
				$new_order_id = $order->get_id();
				$order_date = $order->get_date_created()->format($date_format);
				if ((strtotime($order->get_date_created()) > $start_date) && strtotime($order->get_date_created()) < $end_date ) {
					foreach ($order->get_items() as $item_id => $item) {
						$product_id = $item->get_product_id();
						$product = wc_get_product($product_id);
						if ($product->get_attribute('kit_count') != '') {
							$count = intval($product->get_attribute( 'kit_count' ));
							$data->{$order_date}[0] += $count * $item->get_quantity();
							$total_kits += $count * $item->get_quantity();
						}
					}
					$data->{$order_date}[1] += 1;
					$total_orders += 1;
				}
			}
		}

	?>
			
		<table class="kp-table striped">
			<thead>
				<tr>
					<th style="width: 100px">Date</th>
					<th>Count</th>
					<th>Order Count</th>
				</tr>
			</thead>
			<tbody>
			
			<?php foreach ($data as $key => $value) {?>
				<?php if ($key) { ?>
				<tr class="tr">
					<td style="text-align: center;"><?php echo $key;?></td>
					<td style="text-align: right;"><?php echo $value[0];?></td>
					<td style="text-align: right;"><?php echo $value[1];?></td>
				</tr>
				<?php } ?>
			<?php } ?>
				<tr class="tr">
					<td style="text-align: center;"><b>Total</b></td>
					<td style="text-align: right;"><?php echo $total_kits;?></td>
					<td style="text-align: right;"><?php echo $total_orders;?></td>
				</tr>
			</tbody>
		</table>
		</div>
	<?php
	}


add_action( 'admin_menu', 'kit_sales_report_menu_page' );
