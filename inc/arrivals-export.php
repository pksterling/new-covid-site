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
function kp_arrivals_export_menu_page() {
	add_menu_page( 
		__( 'Arrival Date Report', 'kp_arrivals_export_menu_page' ),
		__( 'Arrival Date Report', 'kp_arrivals_export_menu_page' ), 
		'edit_posts', 
		'export-by-arrivals', 
		'export_by_arrivals_handler', 
		'dashicons-search', 
		6 
	) ;
}


function export_by_arrivals_handler() {
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
		<h1>Export sales counts by arrival date</h1>
		<form method="POST" action="?page=export-by-arrivals">
			<div style="margin-bottom: 10px;">
				<label>Start Date: </label><input type="date" name="start_date" value="<?php echo (isset($_POST['start_date']) ? $_POST['start_date'] : "");?>" required title="Please use format 'yyyy-mm-dd'." pattern="^(19\\d\\d|20\\d\\d)-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\\d|3[0-1])$" /><br />
			</div>
			<div style="margin-bottom: 10px;">
				<label>End Date: </label><input type="date" name="end_date" value="<?php echo (isset($_POST['end_date']) ? $_POST['end_date'] : "");?>" required title="Please use format 'yyyy-mm-dd'." pattern="^(19\\d\\d|20\\d\\d)-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\\d|3[0-1])$" /><br />
			</div>
			<div style="margin-bottom: 10px;">
				<input type="submit" value="Submit" name="btnSubmit" class="button button-primary button-large" />
				<input type="submit" value="Download CSV" name="btnDownload" class="button button-primary button-large" />
			</div>
		</form>
	<?php
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

			$args = array(
				'status' => $statuses,
				'limit' => -1
			);

			$format = 'd-m-Y';

			$data = (object)[];

			$current = $start_date;
			$stepVal = '+1 day';
			while( $current <= $end_date ) {
				$data->{date($format, $current)} = [0, 0, 0];
				$current = strtotime($stepVal, $current);
			}

			$orders = wc_get_orders( $args );

			// Go through each order, if each order has a _order_green_amber_or_red then we will add their items up to that index
			foreach($orders as $order_id) {
				$order = wc_get_order($order_id);
				$new_order_id = $order->get_id();
				
				foreach ($order->get_items() as $item_id => $item) {
					$product_id = $item->get_product_id();
					$product = wc_get_product($product_id);
					$arrival_date = "";
					if ($product->get_attribute('include_in_arrival_report', true) !== "") {
						$arrival_date_meta = $item->get_meta('Arrival Flight to UK Date and Time', true);
						$new_arrival_date_meta = $item->get_meta('arrival_in_uk_date', true);

						if ($arrival_date_meta != "") {
							$temp_date = DateTime::createFromFormat("Y-m-d\TH:i", $arrival_date_meta);
							if ($temp_date !== false) {
								$arrival_date = $temp_date->format('d-m-Y');
							}
							
							$colour = $item->get_meta('Country of Travel (type)', true);
							$count = 0;
							$colour_index = 0;
							$amber_vaccined_count = 0;
							$vaccinated = $item->get_meta('vaccination_status', true);
							if ($colour !== "") {
								if ($colour == "Amber") { $colour_index = 1; }
								if ($colour == "Amber" && $vaccinated == "Yes") { $colour_index = 2; }
								$product_id = $item->get_product_id();
								$product = wc_get_product($product_id);
								$count += $item->get_quantity();
							}
						}
						
						if ($new_arrival_date_meta != "") {
							$temp_date = DateTime::createFromFormat("Y-m-d", $new_arrival_date_meta);
							if ($temp_date !== false) {
								$arrival_date = $temp_date->format('d-m-Y');
							}
							$colour = $item->get_meta('country_type', true);
							$count = 0;
							$colour_index = 0;
							$amber_vaccined_count = 0;
							$vaccinated = $item->get_meta('vaccination_status', true);
							if ($colour !== "") {
								if ($colour == "Amber") { $colour_index = 1; }
								if ($colour == "Amber" && $vaccinated == "Yes") { $colour_index = 2; }
								$product_id = $item->get_product_id();
								$product = wc_get_product($product_id);
								$count += $item->get_quantity();
							}
						}
						

						if (isset($data->{$arrival_date})) {
							$data->{$arrival_date}[$colour_index] += $count;
							$data->{$arrival_date}[2] += $amber_vaccined_count;
						}
					}
				}
			}

			if (isset($_POST['btnDownload'])) {
					ob_clean();
					header('Content-Type: text/csv; charset=utf-8');
					header('Content-Disposition: attachment; filename=arrivals-export.csv');
					$output = fopen('php://output', 'w');
					fputcsv($output, array('Date', 'Green', 'Amber', 'Amber Fully Vaccinated'));
					foreach ($data as $key => $value) {
						fputcsv($output, [$key, $value[0], $value[1], $value[2]]);
					}
					fclose($output);
					ob_flush();
					exit;
			}

	?>
		<table class="kp-table striped">
			<thead>
				<tr>
					<th style="width: 100px">Date</th>
					<th>Green</th>
					<th>Amber</th>
					<th>Amber (Fully Vaccinated)</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($data as $key => $value) {?>
				<tr class="tr">
					<td style="text-align: center;"><?php echo $key;?></td>
					<td style="text-align: right;"><?php echo $value[0];?></td>
					<td style="text-align: right;"><?php echo $value[1];?></td>
					<td style="text-align: right;"><?php echo $value[2];?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		</div>
	<?php
	}
}

add_action( 'admin_menu', 'kp_arrivals_export_menu_page' );