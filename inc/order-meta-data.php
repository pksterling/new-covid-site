<?php

/**
 * Order Meta Data
 *
 * @package UKHT
 * Last Updated: 29 July 2021
 * Last Author: James 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// array of items on single item page
// Could potentially use custom field along with repeater for this
$custom_fields = array(
	// array(
	// 	'label' => 'Example Array',
	// 	'key' => 'example-array',
	// 	'type' => 'text',
	//	'min' => 1,
	// 	'minDate' => '2021-05-31T00:00',
	// 	'maxDate' => '2100-12-31T00:00',
	// 	'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
	// 	'required' => true,
	// 	'select' => true,
  //	'options' => array('Green', 'Amber'),
	// 	'dontShowOn' => array(),
	// 	'onlyShowOn' => array(),
	// 	),
);

$pa_custom_fields = array (
	array(
		'label' => 'First Name',
		'json' => 'first_name',
		'key' => 'first-name',
		'neat' => 'First Name',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Surname',
		'json' => 'surname',
		'key' => 'surname',
		'neat' => 'Surname',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Date of Birth',
		'json' => 'birth_date',
		'key' => 'birth-date',
		'neat' => 'Date of Birth',
		'type' => 'date',
		'maxDate' => '2100-12-31',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Sex',
		'json' => 'sex',
		'selectplaceholder' => 'Select sex',
		'key' => 'sex',
		'neat' => 'Sex',
		'select' => true,
		'options' => array('Female', 'Male'),
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Passport Number',
		'json' =>'passport_number',
		'key' => 'passport-number',
		'neat' => 'Passport Number',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),

	array(
		'label' => 'Ethnicity',
		'json' => 'ethnicity',
		'key' => 'ethnicity',
		'neat' => 'Ethnicity',
		'select' => true,
		'options' => array(),
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Are you fully vaccinated?',
		'json' => 'vaccination_status', 
		'key' => 'vaccination-status',
		'neat' => 'Vaccination Status',
		'select' => true,
		'selectplaceholder' => 'Select option',
		'options' => array('Yes', 'No'),
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Type of Vaccine',
		'json' => 'vaccine_type',
		'key' => 'vaccine-type',
		'neat' => 'Vaccine Type',
		'select' => true,
		'selectplaceholder' => 'Select option',
		'options' => array('Pfizer', 'Moderna', 'Oxford/AstraZeneca', 'Other', 'Not Vaccinated'),
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array (
		'label' => 'Final Vaccination Date (if applicable)',
		'json' => 'vaccinated_date',
		'key' => 'vaccinated-date',
		'neat' => 'Vaccinated Date',
		'type' => 'date',
		'minDate' => '2020-01-31',
		'maxDate' => '2050-12-31',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
	),
	array(
		'label' => 'NHS Number (if known)',
		'json' =>'nhs_number',
		'key' => 'nhs-number',
		'neat' => 'NHS Number',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
	),
);

$sia_custom_fields = array (
	array(
		'label' => 'Address Line 1',
		'json' =>'address_line_1',
		'key' => 'address-line-1',
		'neat' => 'Address Line 1',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Address Line 2',
		'json' =>'address_line_2',
		'key' => 'address-line-2',
		'neat' => 'Address Line 2',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
	),
	array(
		'label' => 'Town or City',
		'json' =>'town_or_city',
		'key' => 'town-or-city',
		'neat' => 'Town or City',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'County',
		'json' =>'county',
		'key' => 'county',
		'neat' => 'County',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
	),
	array(
		'label' => 'Postcode',
		'json' =>'postcode',
		'key' => 'postcode',
		'neat' => 'Postcode',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
);

$td_custom_fields = array (
	array(
		'label' => 'Departure Date and Time from UK',
		'json' =>'departure_from_uk_date_time',
		'key' => 'departure-from-uk-date-time',
		'neat' => 'Departure Date and Time from UK',
		'type' => 'datetime-local',
		'minDate' => '2021-05-31T00:00',
		'maxDate' => '2100-12-31T00:00',
		'required' => true,
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'onlyShowOn' => array(663, 305, 100, 388, 102, 195, 3554),
	),
	array(
		'label' => 'Date of Departure from Non-UK Country',
		'json' =>'departure_from_abroad_date',
		'key' => 'departure-from-abroad-date',
		'neat' => 'Date of Departure from Non-UK Country',
		'type' => 'date',
		'minDate' => '2021-05-31',
		'maxDate' => '2100-12-31',
		'required' => true,
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'dontShowOn' => array(633, 388, 305, 3554),
	),
	array(
		'label' => 'Date of Arrival in UK',
		'json' =>'arrival_in_uk_date',
		'key' => 'arrival-in-uk-date',
		'neat' => 'Date of Arrival in UK',
		'type' => 'date',
		'minDate' => '2021-05-31',
		'maxDate' => '2100-12-31',
		'required' => true,
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'dontShowOn' => array(633, 388, 305, 3554),
	),
	array(
		'label' => 'Flight/Coach/Vessel/Train number',
		'json' =>'flight_number',
		'key' => 'flight-number',
		'neat' => 'Flight Number',
		'type' => 'text',
		'required' => true,
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
	),
	array(
		'label' => 'Country Tier (Highest of all countries entered within last 10 days)',
		'selectplaceholder' => 'Select tier',
		'json' => 'country_type',
		'key' => 'country-type',
		'neat' => 'Country Tier',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'select' => true,
		'options' => array('Green', 'Amber'),
		'dontShowOn' => array(633, 388, 305, 3554),
	),
	array(
		'label' => 'Country or Territory travelling from',
		'selectplaceholder' => 'Select country/territory',
		'json' => 'country_from',
		'key' => 'country-from',
		'neat' => 'Country From',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'select' => true,
		'options' => $travel_countries_array,
		'dontShowOn' => array(633, 388, 305, 3554),
	),
	array(
		'label' => 'List all countries entered prior going to the UK (In last 10 days)',
		'json' =>'countries_travelled',
		'key' => 'countries-travelled',
		'type' => 'text',
		'neat' => 'Countries travelled to',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'dontShowOn' => array(633, 388, 305, 3554),
	),
);

$cd_custom_fields = array (
	array(
		'label' => 'Mobile Phone Number',
		'json' =>'phone_number',
		'key' => 'phone-number',
		'neat' => 'Mobile Phone Number',
		'type' => 'tel',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Email Address',
		'json' =>'email_address',
		'key' => 'email-address',
		'neat' => 'Email Address',
		'type' => 'email',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
	),
	array(
		'label' => 'Please select the day you would like to collect the test(s).',
		'json' =>'pickup_date',
		'key' => 'pickup-date',
		'neat' => 'PickUp Date',
		'type' => 'date',
		'minDate' => '2021-05-31',
		'maxDate' => '2100-12-31',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'onlyShowOn' => array(3554, 3556, 3560)
	),
	array(
		'label' => 'Car Registration Number',
		'json' => 'car_reg_number',
		'key' => 'car-reg-number',
		'neat' => 'Car Registration Number',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'onlyShowOn' => array(645, 637, 635, 633, 639, 3554, 3556, 3560),
	),
	array(
		'label' => 'Original Booking Reference Number',
		'json' => 'org_booking_reference_no',
		'key' => 'org-booking-reference-no',
		'neat' => 'Original Booking Reference Number',
		'type' => 'text',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'onlyShowOn' => array(4306),
	),
	array(
		'label' => "By placing this order I confirm I have read and agreed to UK Health Testing's terms and conditions",
		'json' => '_t_and_c_accept',
		'key' => 't-and-c-accept',
		'neat' => 'T and C Accept',
		'type' => 'checkbox',
		'classList' => 'add-product-form-box d-flex flex-column align-items-start justify-content-start py-2',
		'required' => true,
		'value' => 'Yes',
	)
);


// showing custom fields on single item
add_action( 'woocommerce_before_add_to_cart_button', 'output_add_to_cart_custom_fields', 10 );
function output_add_to_cart_custom_fields() {
	global $product, $pa_custom_fields, $sia_custom_fields, $td_custom_fields, $cd_custom_fields;
	$the_product_id = $product->get_id();
	echo '<div class="product-form mb-3" id="productForm">';
	echo '<h2>Customer details</h2>';
	echo '<p>Fill our the form below to add your item to the basket</p>';
	if (!has_term( 'Redeliver', 'product_cat' )) {
		echo '<p>If you wish to buy multiple of the same test please submit one form per person and add the item to the basket seperately.';
		echo '<br />This is to ensure all tests will have the required information.</p>';
		echo '<h4>Personal Details</h4>';
		foreach ($pa_custom_fields as $cf):
			$cf = (object)$cf;
			?>
			<div class="<?php echo $cf->classList ?>">
				<label for="<?php echo $cf->key ?>"><?php _e( $cf->label, 'atn' ); ?><?php if($cf->required) echo '<span style="color: red; font-weight: bold;">*</span>'; ?></label>
				<?php if(!$cf->select): ?>
				<input type="<?php echo $cf->type ?>" style="min-height: 40px" id="<?php echo $cf->key ?>" name="<?php echo $cf->key ?>" placeholder="<?php //_e( $cf->label, 'atn' ); ?>" <?php if($cf->required) echo 'required="' . $cf->required . '"'; ?> <?php if($cf->min) echo 'min="' . $cf->min . '"'; ?> <?php if($cf->maxDate) echo 'max="' . $cf->maxDate . '"'; ?> <?php if($cf->minDate) echo 'min="' . $cf->minDate . '"'; ?>
				<?php if($cf->type == "type") echo "title=\"Please enter a valid date in the format of dd-mm-yyyy.\" pattern=\"^(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])$\""; ?> >
				<?php else: ?>
				<select id="<?php echo $cf->key ?>" class="py-2 px-2"name="<?php echo $cf->key ?>" <?php if($cf->required) echo 'required="' . $cf->required . '"'; ?> style="width: 100%; max-width: 500px;">
					<option value="" selected disabled><?php _e( $cf->selectplaceholder, 'atn' ); ?></option>
					<?php
					if (($cf->label) == 'Ethnicity') {
						?>
						<option value="" selected="selected" disabled="disabled">Select here</option>
							<optgroup label="White">
								<option value="White English">English</option>
								<option value="White Welsh">Welsh</option>
								<option value="White Scottish">Scottish</option>
								<option value="White Northern Irish">Northern Irish</option>
								<option value="White Irish">Irish</option>
								<option value="White Gypsy or Irish Traveller">Gypsy or Irish Traveller</option>
								<option value="White Other">Any other White background</option>
							</optgroup>
							<optgroup label="Mixed or Multiple ethnic groups">
								<option value="Mixed White and Black Caribbean">White and Black Caribbean</option>
								<option value="Mixed White and Black African">White and Black African</option>
								<option value="Mixed White Other">Any other Mixed or Multiple background</option>
							</optgroup>
							<optgroup label="Asian">
								<option value="Asian Indian">Indian</option>
								<option value="Asian Pakistani">Pakistani</option>
								<option value="Asian Bangladeshi">Bangladeshi</option>
								<option value="Asian Chinese">Chinese</option>
								<option value="Asian Other">Any other Asian background</option>
							</optgroup>
							<optgroup label="Black">
								<option value="Black African">African</option>
								<option value="Black African American">African American</option>
								<option value="Black Caribbean">Caribbean</option>
								<option value="Black Other">Any other Black background</option>
							</optgroup>
							<optgroup label="Other ethnic groups">
								<option value="Arab">Arab</option>
								<option value="Hispanic">Hispanic</option>
								<option value="Latino">Latino</option>
								<option value="Native American">Native American</option>
								<option value="Pacific Islander">Pacific Islander</option>
								<option value="Other">Any other ethnic group</option>
							</optgroup>
						<?php
					};
					?>
					<?php if(!empty($cf->options)): ?>
						<?php foreach($cf->options as $key => $value): ?>
							<option value="<?php echo $value ?>">
								<?php echo $value ?>
							</option>
						<?php endforeach; ?>
					<?php endif ?>
				</select>
				<?php endif ?>
			</div>
			<?php
		endforeach;
		echo '<br />';
		if (!has_term( 'No Address', 'product_cat' )) {
			echo '<h4>Address</h4>';
			echo '<p style="color: red; font-weight: bold;">If you are isolating please fill in the address section in with the address you are isolating with</p>';
			foreach ($sia_custom_fields as $cf):
				$cf = (object)$cf;
				if( ($cf->dontShowOn) && in_array($the_product_id, ($cf->dontShowOn)) ) {
				continue;
				}
				if ( $cf->onlyShowOn && !(in_array($the_product_id, ($cf->onlyShowOn))) ) {
					continue;
				}
				?>
				<div class="<?php echo $cf->classList ?>">
					<label for="<?php echo $cf->key ?>"><?php _e( $cf->label, 'atn' ); ?><?php if($cf->required) echo '<span style="color: red; font-weight: bold;">*</span>'; ?></label>
					<?php if(!$cf->select): ?>
					<input type="<?php echo $cf->type ?>" style="min-height: 40px" id="<?php echo $cf->key ?>" name="<?php echo $cf->key ?>" placeholder="<?php //_e( $cf->label, 'atn' ); ?>" <?php if($cf->required) echo 'required="' . $cf->required . '"'; ?> <?php if($cf->min) echo 'required="' . $cf->min . '"'; ?> <?php if($cf->maxDate) echo 'max="' . $cf->maxDate . '"'; ?> <?php if($cf->minDate) echo 'min="' . $cf->minDate . '"'; ?>>
					<?php else: ?>
					<select id="<?php echo $cf->key ?>" class="py-2 px-2"name="<?php echo $cf->key ?>" <?php if($cf->required) echo "required='" . $cf->required . "'"; ?> style="width: 100%; max-width: 500px;">
						<option value="" selected disabled><?php _e( $cf->selectplaceholder, 'atn' ); ?></option>
						<?php if(!empty($cf->options)): ?>
							<?php foreach($cf->options as $key => $value): ?>
								<option value="<?php echo $value ?>">
									<?php echo $value ?>
								</option>
							<?php endforeach; ?>
						<?php endif ?>
					</select>
					<?php endif ?>
				</div>
				<?php
			endforeach;
			echo '<br />';
		};
		echo '<h4>Travel Details</h4>';
		foreach ($td_custom_fields as $cf):
			$cf = (object)$cf;
			if( ($cf->dontShowOn) && in_array($the_product_id, ($cf->dontShowOn)) ) {
			continue;
			}
			if ( $cf->onlyShowOn && !(in_array($the_product_id, ($cf->onlyShowOn))) ) {
				continue;
			}
			?>
			<div class="<?php echo $cf->classList ?>">
				<label for="<?php echo $cf->key ?>"><?php _e( $cf->label, 'atn' ); ?><?php if($cf->required) echo '<span style="color: red; font-weight: bold;">*</span>'; ?></label>
				<?php if(!$cf->select): ?>
				<input type="<?php echo $cf->type ?>" style="min-height: 40px" id="<?php echo $cf->key ?>" name="<?php echo $cf->key ?>" placeholder="<?php //_e( $cf->label, 'atn' ); ?>" <?php if($cf->required) echo 'required="' . $cf->required . '"'; ?> <?php if($cf->min) echo 'required="' . $cf->min . '"'; ?> <?php if($cf->maxDate) echo 'max="' . $cf->maxDate . '"'; ?> <?php if($cf->minDate) echo 'min="' . $cf->minDate . '"'; ?> 
				<?php if($cf->type == "date") echo "title=\"Please use enter the date in the correct format dd-mm-yyy.\" pattern=\"^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$\""; ?> 
				<?php if($cf->type == "datetime-local") echo "title=\"Please enter a valid date in the format of 'dd-mm-yyyy hh:mm.\"  pattern=\"^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$\s([0-1]?[0-9]|2?[0-3]):([0-5]\d)$\""; ?>>
				<?php else: ?>
				<select id="<?php echo $cf->key ?>" class="py-2 px-2"name="<?php echo $cf->key ?>" <?php if($cf->required) echo "required" . $cf->required . "'"; ?> style="width: 100%; max-width: 500px;">
					<option value="" selected disabled><?php _e( $cf->selectplaceholder, 'atn' ); ?></option>
					<?php if(!empty($cf->options)): ?>
						<?php foreach($cf->options as $key => $value): ?>
							<option value="<?php echo $value ?>">
								<?php echo $value ?>
							</option>
						<?php endforeach; ?>
					<?php endif ?>
				</select>
				<?php endif ?>
			</div>
			<?php
		endforeach;
		echo '<br />';
	}
		echo '<h4>Contact Details</h4>';
		foreach ($cd_custom_fields as $cf):
			$cf = (object)$cf;
			if( ($cf->dontShowOn) && in_array($the_product_id, ($cf->dontShowOn)) ) {
			continue;
			}
			if ( $cf->onlyShowOn && !(in_array($the_product_id, ($cf->onlyShowOn))) ) {
				continue;
			}
			?>
			<div class="<?php echo $cf->classList ?>">
				<label for="<?php echo $cf->key ?>"><?php _e( $cf->label, 'atn' ); ?><?php if($cf->required) echo '<span style="color: red; font-weight: bold;">*</span>'; ?></label>
				<?php if(!$cf->select): 
					if ( has_term( 'Collection', 'product_cat', $product_id) && ($cf->key) == 'pickup-date' ) {
						echo "<p style='font-weight: bold; color: red;'>This service does NOT operate on Saturday afternoon an all day Sunday.</p>";
					}
				?>
				<input type="<?php echo $cf->type ?>" style="min-height: 40px; <?php if($cf->type == "checkbox") echo "width: 30px\" value='Yes'"; ?> id="<?php echo $cf->key ?>" name="<?php echo $cf->key ?>" placeholder="<?php //_e( $cf->label, 'atn' ); ?>" <?php if($cf->required) echo 'required="' . $cf->required . '"'; ?> <?php if($cf->min) echo 'required="' . $cf->min . '"'; ?> <?php if($cf->maxDate) echo 'max="' . $cf->maxDate . '"'; ?> <?php if($cf->minDate) echo 'min="' . $cf->minDate . '"'; ?>>
				<?php else: ?>
				<select id="<?php echo $cf->key ?>" class="py-2 px-2"name="<?php echo $cf->key ?>" <?php if($cf->required) echo "required='" . $cf->required . "'"; ?>>
					<option value="" selected disabled><?php _e( $cf->selectplaceholder, 'atn' ); ?></option>
					<?php if(!empty($cf->options)): ?>
						<?php foreach($cf->options as $key => $value): ?>
							<option value="<?php echo $value ?>">
								<?php echo $value ?>
							</option>
						<?php endforeach; ?>
					<?php endif ?>
				</select>
				<?php endif ?>
			</div>
			<?php
		endforeach;
		?>
		<?php
		if ( has_term( 'On Site', 'product_cat', $product_id) || has_term( 'Collection', 'product_cat', $product_id)) {
			echo "<p style='font-weight: bold; color: red;'>You will not be allowed to take the test or receive if you do not attend in a motor vehicle.</p>";
		}
		echo '</div>';
}

//grabbing data
add_filter( 'woocommerce_add_cart_item_data', 'add_customer_form_text_to_cart_item', 10, 3 );
function add_customer_form_text_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
	global $pa_custom_fields, $sia_custom_fields, $td_custom_fields, $cd_custom_fields;

	foreach ($pa_custom_fields as $cf):
		$cf = (object)$cf;

		$custom_input = filter_input( INPUT_POST, $cf->key );

		if ( !empty( $custom_input ) ) {
			$cart_item_data[ $cf->key ] = $custom_input;
		}

	endforeach;

	foreach ($sia_custom_fields as $cf):
		$cf = (object)$cf;

		$custom_input = filter_input( INPUT_POST, $cf->key );

		if ( !empty( $custom_input ) ) {
			$cart_item_data[ $cf->key ] = $custom_input;
		}

	endforeach;
	foreach ($td_custom_fields as $cf):
		$cf = (object)$cf;

		$custom_input = filter_input( INPUT_POST, $cf->key );

		if ( !empty( $custom_input ) ) {
			$cart_item_data[ $cf->key ] = $custom_input;
		}

	endforeach;
	foreach ($cd_custom_fields as $cf):
		$cf = (object)$cf;

		$custom_input = filter_input( INPUT_POST, $cf->key );

		if ( !empty( $custom_input ) ) {
			$cart_item_data[ $cf->key ] = $custom_input;
		}

	endforeach;

	return $cart_item_data;
}

// displaying custom field data in checkout cart
add_filter( 'woocommerce_get_item_data', 'display_customer_form_text_cart', 10, 2 );
function display_customer_form_text_cart( $item_data, $cart_item ) {
	global $pa_custom_fields, $sia_custom_fields, $td_custom_fields, $cd_custom_fields;

	foreach ($pa_custom_fields as $cf):
		$cf = (object)$cf;

		if ( !empty( $cart_item[ $cf->key ] ) ) {
			$item_data[] = array(
				'key'     => __( $cf->label, 'atn' ),
				'value'   => wc_clean( $cart_item[ $cf->key ] ),
				'display' => '',
			);
		}

	endforeach;

	foreach ($sia_custom_fields as $cf):
		$cf = (object)$cf;

		if ( !empty( $cart_item[ $cf->key ] ) ) {
			$item_data[] = array(
				'key'     => __( $cf->label, 'atn' ),
				'value'   => wc_clean( $cart_item[ $cf->key ] ),
				'display' => '',
			);
		}

	endforeach;
	foreach ($td_custom_fields as $cf):
		$cf = (object)$cf;

		if ( !empty( $cart_item[ $cf->key ] ) ) {
			$item_data[] = array(
				'key'     => __( $cf->label, 'atn' ),
				'value'   => wc_clean( $cart_item[ $cf->key ] ),
				'display' => '',
			);
		}

	endforeach;
	foreach ($cd_custom_fields as $cf):
		$cf = (object)$cf;

		if ( !empty( $cart_item[ $cf->key ] ) && !($cf->json == '_t_and_c_accept') ) {
			$item_data[] = array(
				'key'     => __( $cf->label, 'atn' ),
				'value'   => wc_clean( $cart_item[ $cf->key ] ),
				'display' => '',
			);
		}

	endforeach;

	return $item_data;
}

// Adding custom fields to meta
add_action( 'woocommerce_checkout_create_order_line_item', 'add_customer_form_text_to_order_items', 10, 4 );
function add_customer_form_text_to_order_items( $item, $cart_item_key, $values, $order ) {
	global $pa_custom_fields, $sia_custom_fields, $td_custom_fields, $cd_custom_fields; $item_number;
	
	$item->add_meta_data( __("booking_reference"), "" );
	foreach ($pa_custom_fields as $cf):
		$cf = (object)$cf;
		if ( !empty( $values[ $cf->key ] ) ) {
			$item->add_meta_data( __( $cf->json, 'atn' ), $values[ $cf->key ] );
		}
	endforeach;
	foreach ($sia_custom_fields as $cf):
		$cf = (object)$cf;
		if ( !empty( $values[ $cf->key ] ) ) {
			$item->add_meta_data( __( $cf->json, 'atn' ), $values[ $cf->key ] );
		}
	endforeach;
	foreach ($td_custom_fields as $cf):
		$cf = (object)$cf;
		if ( !empty( $values[ $cf->key ] ) ) {
			$item->add_meta_data( __( $cf->json, 'atn' ), $values[ $cf->key ] );
		}
	endforeach;
	foreach ($cd_custom_fields as $cf):
		$cf = (object)$cf;
		if ( !empty( $values[ $cf->key ] ) ) {
			$item->add_meta_data( __( $cf->json, 'atn' ), $values[ $cf->key ] );
		}
	endforeach;

}

// Adding booking reference to meta
add_action( 'woocommerce_order_status_processing', 'print_order_line_item_meta', 10, 2 );
function print_order_line_item_meta($items, $order) {
	$item_number = 0;
	$order_number = $order->get_order_number();
  $items = $order->get_items();
	foreach ( $items as $item ) {
		$product_name = $item->get_name();
		if ($product_name == "Re Delivery of Order")
			return;
		$item_number++;
		$booking_reference = "RUKHT" . str_pad( $order_number , 5, "0", STR_PAD_LEFT) . str_pad($item_number, 2, "0", STR_PAD_LEFT);
		$item->update_meta_data( 'booking_reference', $booking_reference );
		$item->save_meta_data();
	}
}

// Adding booking reference to meta for appointments
add_action( 'woocommerce_order_status_completed', 'booking_ref_appointments', 10, 2 );
function booking_ref_appointments($items, $order) {
	$object_id = $order->get_id();
  print_order_line_item_meta($items, $order);
}

//Change display keys on meta data
add_filter('woocommerce_order_item_display_meta_key', 'filter_wc_order_item_display_meta_key', 20, 3 );
function filter_wc_order_item_display_meta_key( $display_key, $meta, $item ) {
	global $pa_custom_fields, $sia_custom_fields, $td_custom_fields, $cd_custom_fields;
	// Change displayed label for specific order item meta key
	if( is_admin() && $item->get_type() === 'line_item' && $meta->key === 'booking_reference' ) {
		$display_key = __( "Booking Reference", "woocommerce" );
	}
	foreach ($pa_custom_fields as $cf):
		$cf = (object)$cf;
		if( is_admin() && $item->get_type() === 'line_item' && $meta->key === ($cf->json) ) {
			$display_key = __( ($cf->neat), "woocommerce" );
		}
	endforeach;
	foreach ($sia_custom_fields as $cf):
		$cf = (object)$cf;
		if( is_admin() && $item->get_type() === 'line_item' && $meta->key === ($cf->json) ) {
			$display_key = __( ($cf->neat), "woocommerce" );
		}
	endforeach;
	foreach ($td_custom_fields as $cf):
		$cf = (object)$cf;
		if( is_admin() && $item->get_type() === 'line_item' && $meta->key === ($cf->json) ) {
			$display_key = __( ($cf->neat), "woocommerce" );
		}
	endforeach;
	foreach ($cd_custom_fields as $cf):
		$cf = (object)$cf;
		if( is_admin() && $item->get_type() === 'line_item' && $meta->key === ($cf->json) ) {
			$display_key = __( ($cf->neat), "woocommerce" );
		}
	endforeach;
	return $display_key;
}

